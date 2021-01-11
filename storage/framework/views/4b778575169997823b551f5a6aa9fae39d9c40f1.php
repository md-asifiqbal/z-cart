<section>
  <div class="container">
    <?php if($carts->count() > 0): ?>
      <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $cart_total = 0;

            $shipping_country_id = $cart->ship_to_country_id ?? optional($geoip_country)->id;
            $shipping_state_id = $cart->ship_to_state_id ?? optional($geoip_state)->id;

            $shop_id = $cart->shop_id;

            $shipping_zone = get_shipping_zone_of($shop_id, $shipping_country_id, $shipping_state_id);

            $shipping_options = isset($shipping_zone->id) ? getShippingRates($shipping_zone->id) : 'NaN';

            $packaging_options = optional($cart->shop)->packagings;

            if($cart->shop){
              $default_packaging = $cart->shippingPackage ??
                                    optional($cart->shop->packagings)->where('default', 1)->first() ??
                                    $platformDefaultPackaging;
            }
            else{
                $default_packaging = $cart->shippingPackage ?? $platformDefaultPackaging;
            }
        ?>

        <div class="row shopping-cart-table-wrap space30 <?php echo e($expressId == $cart->id ? 'selected' : '', false); ?>" id="cartId<?php echo e($cart->id, false); ?>" data-cart="<?php echo e($cart->id, false); ?>">
          <?php echo Form::model($cart, ['method' => 'PUT', 'route' => ['cart.update', $cart->id], 'id' => 'formId'.$cart->id]); ?>

            <?php echo e(Form::hidden('cart_id', $cart->id, ['id' => 'cart-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('shop_id', $cart->shop->id, ['id' => 'shop-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('tax_id', isset($shipping_zone->id) ? $shipping_zone->tax_id : Null, ['id' => 'tax-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('taxrate', Null, ['id' => 'cart-taxrate'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('packaging_id', $default_packaging ? $default_packaging->id : Null, ['id' => 'packaging-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('ship_to', $cart->ship_to, ['id' => 'ship-to'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('zone_id', isset($shipping_zone->id) ? $shipping_zone->id : Null, ['id' => 'zone-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('shipping_rate_id', $cart->shipping_rate_id, ['id' => 'shipping-rate-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('ship_to_country_id', $cart->ship_to_country_id, ['id' => 'shipto-country-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('ship_to_state_id', $cart->ship_to_state_id, ['id' => 'shipto-state-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('discount_id', $cart->coupon_id, ['id' => 'discount-id'.$cart->id]), false); ?>

            <?php echo e(Form::hidden('handling_cost', optional($cart->shop->config)->order_handling_cost, ['id' => 'handling-cost'.$cart->id]), false); ?>


            <div class="col-md-9 nopadding">
                <div class="shopping-cart-header-section">
                  <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <span><?php echo app('translator')->getFromJson('theme.store'); ?>:</span>
                        <?php if($cart->shop->slug): ?>
                          <a href="<?php echo e(route('show.store', $cart->shop->slug), false); ?>"> <?php echo e($cart->shop->name, false); ?></a>
                        <?php else: ?>
                          <?php echo app('translator')->getFromJson('theme.store_not_available'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <span class="pull-right">
                            <?php echo app('translator')->getFromJson('theme.ship_to'); ?>:
                            <a id="shipTo<?php echo e($cart->id, false); ?>" class="ship_to" data-cart="<?php echo e($cart->id, false); ?>" data-country="<?php echo e($shipping_country_id, false); ?>" data-state="<?php echo e($shipping_state_id, false); ?>" href="javascript:void(0)">
                              <?php echo e($shipping_state_id ? $cart->state->name : $cart->country->name, false); ?>

                            </a>
                        </span>
                    </div>
                  </div>
                </div>

                <table class="table table shopping-cart-item-table" id="table<?php echo e($cart->id, false); ?>">
                    <thead>
                      <tr>
                          <th width="65px"><?php echo e(trans('theme.image'), false); ?></th>
                          <th width="52%" class="hidden-sm hidden-xs"><?php echo e(trans('theme.description'), false); ?></th>
                          <th><?php echo e(trans('theme.price'), false); ?></th>
                          <th><?php echo e(trans('theme.quantity'), false); ?></th>
                          <th><?php echo e(trans('theme.total'), false); ?></th>
                          <th>&nbsp;</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $__currentLoopData = $cart->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $unit_price = $item->currnt_sale_price();
                          $item_total = $unit_price * $item->pivot->quantity;
                          $cart_total += $item_total;
                        ?>
                        <tr class="cart-item-tr">
                          <td>
                            <input type="hidden" class="freeShipping<?php echo e($cart->id, false); ?>" value="<?php echo e($item->free_shipping, false); ?>">
                            <input type="hidden" id="unitWeight<?php echo e($item->id, false); ?>" value="<?php echo e($item->shipping_weight, false); ?>">
                            <?php echo e(Form::hidden('shipping_weight['.$item->id.']', ($item->shipping_weight * $item->pivot->quantity), ['id' => 'itemWeight'.$item->id, 'class' => 'itemWeight'.$cart->id]), false); ?>

                            <img src="<?php echo e(get_product_img_src($item, 'mini'), false); ?>" class="img-mini" alt="<?php echo e($item->slug, false); ?>" title="<?php echo e($item->slug, false); ?>" />
                          </td>
                          <td class="hidden-sm hidden-xs">
                            <div class="shopping-cart-item-title">
                              <a href="<?php echo e(route('show.product', $item->slug), false); ?>" class="product-info-title"><?php echo e($item->pivot->item_description, false); ?></a>
                            </div>
                          </td>
                          <td class="shopping-cart-item-price">
                            <span><?php echo e(get_currency_prefix(), false); ?>

                              <span id="item-price<?php echo e($cart->id, false); ?>-<?php echo e($item->id, false); ?>" data-value="<?php echo e($unit_price, false); ?>"><?php echo e(number_format($unit_price, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

                            </span>
                          </td>
                          <td>
                            <div class="product-info-qty-item">
                              <button class="product-info-qty product-info-qty-minus">-</button>
                              <input name="quantity[<?php echo e($item->id, false); ?>]" id="itemQtt<?php echo e($item->id, false); ?>" class="product-info-qty product-info-qty-input" data-cart="<?php echo e($cart->id, false); ?>" data-item="<?php echo e($item->id, false); ?>" data-min="<?php echo e($item->min_order_quantity, false); ?>" data-max="<?php echo e($item->stock_quantity, false); ?>" type="text" value="<?php echo e($item->pivot->quantity, false); ?>">
                              <button class="product-info-qty product-info-qty-plus">+</button>
                            </div>
                          </td>
                          <td>
                            <span><?php echo e(get_currency_prefix(), false); ?>

                              <span id="item-total<?php echo e($cart->id, false); ?>-<?php echo e($item->id, false); ?>" class="item-total<?php echo e($cart->id, false); ?>"><?php echo e(number_format($item_total, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

                            </span>
                          </td>
                          <td>
                            <a class="cart-item-remove" href="#" data-cart="<?php echo e($cart->id, false); ?>" data-item="<?php echo e($item->id, false); ?>" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('theme.remove_item'); ?>">&times;</a>
                          </td>
                        </tr> <!-- /.order-body -->
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    <tfoot>
                      <tr>
                        <td colspan="6">
                          <div class="input-group full-width">
                            <span class="input-group-addon flat">
                              <i class="fa fa-ticket"></i>
                            </span>
                            <input name="coupon" value="<?php echo e($cart->coupon ? $cart->coupon->code : Null, false); ?>" id="coupon<?php echo e($cart->id, false); ?>" class="form-control flat" type="text" placeholder="<?php echo app('translator')->getFromJson('theme.placeholder.have_coupon_from_seller'); ?>">
                            <span class="input-group-btn">
                              <button class="btn btn-default flat apply_seller_coupon" type="button" data-cart="<?php echo e($cart->id, false); ?>"><?php echo app('translator')->getFromJson('theme.button.apply_coupon'); ?></button>
                            </span>
                          </div><!-- /input-group -->
                        </td>
                      </tr>
                    </tfoot>
                </table>

                <div class="notice notice-warning notice-sm hidden" id="shipping-notice<?php echo e($cart->id, false); ?>">
                  <strong><?php echo e(trans('theme.warning'), false); ?></strong> <?php echo app('translator')->getFromJson('theme.notify.seller_doesnt_ship'); ?>
                </div>
                <div class="notice notice-danger notice-sm hidden" id="store-unavailable-notice<?php echo e($cart->id, false); ?>">
                  <strong><?php echo e(trans('theme.warning'), false); ?></strong> <?php echo app('translator')->getFromJson('theme.notify.store_not_available'); ?>
                </div>
            </div><!-- /.col-md-9 -->

            <div class="col-md-3 space20">
                <div class="side-widget" id="cart-summary<?php echo e($cart->id, false); ?>">
                    <h3 class="side-widget-title"><span><?php echo e(trans('theme.cart_summary'), false); ?></span></h3>
                    <ul class="shopping-cart-summary">
                        <li>
                          <span><?php echo e(trans('theme.subtotal'), false); ?></span>
                            <span><?php echo e(get_currency_prefix(), false); ?>

                            <span id="summary-total<?php echo e($cart->id, false); ?>"><?php echo e(number_format($cart_total, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

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

                            <span id="summary-shipping<?php echo e($cart->id, false); ?>"><?php echo e(number_format(0, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

                          </span>
                        </li>
                        <?php if (! (empty(json_decode($packaging_options)))): ?>
                          <li>
                            <span>
                              <a class="packaging-options" data-toggle="popover" data-cart="<?php echo e($cart->id, false); ?>" data-options="<?php echo e($packaging_options, false); ?>" title="<?php echo e(trans('theme.packaging'), false); ?>">
                                <u><?php echo e(trans('theme.packaging'), false); ?></u>
                              </a>
                              <em class="small text-muted" id="summary-packaging-name<?php echo e($cart->id, false); ?>">
                                <?php echo e($default_packaging ? $default_packaging->name : '', false); ?>

                              </em>
                            </span>
                            <span><?php echo e(get_currency_prefix(), false); ?>

                                <span id="summary-packaging<?php echo e($cart->id, false); ?>">
                                <?php echo e(number_format($default_packaging ? $default_packaging->cost : 0, 2, '.', ''), false); ?>

                              </span><?php echo e(get_currency_suffix(), false); ?>

                            </span>
                          </li>
                        <?php endif; ?>
                        <li id="discount-section-li<?php echo e($cart->id, false); ?>" style="display: <?php echo e($cart->coupon ? 'block' : 'none', false); ?>;">
                          <span><?php echo e(trans('theme.discount'), false); ?>

                            <em id="summary-discount-name<?php echo e($cart->id, false); ?>" class="small text-muted"><?php echo e($cart->coupon ? $cart->coupon->name : '', false); ?></em>
                          </span>
                          <span>-<?php echo e(get_currency_prefix(), false); ?>

                            <span id="summary-discount<?php echo e($cart->id, false); ?>"><?php echo e($cart->coupon ? number_format($cart->discount, 2, '.', '') : number_format(0, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

                          </span>
                        </li>
                        <li id="tax-section-li<?php echo e($cart->id, false); ?>" style="display: none;">
                          <span><?php echo e(trans('theme.taxes'), false); ?></span>
                            <span><?php echo e(get_currency_prefix(), false); ?>

                            <span id="summary-taxes<?php echo e($cart->id, false); ?>"><?php echo e(number_format(0, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

                          </span>
                        </li>
                        <li>
                          <span><?php echo e(trans('theme.total'), false); ?></span>
                            <span><?php echo e(get_currency_prefix(), false); ?>

                            <span id="summary-grand-total<?php echo e($cart->id, false); ?>"><?php echo e(number_format(0, 2, '.', ''), false); ?></span><?php echo e(get_currency_suffix(), false); ?>

                          </span>
                        </li>
                    </ul>
                </div>

                <?php if(allow_checkout()): ?>
                  <button class="btn btn-primary btn-sm flat pull-right" id="checkout-btn<?php echo e($cart->id, false); ?>" type="submit"><i class="fa fa-shopping-cart"></i> <?php echo e(trans('theme.button.buy_from_this_seller'), false); ?></button>
                <?php else: ?>
                  <a href="#nav-login-dialog" data-toggle="modal" data-target="#loginModal" class="btn btn-primary btn-sm flat pull-right"><i class="fa fa-shopping-cart"></i> <?php echo e(trans('theme.button.buy_from_this_seller'), false); ?></a>
                <?php endif; ?>
            </div> <!-- /.col-md-3 -->
          <?php echo Form::close(); ?>

        </div> <!-- /.row -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <a class="btn btn-black flat" href="<?php echo e(url('/'), false); ?>"><?php echo e(trans('theme.button.continue_shopping'), false); ?></a>
    <?php else: ?>
      <div class="clearfix space50"></div>
      <p class="lead text-center space50">
        <?php echo e(trans('theme.empty_cart'), false); ?><br/><br/>
        <a href="<?php echo e(url('/'), false); ?>" class="btn btn-primary btn-sm flat"><?php echo app('translator')->getFromJson('theme.button.shop_now'); ?></a>
      </p>
    <?php endif; ?>
  </div> <!-- /.container -->
</section><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/contents/cart_page.blade.php ENDPATH**/ ?>