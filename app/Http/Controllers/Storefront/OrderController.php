<?php

namespace App\Http\Controllers\Storefront;

use DB;
use Auth;
use App\Cart;
use App\Order;
use Paypalpayment;
use Illuminate\Support\Str;
use Instamojo\Instamojo;
use CybersourcePayments;
use Illuminate\Http\Request;
use App\Services\NewCustomer;
use App\Events\Order\OrderPaid;
use App\Events\Order\OrderCreated;
use App\Http\Controllers\Controller;
use App\Exceptions\AuthorizeNetException;
use App\Http\Requests\Validations\OrderDetailRequest;
use App\Http\Requests\Validations\CheckoutCartRequest;
use App\Http\Requests\Validations\ConfirmGoodsReceivedRequest;

use net\authorize\api\contract\v1 as AuthorizeNetAPI;
use net\authorize\api\controller as AuthorizeNetController;

class OrderController extends Controller
{
    /**
     * Checkout the specified cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CheckoutCartRequest $request, Cart $cart)
    {
      
        $cart = crosscheckAndUpdateOldCartInfo($request, $cart);

        if ($request->email && $request->has('create-account') && $request->password) {
            $customer = (new NewCustomer)->save($request);
            $request->merge(['customer_id' => $customer->id]); //Set customer_id
        }
        
  
      
        

        // Get shipping address
        if(is_numeric($request->ship_to)) {
            $address = \App\Address::find($request->ship_to)->toHtml('<br/>', False);
        }
        else {
            $address = get_address_str_from_request_data($request);
        }

        // Push shipping address into the request
        $request->merge(['shipping_address' => $address]);

        // Start transaction!
        DB::beginTransaction();
        try {
            // Create the order
            $order = saveOrderFromCart($request, $cart);

            // Process payment with credit card
            if ('saved_card' == $request->payment_method) {
                // Charge using Stripe
                $this->chargeWithStripe($request, $order);

                // Order has been paided
                $this->markOrderAsPaid($order);
            }
            elseif (
                \App\PaymentMethod::TYPE_CREDIT_CARD == optional($order->paymentMethod)->type ||
                \App\PaymentMethod::TYPE_OTHERS == optional($order->paymentMethod)->type
            ) {
                // Process payment with credit card
                switch (optional($order->paymentMethod)->code) {
                    case 'stripe':
                        // Charge using Stripe
                        $this->chargeWithStripe($request, $order);
                        break;

                    case 'instamojo':
                        DB::commit();           // Everything is fine. Now commit the transaction Don't change it
                        // Charge using Instamojo
                        $this->chargeWithInstamojo($request, $order, $cart);
                        break;

                    case 'authorize-net':
                        // Charge using authorize.net
                        $this->chargeWithAuthorizeNet($request, $order);
                        break;

                    case 'cybersource':
                        DB::commit();         // Everything is fine. Now commit the transaction Don't change it
                        // Charge using cybersource
                        $this->chargeWithCyberSource($request, $order);
                        break;

                    case 'paystack':
                        DB::commit();           // Everything is fine. Now commit the transaction Don't change it
                        // Charge using paystack
                        $this->chargeWithPaystack($request, $order, $cart);
                        break;
               
                }

                // Order has been paided
                $this->markOrderAsPaid($order);
            }
        } catch(\Exception $e){
            \Log::error($e);        // Log the error

            DB::rollback();         // rollback the transaction and log the error

            // Set error messages:
            if (
                $e instanceOf \Yabacon\Paystack\Exception\ApiException ||
                $e instanceOf \Incevio\Cybersource\CybersourceSDK\ApiException ||
                $e instanceOf AuthorizeNetException
            ) {
                \Log::error('Payment failed:: ');
                \Log::info($e->getMessage());

                if($e instanceOf \Stripe\Error\Base) {
                    \Log::info('ResponseBody:: ' . $e->getJsonBody());
                }
                // elseif($e instanceOf AuthorizeNetException) {
                //     \Log::info('ResponseBody:: ' . $e->message);
                // }
                // else {
                //     \Log::info('ResponseBody:: ' . json_encode($e->getResponseBody()));
                // }

                $error = trans('theme.notify.invalid_request');
            }
            else {
                $error = trans('theme.notify.order_creation_failed');
            }

            return redirect()->back()->with('error', $error)->withInput();
        }

        DB::commit();           // Everything is fine. Now commit the transaction

        $cart->forceDelete();   // Delete the cart

        // Process payment with PayPal
        if ('paypal-express' == optional($order->paymentMethod)->code) {
            try {
                $payment = $this->chargeWithPayPal($request, $order);
            } catch (\Exception $e) {
                \Log::info('PayPal ERROR:');
                \Log::error($e);

                return redirect()->route("payment.failed", $order->id)->withInput();
            }

            return redirect()->to($payment->getData()->approval_url);
        }

        // Decrease the stock of the order items from the listing
        // $this->syncInventory($order);

        event(new OrderCreated($order));   // Trigger the Event
     
      $mobile='';
       $customer=\App\Customer::where('id',$order->customer_id)->first();
       $shop=\App\Shop::where('id',$order->shop_id)->first();
       $owner_mobile=$shop->mobile;
        $sa=\App\User::where('role_id',1)->first();
      if(isset($customer->mobile)){
      if($customer->mobile != '' || $customer->mobile != null)
        {
        $msg='Your order '.$order->order_number.' has been placed successfully.Order Id: '.$order->order_number.' Amount: '.$order->total;
         $this->send_sms($customer->mobile,$msg);
      }
      }
      if($owner_mobile != '' || $owner_mobile != null){
        $msg='New order placed from your shop ';
        $this->send_sms($owner_mobile,$msg);
      }
      
      if($sa->mobile != '' || $sa->mobile != null){
        $msg='New order placed from shop '.$shop->name;
        $this->send_sms($sa->mobile,$msg);
      }
      
       if($request->phone != '' || $request->phone != null)
        {
        $msg='Your order '.$order->order_number.' has been placed successfully.Order Id: '.$order->order_number.'Amount: '.$order->total;
         $this->send_sms($request->phone,$msg);
      }
         
        

        return redirect()->route('order.success', $order)->with('success', trans('theme.notify.order_placed'));
    }
  
     public function send_sms($mobile,$msg) {
      $url = "http://premium.mdlsms.com/smsapi";
      $data = [
        "api_key" => "C20006315fca5e1a5edbd4.21877943",
        "type" => "text",
        "contacts" => $mobile,
        "senderid" => "8809612441118",
        "msg" => $msg
      ];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      curl_close($ch);
      return $response;
    }

    private function chargeWithCyberSource($request, Order $order)
    {
        // Get the vendor configs
        $vendorConfig = $order->shop->config->cybersource;

        // If the stripe is not cofigured
        if(! $vendorConfig) {
            return redirect()->back()->with('error', trans('theme.notify.payment_method_config_error'))->withInput();
        }

        // Set vendor's cybersource config
        config()->set('cybersource_config.authType', 'http_signature');
        config()->set('cybersource_config.mode', 'cyberSource.environment.' . $vendorConfig->sandbox ? 'SANDBOX' : 'PRODUCTION');
        config()->set('cybersource_config.merchantID', $vendorConfig->merchant_id);
        config()->set('cybersource_config.apiKeyID', $vendorConfig->api_key_id);
        config()->set('cybersource_config.secretKey', $vendorConfig->secret);

        // Get customer
        $customer = Auth::guard('customer')->check() ? Auth::guard('customer')->user() : Null;

        $address = Null;
        $order_email = $request->email ?? $order->email;

        if ($customer) {
            $address = $customer->billingAddress ?? $customer->address();
            $order_email = $customer->email;
        }

        $country_id = $address ? $address->country_id : $request->country_id;
        $state_id = $address && $address->state ? $address->state_id : $request->state_id;

        $name = explode(' ', $request->cardholder_name);
        $fname = $name[0];
        $lname = count($name) > 1 ? end($name) : $fname;

        $billtoArr = [
            "firstName"          => $fname,
            "lastName"           => $lname,
            "address1"           => $address ? $address->address_line_1 : $request->address_line_1,
            "address2"           => $address ? $address->address_line_2 : $request->address_line_2,
            "postalCode"         => $address ? $address->zip_code : $request->zip_code,
            "locality"           => $address ? $address->city : $request->city,
            "country"            => get_value_from($country_id, 'countries', 'iso_code'),
            "administrativeArea" => $state_id ? get_value_from($state_id, 'states', 'iso_code') : '',
            "phoneNumber"        => $address ? $address->phone : $request->phone,
            "email"              => $order_email,
        ];

        $amountDetailsArr = [
            "totalAmount" => get_formated_decimal($order->grand_total, false, 2),
            "currency"    => get_currency_code()
        ];

        $paymentCardInfo = [
            "number"          => $request->cnumber,
            "securityCode"    => $request->ccode,
            "expirationMonth" => $request->card_expiry_month,
            "expirationYear"  => $request->card_expiry_year,
        ];

        $cliRefInfoArr = [
            "code" => get_platform_title() . " " . trans('app.order') . " " . $order->order_number,
        ];

        try {
            $response = CybersourcePayments::processPayment($cliRefInfoArr, $amountDetailsArr, $billtoArr, $paymentCardInfo, false);

            if($response[0]['status'] == 'AUTHORIZED') {
                return $response[0]['id'];
            }

            throw new \Incevio\Cybersource\CybersourceSDK\ApiException($response[0]['errorInformation']);
        }
        catch(Cybersource\ApiException $e)
        {
            \Log::error('ResponseBody:: ' . json_encode($e->getResponseBody()));

            throw new \Incevio\Cybersource\CybersourceSDK\ApiException($e->getMessage());
        }
    }

    private function chargeWithStripe($request, Order $order)
    {
        // Get stripe user id for the connected stripe account of the vendor
        $vendorStripeAccountId = $order->shop->config->stripe->stripe_user_id;

        // If the stripe is not cofigured
        if(! $vendorStripeAccountId) {
            return redirect()->back()->withInput()
            ->with('success', trans('theme.notify.payment_method_config_error'));
        }

        // Get customer
        if(Auth::guard('customer')->check()) {
            $customer = Auth::guard('customer')->user();
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        if ('saved_card' == $request->payment_method) {  // Charge old card
            // Create stripe token
            $token = \Stripe\Token::create([
              "customer" => $customer->stripe_id,
            ], ["stripe_account" => $vendorStripeAccountId]);

            $stripeToken = $token->id;
        }
        elseif ($request->has('cc_token')){    // This is a new card with stripe token
            if ($request->has('remember_the_card')) {  // Create Stripe Customer for future use

                $address = $customer->billingAddress ?? $customer->address();

                $stripeCustomer = \Stripe\Customer::create([
                    'name' => $request->cardholder_name ?? $customer->name,
                    'email' => $customer->email,
                    'address' => $address ? $address->toStripeAddress() : '',
                    'source' => $request->cc_token,
                ]);

                // Save cart info for future use
                $customer->stripe_id = $stripeCustomer->id;
                if(count($stripeCustomer->sources->data) > 0) {
                    $customer->card_brand = $stripeCustomer->sources->data[0]->brand;
                    $customer->card_holder_name = $stripeCustomer->sources->data[0]->name;
                    $customer->card_last_four = $stripeCustomer->sources->data[0]->last4;
                }
                $customer->save();

                // Create stripe token
                $token = \Stripe\Token::create([
                  "customer" => $customer->stripe_id,
                ], ["stripe_account" => $vendorStripeAccountId]);

                $stripeToken = $token->id;
            }
            else {      // Just charge the new card (Don't save)
                $stripeToken = $request->cc_token;
            }
        }

        // Get calculated application fee for the order
        $application_fee = getPlatformFeeForOrder($order);

        return \Stripe\Charge::create([
            'amount' => get_cent_from_doller($order->grand_total),
            'currency' => get_currency_code(),
            'description' => trans('app.purchase_from', ['marketplace' => get_platform_title()]),
            'source' => $stripeToken,
            'application_fee' => get_cent_from_doller($application_fee),
            'metadata' => [
                'order_number' => $order->order_number,
                'shipping_address' => strip_tags($order->shipping_address),
                'buyer_note' => $order->buyer_note
            ],
        ], [
            "stripe_account" => $vendorStripeAccountId
        ]);
    }

    private function chargeWithInstamojo($request, Order $order, Cart $cart)
    {
        // Get the vendor configs
        $vendorInstamojoConfig = $order->shop->config->instamojo;
        // If the stripe is not cofigured
        if( ! $vendorInstamojoConfig ) {
            return redirect()->back()->with('success', trans('theme.notify.payment_method_config_error'))->withInput();
        }

        $instamojoApi = new Instamojo(
                                    $vendorInstamojoConfig->api_key,
                                    $vendorInstamojoConfig->auth_token,
                                    $vendorInstamojoConfig->sandbox == 1 ? 'https://test.instamojo.com/api/1.1/' : Null
                                );

        try {
            // Get customer
            $customer = Auth::guard('customer')->check() ? Auth::guard('customer')->user() : Null;

            $response = $instamojoApi->paymentRequestCreate([
                            "purpose" => trans('theme.order_id') . ': ' . $order->order_number,
                            "amount" => number_format($order->grand_total, 2, '.', ''),
                            "buyer_name" => $customer ? $customer->getName() : $request->address_title,
                            "send_email" => true,
                            "email" =>  $customer ? $customer->email : $request->email,
                            "phone" => $customer ? '' : $request->phone,
                            "redirect_url" => route('instamojo.redirect', ['order' => $order, 'cart' => $cart])
                        ]);

            // $response = $instamojoApi->paymentRequestStatus($response['id']);
            // print_r($response);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }

        // redirect to page so User can pay
        header('Location: ' . $response['longurl']);
        exit();
    }

    public function instamojoSuccess(Request $request, $order, $cart)
    {
        if ($request->payment_status != 'Credit' || ! $request->has('payment_request_id') || ! $request->has('payment_id')) {
            return redirect()->route("payment.failed", $order);
        }

        if(! $order instanceOf Order) {
            $order = Order::find($order);
        }

        // Delete the cart
        Cart::find($cart)->forceDelete();   // Delete the cart

        // Order has been paided
        $this->markOrderAsPaid($order);

        // Decrease the stock of the order items from the listing
        // $this->syncInventory($order);

        event(new OrderCreated($order));   // Trigger the Event

        return redirect()->route('order.success', $order)->with('success', trans('theme.notify.order_placed'));
    }

    private function chargeWithAuthorizeNet($request, Order $order)
    {
        // Get the vendor configs
        $vendorAuthorizeNetConfig = $order->shop->config->authorizeNet;
        // If the stripe is not cofigured
        if(! $vendorAuthorizeNetConfig) {
            return redirect()->back()->with('success', trans('theme.notify.payment_method_config_error'))->withInput();
        }

        // Common setup for API credentials
        $merchantAuthentication = new AuthorizeNetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName($vendorAuthorizeNetConfig->api_login_id);
        $merchantAuthentication->setTransactionKey($vendorAuthorizeNetConfig->transaction_key);
        $refId = 'ref'.time();

        // Create the payment data for a credit card
        $creditCard = new AuthorizeNetAPI\CreditCardType();
        $creditCard->setCardNumber($request->cnumber);
        // $creditCard->setExpirationDate( "2038-12");
        $expiry = $request->card_expiry_year . '-' . $request->card_expiry_month;
        $creditCard->setExpirationDate($expiry);
        $paymentOne = new AuthorizeNetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a transaction
        $transactionRequestType = new AuthorizeNetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount(get_formated_decimal($order->grand_total, false, 2));
        $transactionRequestType->setPayment($paymentOne);
        $ApiRequest = new AuthorizeNetAPI\CreateTransactionRequest();
        $ApiRequest->setMerchantAuthentication($merchantAuthentication);
        $ApiRequest->setRefId($refId);
        $ApiRequest->setTransactionRequest($transactionRequestType);
        $controller = new AuthorizeNetController\CreateTransactionController($ApiRequest);
        $response = $controller->executeWithApiResponse(
            $vendorAuthorizeNetConfig->sandbox == 1 ?
            \net\authorize\api\constants\ANetEnvironment::SANDBOX :
            \net\authorize\api\constants\ANetEnvironment::PRODUCTION
        );

        if ($response != null) {
            $tresponse = $response->getTransactionResponse();
            if (($tresponse != null) && ($tresponse->getResponseCode() == "1")) { // Approved
                \Log::info("Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n");
                \Log::info("Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n");

                return TRUE;
            }
            else {
                $errMsg = $tresponse == null ? trans('theme.notify.invalid_request') : $tresponse->getErrors()[0]->getErrorText();
                throw new AuthorizeNetException($errMsg);

                return FALSE;
            }
        }

        \Log::error("AuthorizeNetException:: Charge Credit Card Null response returned");

        throw new AuthorizeNetException(trans('theme.notify.payment_failed'));

        return FALSE;
    }

    private function chargeWithPaystack($request, Order $order, Cart $cart)
    {
        // Get the vendor configs
        $vendorPaystackConfig = $order->shop->config->paystack;
        // If the stripe is not cofigured
        if(! $vendorPaystackConfig) {
            return redirect()->back()->with('success', trans('theme.notify.payment_method_config_error'))->withInput();
        }

        $paystack = new \Yabacon\Paystack($vendorPaystackConfig->secret);
        $tranx = $paystack->transaction->initialize([
            'email' => $request->email,
            'amount' => (int) ($order->grand_total * 100),
            'quantity' => $order->quantity,
            'orderID' => $order->id,
            'callback_url' => route('paystack.success', ['order' => $order, 'cart' => $cart]),
            // 'reference' => $order->order_number,
            'metadata'=>json_encode([
                'order_number' => $order->order_number,
                'custom_fields'=> [
                    [
                        'display_name'=> "Order Number",
                        'variable_name'=> "order_number",
                        'value'=> $order->order_number
                    ],[
                        'display_name'=> "Shipping Address",
                        'variable_name'=> "shipping_address",
                        'value'=> $order->order_number
                    ]
                ]
            ])
        ]);

        if(! $tranx->status) {
            throw new \Yabacon\Paystack\Exception\ApiException;
        }

        // store transaction reference so we can query in case user never comes back
        // perhaps due to network issue
        // save_last_transaction_reference($tranx->data->reference);

        // redirect to page so User can pay
        header('Location: ' . $tranx->data->authorization_url);
        exit();
    }

    public function paystackPaymentSuccess(Request $request, $order, $cart)
    {
        if (! $request->has('trxref') || ! $request->has('reference')) {
            return redirect()->route("payment.failed", $order);
        }

        if(! $order instanceOf Order) {
            $order = Order::find($order);
        }

        // Delete the cart
        Cart::find($cart)->forceDelete();   // Delete the cart

        // Order has been paided
        $this->markOrderAsPaid($order);

        // Decrease the stock of the order items from the listing
        // $this->syncInventory($order);

        event(new OrderCreated($order));   // Trigger the Event

        return redirect()->route('order.success', $order)->with('success', trans('theme.notify.order_placed'));
    }

    private function chargeWithPayPal($request, Order $order)
    {
        // Get the vendor configs
        $vendorPaypalConfig = $order->shop->config->paypalExpress;

        // If the paypal is not cofigured
        if(! $vendorPaypalConfig) {
            return redirect()->back()->with('error', trans('theme.notify.payment_method_config_error'))->withInput();
        }

        // Set vendor's paypal config
        config()->set('paypal_payment.mode', $vendorPaypalConfig->sandbox == 1 ? 'sandbox' : 'live');
        config()->set('paypal_payment.account.client_id', $vendorPaypalConfig->client_id);
        config()->set('paypal_payment.account.client_secret', $vendorPaypalConfig->secret);

        // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]
        // $shippingAddress= Paypalpayment::shippingAddress();
        // $shippingAddress->setLine1("3909 Witmer Road")
        //     ->setLine2("Niagara Falls")
        //     ->setCity("Niagara Falls")
        //     ->setState("NY")
        //     ->setPostalCode("14305")
        //     ->setCountryCode("US")
        //     ->setPhone("716-298-1822")
        //     ->setRecipientName("Jhone");

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("paypal");

        $allItems = [];
        foreach ($order->inventories as $item) {
            $tempItem = Paypalpayment::item();
            $tempItem->setName($item->title)->setDescription($item->pivot->item_description)
            ->setCurrency( get_currency_code() )->setQuantity($item->pivot->quantity)
            ->setTax($order->taxrate)->setPrice($item->pivot->unit_price);

            $allItems[] = $tempItem;
        }

        $itemList = Paypalpayment::itemList();
        $itemList->setItems($allItems);
        // ->setShippingAddress($shippingAddress);

        $details = Paypalpayment::details();
        $details->setShipping( $order->get_shipping_cost() )->setTax($order->taxes)
        ->setGiftWrap($order->packaging)->setShippingDiscount($order->discount)
        ->setSubtotal($order->calculate_total_for_paypal()); //total of items prices

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency( get_currency_code() )
        ->setTotal( $order->grand_total_for_paypal() )
        ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a payment - what is the payment for and who
        // is fulfilling it. Transaction is created with a `Payee` and `Amount` types
        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription( trans('app.purchase_from', ['marketplace' => get_platform_title()]) )
        ->setInvoiceNumber($order->order_number);

        // ### Payment
        // A Payment Resource; create one using the above types and intent as 'sale'
        $redirectUrls = Paypalpayment::redirectUrls();
        $redirectUrls->setReturnUrl(route("payment.success", $order->id))
        ->setCancelUrl(route("payment.failed", $order->id));

        $payment = Paypalpayment::payment();
        $payment->setIntent("sale")->setPayer($payer)->setRedirectUrls($redirectUrls)->setTransactions([$transaction]);

        try {
            // Create a payment by posting to the APIService using a valid ApiContext The return object contains the status;
            $payment->create(Paypalpayment::apiContext());
        } catch (\PPConnectionException $ex) {
            \Log::error('PayPal Payment failed: ' . $ex->getMessage());

            return response()->json(["error" => $ex->getMessage()], 400);
        }

        return response()->json([$payment->toArray(), 'approval_url' => $payment->getApprovalLink()], 200);
    }

    public function paypalPaymentSuccess(Request $request, $order)
    {
        if (! $request->has('token') || ! $request->has('paymentId') || ! $request->has('PayerID')) {
            return redirect()->route("payment.failed", $order);
        }

        if(! $order instanceOf Order) {
            $order = Order::find($order);
        }

        // ///////////////////////////////////
        // Get the vendor configs
        $vendorPaypalConfig = $order->shop->config->paypalExpress;

        // // If the paypal is not cofigured
        // if( ! $vendorPaypalConfig )
        //     return redirect()->back()->with('error', trans('theme.notify.payment_method_config_error'))->withInput();

        // Set vendor's paypal config
        config()->set('paypal_payment.mode', $vendorPaypalConfig->sandbox == 1 ? 'sandbox' : 'live');
        config()->set('paypal_payment.account.client_id', $vendorPaypalConfig->client_id);
        config()->set('paypal_payment.account.client_secret', $vendorPaypalConfig->secret);

       $payment = Paypalpayment::getById($request->get('paymentId'), Paypalpayment::apiContext());

        try {
            // Execute the payment;
            $paymentExecution = Paypalpayment::paymentExecution();
            $paymentExecution->setPayerId($request->get('PayerID'));
            $payment->execute($paymentExecution, Paypalpayment::apiContext());

        } catch (\PPConnectionException $ex) {
            \Log::error('PayPal Payment failed: ' . $ex->getMessage());

            return response()->json(["error" => $ex->getMessage()], 400);
        }

        if($payment->getState() == 'approved'){
            // Order has been paided
            $this->markOrderAsPaid($order);

            // Decrease the stock of the order items from the listing
            // $this->syncInventory($order);

            event(new OrderCreated($order));   // Trigger the Event

            return redirect()->route('order.success', $order)->with('success', trans('theme.notify.order_placed'));
        }

        // return response()->json([$payment->toArray()], 200);
        // ///////////////////////////////////

        return redirect()->route("payment.failed", $order);
    }

    public function paymentFailed(Request $request, $order)
    {
        $cart = moveAllItemsToCartAgain($order, true);

        return redirect()->route('cart.checkout', $cart)->with('error', trans('theme.notify.payment_failed'))->withInput();
    }

    /**
     * Order placed successfully.
     *
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function orderPlaced($order)
    {
        if(! $order instanceOf Order) {
            $order = Order::find($order);
        }

        return view('order_complete', compact('order'));
    }

    /**
     * Display order detail page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(OrderDetailRequest $request, Order $order)
    {
        $order->load(['inventories.image','conversation.replies.attachments']);

        return view('order_detail', compact('order'));
    }

    /**
     * Buyer confirmed goods received
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_received(ConfirmGoodsReceivedRequest $request, Order $order)
    {
        $order->mark_as_goods_received();

        return redirect()->route('order.feedback', $order)->with('success', trans('theme.notify.order_updated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Order   $order
     * @return \Illuminate\Http\Response
     */
    public function invoice(Order $order)
    {
        // $this->authorize('view', $order); // Check permission

        $order->invoice('D'); // Download the invoice
    }

    /**
     * Track order shippping.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function track(Request $request, Order $order)
    {
        return view('order_tracking', compact('order'));
    }

    /**
     * Create a new Customer
     *
     * @param  Request $request
     *
     * @return App\Customer
     */
    private function createNewCustomer($request)
    {
        $customer = Customer::create([
            'name' => $request->address_title,
            'email' => $request->email,
            'password' => $request->password,
            'accepts_marketing' => $request->subscribe,
            'verification_token' => Str::random(40),
            'active' => 1,
        ]);

        // Sent email address verification notich to customer
        $customer->notify(new EmailVerificationNotification($customer));

        $customer->addresses()->create($request->all()); //Save address

        if ( Auth::guard('web')->check() )
            Auth::logout();

        Auth::guard('customer')->login($customer); //Login the customer

        return $customer;
    }

    /**
     * Create a new order from the cart
     *
     * @param  Request $request
     * @param  App\Cart $cart
     *
     * @return App\Order
     */
    // private function saveOrderFromCart($request, $cart)
    // {
    //     // Get shipping address
    //     if(is_numeric($request->ship_to))
    //         $address = \App\Address::find($request->ship_to)->toString(True);
    //     else
    //         $address = get_address_str_from_request_data($request);

    //     // Set shipping_rate_id and handling cost to NULL if its free shipping
    //     if($cart->is_free_shipping()) {
    //         $cart->shipping_rate_id = Null;
    //         $cart->handling = Null;
    //     }

    //     // Save the order
    //     $order = new Order;
    //     $order->fill(
    //         array_merge($cart->toArray(), [
    //             'grand_total' => $cart->grand_total(),
    //             'order_number' => get_formated_order_number($cart->shop_id),
    //             'carrier_id' => $cart->carrier() ? $cart->carrier->id : NULL,
    //             'shipping_address' => $address,
    //             'billing_address' => $address,
    //             'email' => $request->email,
    //             'buyer_note' => $request->buyer_note
    //         ])
    //     );
    //     $order->save();

    //     // Add order item into pivot table
    //     $cart_items = $cart->inventories->pluck('pivot');
    //     $order_items = [];
    //     foreach ($cart_items as $item) {
    //         $order_items[] = [
    //             'order_id'          => $order->id,
    //             'inventory_id'      => $item->inventory_id,
    //             'item_description'  => $item->item_description,
    //             'quantity'          => $item->quantity,
    //             'unit_price'        => $item->unit_price,
    //             'created_at'        => $item->created_at,
    //             'updated_at'        => $item->updated_at,
    //         ];
    //     }
    //     \DB::table('order_items')->insert($order_items);

    //     return $order;
    // }

    // /**
    //  * Revert order to cart
    //  *
    //  * @param  App\Order $Order
    //  *
    //  * @return App\Cart
    //  */
    // private function revertOrder($order)
    // {
    //     if( !$order instanceOf Order )
    //         $order = Order::find($order);

    //     if (!$order) return;

    //     // Save the cart
    //     $cart = Cart::create(array_merge($order->toArray(), ['ip_address' => request()->ip()]));

    //     // Add order item into pivot table
    //     $order_items = $order->inventories->pluck('pivot');
    //     $cart_items = [];
    //     foreach ($order_items as $item) {
    //         $cart_items[] = [
    //             'cart_id'           => $cart->id,
    //             'inventory_id'      => $item->inventory_id,
    //             'item_description'  => $item->item_description,
    //             'quantity'          => $item->quantity,
    //             'unit_price'        => $item->unit_price,
    //             'created_at'        => $item->created_at,
    //             'updated_at'        => $item->updated_at,
    //         ];
    //     }
    //     \DB::table('cart_items')->insert($cart_items);

    //     $order->forceDelete();   // Delete the order

    //     return $cart;
    // }

    /**
     * MarkOrderAsPaid
     */
    private function markOrderAsPaid($order)
    {
        if(! $order instanceOf Order) {
            $order = Order::find($order);
        }

        if($order->order_status_id < Order::STATUS_CONFIRMED) {
            $order->order_status_id = Order::STATUS_CONFIRMED;
        }

        $order->payment_status = Order::PAYMENT_STATUS_PAID;
        $order->save();

        event(new OrderPaid($order));

        return $order;
    }

    /**
     * Order again by moving all items into th cart
     */
    public function again(Request $request, Order $order)
    {
        $cart = moveAllItemsToCartAgain($order);

        return redirect()->route('cart.checkout', $cart)->with('success', trans('theme.notify.cart_updated'));
    }

    private function logErrors($error, $feedback)
    {
        \Log::error($error);

        // Set error messages:
        // $error = new \Illuminate\Support\MessageBag();
        // $error->add('errors', $feedback);

        return $error;
    }
}