<?php
// Common
include('Common.php');

// Front End routes
include('Frontend.php');

// Backoffice routes
include('Backoffice.php');

// Webhooks
// Route::post('webhook/stripe', 'WebhookController@handleStripeCallback'); 		// Stripe
Route::post('stripe/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');
// AJAX routes for get images
// Route::get('order/ajax/taxrate', 'OrderController@ajaxTaxRate')->name('ajax.taxrate');

use App\Mail\VerifyEmail;
Route::get('test',function () {
    $data=[
        'email'=>'asif.ice.pust@gmail.com',
        'otp'=>'ddsfdsfds'
    ];
    Mail::to('asif.ice.pust@gmail.com')->send(new VerifyEmail($data));
    return 'sent';
});