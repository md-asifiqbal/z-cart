<?php

namespace App\Jobs;

use App\User;
use App\Shop;
use Carbon\Carbon;
use App\SubscriptionPlan;
use Illuminate\Foundation\Bus\Dispatchable;
use Laravel\Cashier\Exceptions\IncompletePayment;

class SubscribeShopToNewPlan
{
    use Dispatchable;

    protected $merchant;
    protected $plan;
    protected $payment_method;

    /**
     * Create a new job instance.
     *
     * @param  User  $merchant
     * @param  str  $plan
     * @param  str/Null  $payment_method
     * @return void
     */
    public function __construct(User $merchant, $plan, $payment_method = Null)
    {
        $this->merchant = $merchant;
        $this->plan = $plan;
        $this->payment_method = $payment_method;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shop = $this->merchant->owns;

        // Create subscription intance
        $subscriptionPlan = SubscriptionPlan::findOrFail($this->plan);

        $subscription = $shop->newSubscription($subscriptionPlan->name, $subscriptionPlan->plan_id);

        $trialDays = (bool) config('system_settings.trial_days') ? config('system_settings.trial_days') : Null;

        // Subtract the used trial days with the new subscription
        if($shop->onGenericTrial()) {
            $trialDays = Carbon::now()->lt($shop->trial_ends_at) ? Carbon::now()->diffInDays($shop->trial_ends_at) : Null;
        }

        // Set trial days
        if($trialDays) {
            $subscription->trialDays($trialDays);
        }

        try {
            // Create stripe subscription
            $subscription->create($this->payment_method, [
                'email' => $this->merchant->email
            ]);
        } catch (IncompletePayment $exception) {
            return redirect()->route('cashier.payment', [$exception->payment->id, 'redirect' => route('home')]);
        }

        if (! $this->payment_method) {
        //     $subscription->create($this->payment_method, [
        //         'email' => $this->merchant->email
        //     ]);
        // }
        // else {
        //     // echo "<pre>"; print_r($subscription); echo "<pre>"; exit('end!');
        //     $subscription->create();

            $trial_ends_at = $shop->trial_ends_at ?? Carbon::now()->addDays($trialDays);

            $this->adjustGenericTrial($shop, $trial_ends_at);
        }

        // elseif($this->merchant->hasBillingToken()){
        //     $subscription->create();

        //     $this->adjustGenericTrial($shop);
        // }
        // elseif (! is_billing_info_required() && $trialDays)
        // {
        //     $subscription->create();

        //     $trial_ends_at = $shop->trial_ends_at ?: Carbon::now()->addDays($trialDays);

        //     $this->adjustGenericTrial($shop, $trial_ends_at);
        // }
    }

    /**
     * Adjust Generic Trial information in shop table
     *
     * @param  App\Shop   $shop
     * @param  [type] $trialEnds
     *
     * @return bool
     */
    private function adjustGenericTrial(Shop $shop, $trialEnds = Null){
        return $shop->forceFill([
                        'current_billing_plan' => $this->plan,
                        'trial_ends_at' => $trialEnds
                    ])->save();
    }
}