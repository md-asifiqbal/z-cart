<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Cancellation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\OrderDetailRequest;

class OrderCancellationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('cancelAny', Order::class); // Check permission

        $cancellations = Cancellation::mine()->with('customer:id,name','order')
        ->orderBy('created_at', 'desc')->get();

        return view('admin.order.cancellations', compact('cancellations'));
    }

    public function handleCancellationRequest(OrderDetailRequest $request, Order $order, $action = 'decline')
    {
        $this->authorize('cancel', $order); // Check permission

        if ($action == 'approve') {
            $order->cancellation->approve();
        }
        else{
            $order->cancellation->decline();
        }

        return back()->with('success', trans('app.order_updated'));
    }

    /**
     * Cancel the order and revert the items into available stock
     */
    public function cancel(OrderDetailRequest $request, Order $order)
    {
        $this->authorize('cancel', $order); // Check permission

        // Check if has a cancellation request
        if ($order->cancellation) {
            $order->cancellation->forceFill([
                'items' => Null,
                'status' => Cancellation::STATUS_APPROVED,
            ])->save();
        }

        $order->cancel();

        return redirect()->back()->with('success', trans('app.order_updated'));
    }

}
