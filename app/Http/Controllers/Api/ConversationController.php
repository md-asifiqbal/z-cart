<?php

namespace App\Http\Controllers\Api;

use App\Shop;
// use App\Order;
// use App\Reply;
// use App\Message;
use App\ChatConversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Chat\NewMessageEvent;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ConversationResource;
// use App\Http\Requests\Validations\OrderDetailRequest;
// use App\Http\Requests\Validations\DirectCheckoutRequest;
use App\Http\Requests\Validations\ChatConversationRequest;
use App\Http\Requests\Validations\SaveChatConversationRequest;

class ConversationController extends Controller
{
    /**
     * Show all conversations
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function conversations(Request $request)
    {
        $conversations = ChatConversation::where('customer_id', Auth::guard('api')->id())->get();

        return ConversationResource::collection($conversations);
    }

    /**
     * Show single conversation
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function conversation(ChatConversationRequest $request, Shop $shop)
    {
        $conversation = ChatConversation::where([
            'customer_id' => Auth::guard('api')->id(),
            'shop_id' => $shop->id
        ])
        ->with('replies')->first();

        if($conversation) {
            return new ConversationResource($conversation);
        }

        return response()->json([
            'message' => trans('api.welcome_chat')
        ]);
    }

    /**
     * Save message
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function save_conversation(SaveChatConversationRequest $request, Shop $shop)
    {
        $conversation = ChatConversation::where([
            'customer_id' => $request->customer_id,
            'shop_id' => $shop->id
        ])->first();

        if($conversation){
            $conversation->markAsUnread();
            $msg_object = $conversation->replies()->create([
                'customer_id' => $request->customer_id,
                'user_id' => $request->user_id,
                'reply' => $request->message,
            ]);

            if ($request->hasFile('photo')) {
                $msg_object->saveAttachments($request->file('photo'));
            }
        }
        elseif($request->customer_id){
            $conversation = ChatConversation::create([
                'shop_id' => $shop->id,
                'customer_id' => $request->customer_id,
                'message' => $request->message,
                'status' => ChatConversation::STATUS_NEW,
            ]);

            if ($request->hasFile('photo')) {
                $conversation->saveAttachments($request->file('photo'));
            }
        }
        else {
            return response(trans('responses.unauthorized'), 401);
        }

        // event(new NewMessageEvent($msg_object, $request->message));

        return new ConversationResource($conversation);
    }
}
