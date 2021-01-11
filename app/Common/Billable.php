<?php

namespace App\Common;

use App\LocalInvoice;
use App\Subscription;
use Stripe\Customer as StripeCustomer;
// use Mpociot\VatCalculator\VatCalculator;
use Laravel\Cashier\Billable as CashierBillable;

trait Billable
{
    use CashierBillable;

    /**
     * Create a Stripe customer for the given model.
     *
     * @param  array  $options
     * @return \Stripe\Customer
     */
    // public function createAsStripeCustomer(array $options = [])
    // {
    //     $options = array_key_exists('email', $options)
    //             ? $options
    //             : array_merge($options, ['email' => $this->email]);

    //     $options = array_merge($options, [
    //         'expand' => [
    //             'subscriptions'
    //         ]
    //     ]);

    //     // Here we will create the customer instance on Stripe and store the ID of the
    //     // user from Stripe. This ID will correspond with the Stripe user instances
    //     // and allow us to retrieve users from Stripe later when we need to work.
    //     $customer = StripeCustomer::create(
    //         $options, $this->stripeOptions()
    //     );

    //     $this->stripe_id = $customer->id;

    //     $this->save();

    //     return $customer;
    // }

    /**
     * Get the Stripe customer for the model.
     *
     * @return \Stripe\Customer
     */
    // public function asStripeCustomer()
    // {
    //     $options = [
    //         'id' => $this->stripe_id,
    //         'expand' => [
    //             'subscriptions'
    //         ]
    //     ];

    //     return StripeCustomer::retrieve($options, $this->stripeOptions());
    // }

    // public static function retrieve($id, $opts = null)
    // {
    //     dd($opts);
    //     $opts = \Stripe\Util\RequestOptions::parse($opts);
    //     $instance = new static($id, $opts);
    //     $instance->refresh();
    //     return $instance;
    // }

    /**
     * Determine if the user is connected ot any payment provider.
     *
     * @return bool
     */
    public function hasBillingProvider()
    {
        return $this->stripe_id || $this->braintree_id;
    }

    /**
     * Get all of the subscription for the user.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get all of the subscriptions for the user.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get all of the local invoices.
     */
    public function localInvoices()
    {
        return $this->hasMany(LocalInvoice::class)->orderBy('id', 'desc');
    }

    /**
     * Get the tax percentage to apply to the subscription.
     *
     * @return int
     */
    // public function taxPercentage()
    // {
    //     if (! Spark::collectsEuropeanVat()) {
    //         return 0;
    //     }

    //     $vatCalculator = new VatCalculator;

    //     $vatCalculator->setBusinessCountryCode(Spark::homeCountry());

    //     return $vatCalculator->getTaxRateForCountry(
    //         $this->card_country, ! empty($this->vat_id)
    //     ) * 100;
    // }
}
