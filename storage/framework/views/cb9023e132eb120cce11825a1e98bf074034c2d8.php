<?php
  $geoip = geoip(request()->ip());
  $geoip_country = $business_areas->where('iso_code', $geoip->iso_code)->first();

  $shipping_country_id = $cart->ship_to_country_id ?? optional($geoip_country)->id;

  if(! $cart->shipping_state_id){
    $geoip_state = \DB::table('states')->select('id', 'name', 'iso_code')->where([
      ['country_id', '=', $shipping_country_id], ['iso_code', '=', $geoip->state]
    ])->first();
  }

  $shipping_state_id = $cart->ship_to_state_id ?? optional($geoip_state)->id;

  $shipping_zone = get_shipping_zone_of($cart->shop_id, $shipping_country_id, $shipping_state_id);

  $shipping_options = isset($shipping_zone->id) ? getShippingRates($shipping_zone->id) : 'NaN';

  $packaging_options = optional($cart->shop)->packagings;

  $default_packaging = $cart->shippingPackage ??
                        optional($cart->shop->packagings)->where('default',1)->first() ??
                        $platformDefaultPackaging;
?>

<section>
  <div class="container">
    <?php echo Form::open(['route' => ['order.create', $cart], 'id' => 'checkoutForm', 'data-toggle' => 'validator', 'novalidate']); ?>

      <div class="row shopping-cart-table-wrap space30" id="cartId<?php echo e($cart->id, false); ?>" data-cart="<?php echo e($cart->id, false); ?>">

        <?php if(Session::has('error')): ?>
          <div class="notice notice-danger notice-sm">
            <strong><?php echo e(trans('theme.error'), false); ?></strong> <?php echo e(Session::get('error'), false); ?>

          </div>
        <?php endif; ?>

        <div class="notice notice-warning notice-sm space20" id="checkout-notice" style="display: <?php echo e(($cart->shipping_rate_id || $cart->is_free_shipping()) ? 'none' : 'block', false); ?>;">
          <strong><?php echo e(trans('theme.warning'), false); ?></strong>
          <span id="checkout-notice-msg"><?php echo app('translator')->getFromJson('theme.notify.seller_doesnt_ship'); ?></span>
        </div>

        <div class="col-md-4 bg-light">
          <div class="seller-info space20">
            <div class="text-muted small"><?php echo app('translator')->getFromJson('theme.sold_by'); ?></div>

            <img src="<?php echo e(get_storage_file_url(optional($shop->image)->path, 'tiny'), false); ?>" class="seller-info-logo img-sm img-circle" alt="<?php echo e(trans('theme.logo'), false); ?>">

            <a href="<?php echo e(route('show.store', $shop->slug), false); ?>" class="seller-info-name">
              <?php echo e($shop->name, false); ?>

            </a>
          </div><!-- /.seller-info -->

          <div class="input-group full-width space30">
            <span class="input-group-addon flat">
              <i class="fa fa-ticket"></i>
            </span>
            <input name="coupon" value="<?php echo e($cart->coupon ? $cart->coupon->code : Null, false); ?>" id="coupon<?php echo e($cart->id, false); ?>" class="form-control flat" type="text" placeholder="<?php echo app('translator')->getFromJson('theme.placeholder.have_coupon_from_seller'); ?>">
            <span class="input-group-btn">
              <button class="btn btn-default flat apply_seller_coupon" type="button" data-cart="<?php echo e($cart->id, false); ?>"><?php echo app('translator')->getFromJson('theme.button.apply_coupon'); ?></button>
            </span>
          </div><!-- /input-group -->

          <?php echo e(Form::hidden('cart_id', $cart->id, ['id' => 'checkout-id']), false); ?>

          <?php echo e(Form::hidden('cart_weight', $cart->shipping_weight, ['id' => 'cartWeight'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('free_shipping', $cart->is_free_shipping(), ['id' => 'freeShipping'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('shop_id', $cart->shop->id, ['id' => 'shop-id'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('tax_id', isset($shipping_zone->id) ? $shipping_zone->tax_id : Null, ['id' => 'tax-id'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('taxrate', $cart->taxrate, ['id' => 'cart-taxrate'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('packaging_id', $cart->packaging_id ?? $default_packaging->id, ['id' => 'packaging-id'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('zone_id', $cart->shipping_zone_id, ['id' => 'zone-id'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('shipping_rate_id', $cart->shipping_rate_id, ['id' => 'shipping-rate-id'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('ship_to_country_id', $cart->ship_to_country_id, ['id' => 'shipto-country-id'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('ship_to_state_id', $cart->ship_to_state_id, ['id' => 'shipto-state-id'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('discount_id', $cart->coupon_id, ['id' => 'discount-id'.$cart->id]), false); ?>

          <?php echo e(Form::hidden('handling_cost', $cart->handling_cost > 0 ? $cart->handling_cost : optional($cart->shop->config)->order_handling_cost, ['id' => 'handling-cost'.$cart->id]), false); ?>


          <h3 class="widget-title"><?php echo e(trans('theme.order_info'), false); ?></h3>
          <ul class="shopping-cart-summary ">
            <li>
              <span><?php echo e(trans('theme.item_count'), false); ?></span>
              <span><?php echo e($cart->inventories_count, false); ?></span>
            </li>
            <li>
              <span><?php echo e(trans('theme.subtotal'), false); ?></span>
              <span><?php echo e(get_currency_prefix(), false); ?>

                <span id="summary-total<?php echo e($cart->id, false); ?>"><?php echo e(number_format($cart->total, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

              </span>
            </li>
            <li>
              <span>
                  <a class="dynamic-shipping-rates" data-toggle="popover" data-cart="<?php echo e($cart->id, false); ?>" data-options="<?php echo e($shipping_options, false); ?>" id="shipping-options<?php echo e($cart->id, false); ?>" title= "<?php echo e(trans('theme.shipping'), false); ?>">
                    <u><?php echo e(trans('theme.shipping'), false); ?></u>
                  </a>
                  <em id="summary-shipping-name<?php echo e($cart->id, false); ?>" class="small text-muted"></em>
              </span>
              <span><?php echo e(get_currency_prefix(), false); ?>

                <span id="summary-shipping<?php echo e($cart->id, false); ?>"><?php echo e(number_format($cart->get_shipping_cost(), 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

              </span>

            </li>

            <?php if (! (empty(json_decode($packaging_options)))): ?>
              <li>
                  <span>
                    <a class="packaging-options" data-toggle="popover" data-cart="<?php echo e($cart->id, false); ?>" data-options="<?php echo e($packaging_options, false); ?>" title="<?php echo e(trans('theme.packaging'), false); ?>">
                      <u><?php echo e(trans('theme.packaging'), false); ?></u>
                    </a>
                    <em class="small text-muted" id="summary-packaging-name<?php echo e($cart->id, false); ?>">
                      <?php echo e(optional($default_packaging)->name, false); ?>

                    </em>
                  </span>
                  <span><?php echo e(get_currency_prefix(), false); ?>

                    <span id="summary-packaging<?php echo e($cart->id, false); ?>">
                      <?php echo e(number_format($default_packaging ? $default_packaging->cost : 0, 2, '.', ''), false); ?>

                    </span><?php echo e(get_currency_suffix(), false); ?>

                  </span>
              </li>
            <?php endif; ?>

            <li id="discount-section-li<?php echo e($cart->id, false); ?>" style="display: <?php echo e($cart->discount > 0 ? 'block' : 'none', false); ?>;">
              <span><?php echo e(trans('theme.discount'), false); ?>

                <em id="summary-discount-name<?php echo e($cart->id, false); ?>" class="small text-muted"><?php echo e($cart->coupon ? $cart->coupon->name : '', false); ?></em>
              </span>
              <span>-<?php echo e(get_currency_prefix(), false); ?>

                <span id="summary-discount<?php echo e($cart->id, false); ?>"><?php echo e($cart->coupon ? number_format($cart->discount, 2, '.', '') : number_format(0, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

              </span>
            </li>

            <li id="tax-section-li<?php echo e($cart->id, false); ?>" style="display: <?php echo e($cart->taxes > 0 ? 'block' : 'none', false); ?>;">
              <span><?php echo e(trans('theme.taxes'), false); ?></span>
              <span><?php echo e(get_currency_prefix(), false); ?>

                <span id="summary-taxes<?php echo e($cart->id, false); ?>"><?php echo e(number_format($cart->taxes, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

              </span>
            </li>

            <li>
              <span class="lead"><?php echo e(trans('theme.total'), false); ?></span>
              <span class="lead"><?php echo e(get_currency_prefix(), false); ?>

                <span id="summary-grand-total<?php echo e($cart->id, false); ?>"><?php echo e(number_format($cart->grand_total(), 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

              </span>
            </li>
          </ul>

          <hr class="style1 muted"/>

          <div class="clearfix"></div>

          <div class="text-center space20">
            <a class="btn btn-black flat" href="<?php echo e(route('cart.index'), false); ?>"><?php echo e(trans('theme.button.update_cart'), false); ?></a>
            <a class="btn btn-black flat" href="<?php echo e(url('/'), false); ?>"><?php echo e(trans('theme.button.continue_shopping'), false); ?></a>
          </div>
        </div> <!-- /.col-md-3 -->

        <div class="col-md-5">
          <h3 class="widget-title"><?php echo e(trans('theme.ship_to'), false); ?></h3>

          <?php if(isset($customer)): ?>

              <div class="row customer-address-list">
                  <?php
                    $pre_select = Null;
                  ?>
                  <?php $__currentLoopData = $customer->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $ship_to_this_address = Null;
                      // If any address not selected yet
                      if($pre_select == Null){
                        // Has onely address
                        if($customer->addresses->count() == 1) {
                          $pre_select = 1; $ship_to_this_address = TRUE;
                        }
                        // Just created this address
                        elseif(Request::has('address')) {
                          if(request()->address == $address->id){
                            $pre_select = 1; $ship_to_this_address = TRUE;
                          }
                        }
                        // Zone selected at cart page
                        elseif($cart->ship_to_country_id == $address->country_id) {
                          $pre_select = 1; $ship_to_this_address = TRUE;
                        }
                        // Customer's shipping address
                        elseif($cart->ship_to == Null && $address->address_type === 'Shipping') {
                          $pre_select = 1; $ship_to_this_address = TRUE;
                        }
                      }
                    ?>

                    <div class="col-sm-12 col-md-6 nopadding-<?php echo e($loop->iteration%2 == 1 ? 'right' : 'left', false); ?>">
                      <div class="address-list-item <?php echo e($ship_to_this_address == true ? 'selected' : '', false); ?>">
                        <?php echo $address->toHtml('<br/>', false); ?>

                        <input type="radio" class="ship-to-address" name="ship_to" value="<?php echo e($address->id, false); ?>" <?php echo e($ship_to_this_address == true ? 'checked' : '', false); ?> data-country="<?php echo e($address->country_id, false); ?>" data-state="<?php echo e($address->state_id, false); ?>" required>
                      </div>
                    </div>
                    <?php if($loop->iteration%2 == 0): ?>
                      <div class="clearfix"></div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>

              <small id="ship-to-error-block" class="text-danger pull-right"></small>

              <div class="space20"></div>

              <div class="col-sm-12 space20">
                  <a href="<?php echo e(route('my.address.create'), false); ?>" class="modalAction btn btn-default btn-sm flat pull-right">
                    <i class="fa fa-address-card-o"></i> <?php echo app('translator')->getFromJson('theme.button.add_new_address'); ?>
                  </a>
              </div>

          <?php else: ?>

              <?php echo $__env->make('forms.address', ['countries' => $business_areas->pluck('name', 'id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="form-group">
                <?php echo Form::email('email', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.email'), 'maxlength' => '100', 'required']); ?>

                <div class="help-block with-errors"></div>
              </div>

              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('create-account', Null, Null, ['id' => 'create-account-checkbox', 'class' => 'i-check']); ?> <?php echo trans('theme.create_account'); ?>

                </label>
              </div>

              <div id="create-account" class="space30" style="display: none;">
                <div class="row">
                  <div class="col-md-6 nopadding-right">
                    <div class="form-group">
                      <?php echo Form::password('password', ['class' => 'form-control flat', 'id' => 'acc-password', 'placeholder' => trans('theme.placeholder.password'), 'data-minlength' => '8']); ?>

                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6 nopadding-left">
                    <div class="form-group">
                      <?php echo Form::password('password_confirmation', ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.confirm_password'), 'data-match' => '#acc-password']); ?>

                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>

                <?php if(config('system_settings.ask_customer_for_email_subscription')): ?>
                  <div class="checkbox">
                    <label>
                      <?php echo Form::checkbox('accepts_marketing', null, null, ['class' => 'i-check']); ?> <?php echo trans('theme.input_label.subscribe_to_the_newsletter'); ?>

                    </label>
                  </div>
                <?php endif; ?>

                <p class="text-info small">
                  <i class="fa fa-info-circle"></i>
                  <?php echo trans('theme.help.create_account_on_checkout', ['link' => get_page_url(\App\Page::PAGE_TNC_FOR_CUSTOMER)]); ?>

                </p>
              </div>

              
          <?php endif; ?>

          <hr class="style4 muted"/>

          <div class="form-group">
            <?php echo Form::label('buyer_note', trans('theme.leave_message_to_seller')); ?>

            <?php echo Form::textarea('buyer_note', Null, ['class' => 'form-control flat summernote-without-toolbar', 'placeholder' => trans('theme.placeholder.message_to_seller'), 'rows' => '2', 'maxlength' => '250']); ?>

            <div class="help-block with-errors"></div>
          </div>
        </div> <!-- /.col-md-5 -->

        <div class="col-md-3">
            <h3 class="widget-title"><?php echo e(trans('theme.payment_options'), false); ?></h3>
            <?php
              $activeManualPaymentMethods = $shop->config->manualPaymentMethods;
            ?>

            <div class="space30">
              <?php $__currentLoopData = $shop->paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  switch ($payment_provider->code) {
                    case 'stripe':
                      $has_config = $shop->config->stripe ? TRUE : FALSE;
                      $info = trans('theme.notify.we_dont_save_card_info');
                      break;

                    case 'instamojo':
                      $has_config = $shop->config->instamojo ? TRUE : FALSE;
                      $info = trans('theme.notify.you_will_be_redirected_to_instamojo');
                      break;

                    case 'authorize-net':
                      $has_config = $shop->config->authorizeNet ? TRUE : FALSE;
                      $info = trans('theme.notify.we_dont_save_card_info');
                      break;

                    case 'cybersource':
                      $has_config = $shop->config->cybersource ? TRUE : FALSE;
                      $info = trans('theme.notify.we_dont_save_card_info');
                      break;

                    case 'paypal-express':
                      $has_config = $shop->config->paypalExpress ? TRUE : FALSE;
                      $info = trans('theme.notify.you_will_be_redirected_to_paypal');
                      break;

                    case 'paystack':
                      $has_config = $shop->config->paystack ? TRUE : FALSE;
                      $info = trans('theme.notify.you_will_be_redirected_to_paystack');
                      break;

                    case 'wire':
                    case 'cod':
                      $has_config = in_array($payment_provider->id, $activeManualPaymentMethods->pluck('id')->toArray()) ? TRUE : FALSE;
                      $temp = $activeManualPaymentMethods->where('id', $payment_provider->id)->first();
                      $info = $temp ? $temp->pivot->additional_details : '';
                      break;
              
                    case 'bkash':
                      $has_config = TRUE;
                    
                      break;

                    default:
                      $has_config = FALSE;
                      break;
                  }
                ?>

                
                <?php if( ! $has_config ) continue; ?>
              
             

                <?php if($customer && (\App\PaymentMethod::TYPE_CREDIT_CARD == $payment_provider->type) && $customer->hasBillingToken()): ?>
                  <div class="form-group">
                    <label>
                      <input name="payment_method" value="saved_card" class="i-radio-blue payment-option" type="radio" data-info="<?php echo e($info, false); ?>" data-type="<?php echo e($payment_provider->type, false); ?>" required="required" checked /> <?php echo app('translator')->getFromJson('theme.card'); ?>: <i class="fa fa-cc-<?php echo e(strtolower($customer->card_brand), false); ?>"></i> ************<?php echo e($customer->card_last_four, false); ?>

                    </label>
                  </div>
                <?php endif; ?>

                <div class="form-group">
                  <label>
                    <input name="payment_method" value="<?php echo e($payment_provider->id, false); ?>" data-code="<?php echo e($payment_provider->code, false); ?>" class="i-radio-blue payment-option" type="radio" data-info="<?php echo e($info, false); ?>" data-type="<?php echo e($payment_provider->type, false); ?>" required="required" <?php echo e(old('payment_method') == $payment_provider->id ? 'checked' : '', false); ?>/> <?php echo e($payment_provider->code == 'stripe' ? trans('theme.credit_card') : $payment_provider->name, false); ?>

                  </label>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div id="authorize-net-cc-form" class="authorize-net-cc-form" style="display: none;">
              <hr class="style4 muted">
              <div class="stripe-errors alert alert-danger flat small hide"><?php echo e(trans('messages.trouble_validating_card'), false); ?></div>
              <div class="form-group form-group-cc-name">
                <?php echo Form::text('cardholder_name', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.cardholder_name'), 'data-error' => trans('theme.help.enter_cardholder_name')]); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-number">
                <?php echo Form::text('cnumber', Null, ['id' => 'cnumber', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.card_number')]); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-cvc">
                <?php echo Form::text('ccode', Null, ['id' => 'ccode', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.card_cvc')]); ?>

                <div class="help-block with-errors"></div>
              </div>

              <div class="row">
                <div class="col-md-6 nopadding-right">
                  <div class="form-group has-feedback">
                    <?php echo e(Form::selectMonth('card_expiry_month', Null, ['id' =>'card_expiry_month', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.card_exp_month'), 'data-error' => trans('theme.help.card_exp_month')], '%m'), false); ?>

                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-6 nopadding-left">
                  <div class="form-group has-feedback">
                    <?php echo e(Form::selectYear('card_expiry_year', date('Y'), date('Y') + 10, Null, ['id' =>'card_expiry_year', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.card_exp_year'), 'data-error' => trans('theme.help.card_exp_year')]), false); ?>

                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
            </div> <!-- /#authorize-net-cc-form -->

            
            <div id="cc-form" class="cc-form" style="display: none;">
              <hr class="style4 muted">
              <div class="stripe-errors alert alert-danger flat small hide"><?php echo e(trans('messages.trouble_validating_card'), false); ?></div>
              <div class="form-group form-group-cc-name">
                <?php echo Form::text('name', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.cardholder_name'), 'data-error' => trans('theme.help.enter_cardholder_name'), 'data-stripe' => 'name']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-number">
                <input type="text" class='form-control flat' placeholder="<?php echo app('translator')->getFromJson('theme.placeholder.card_number'); ?>" data-stripe='number'/>
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-cvc">
                <input type="text" class='form-control flat' placeholder="<?php echo app('translator')->getFromJson('theme.placeholder.card_cvc'); ?>" data-stripe='cvc'/>
                <div class="help-block with-errors"></div>
              </div>

              <div class="row">
                <div class="col-md-6 nopadding-right">
                  <div class="form-group has-feedback">
                    <?php echo e(Form::selectMonth('exp-month', Null, ['id' =>'exp-month', 'class' => 'form-control flat', 'data-stripe' => 'exp-month', 'placeholder' => trans('theme.placeholder.card_exp_month'), 'data-error' => trans('theme.help.card_exp_month')], '%m'), false); ?>

                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-6 nopadding-left">
                  <div class="form-group has-feedback">
                    <?php echo e(Form::selectYear('exp-year', date('Y'), date('Y') + 10, Null, ['id' =>'exp-year', 'class' => 'form-control flat', 'data-stripe' => 'exp-year', 'placeholder' => trans('theme.placeholder.card_exp_year'), 'data-error' => trans('theme.help.card_exp_year')]), false); ?>

                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>

              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('remember_the_card', null, null, ['id' => 'remember-the-card', 'class' => 'i-check']); ?> <?php echo trans('theme.remember_card_for_future_use'); ?>

                </label>
              </div>
            </div> <!-- /#cc-form -->
       
              
			

            <p id="payment-instructions" class="text-info small space30">
              <i class="fa fa-info-circle"></i>
              <span><?php echo app('translator')->getFromJson('theme.placeholder.select_payment_option'); ?></span>
            </p>
            <div id="submit-btn-block" class="clearfix space30" style="display: none;">
              <button id="pay-now-btn"  class="btn btn-primary btn-lg btn-block" type="submit">
                <small><i class="fa fa-shield"></i> <span id="pay-now-btn-txt"><?php echo app('translator')->getFromJson('theme.button.checkout'); ?></span></small>
              </button>

              <a href="javascript:void(0)" id="paypal-express-btn" class="hide" type="submit">
                <img src="<?php echo e(asset(sys_image_path('payment-methods') . "paypal-express.png"), false); ?>" width="70%" alt="paypal express checkout" title="paypal-express" />
              </a>
            </div>
        </div> <!-- /.col-md-4 -->
      </div><!-- /.row -->
    <?php echo Form::close(); ?>

  </div>
</section><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/contents/checkout_page.blade.php ENDPATH**/ ?>