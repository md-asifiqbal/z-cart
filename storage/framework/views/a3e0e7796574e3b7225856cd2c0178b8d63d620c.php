<?php if( Auth::user()->shop->isDown() ): ?>

    <?php if (! (Request::is('admin/setting/general*'))): ?>
      <div class="alert alert-error alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <strong><i class="icon fa fa-warning"></i><?php echo e(trans('app.alert'), false); ?></strong>
          <?php echo trans('messages.listings_not_visible', ['reason' => trans('messages.youe_shop_in_maintenance_mode')]); ?>

          <?php if(Auth::user()->isMerchant()): ?>
            <span class="pull-right">
                <a href="<?php echo e(route('admin.setting.config.general'), false); ?>" class="btn bg-navy"><i class="fa fa-rocket"></i>  <?php echo e(trans('app.take_action'), false); ?></a>
            </span>
          <?php endif; ?>
      </div>
    <?php endif; ?>

<?php elseif( ! Auth::user()->shop->active ): ?>

    <div class="alert alert-error alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon fa fa-warning"></i><?php echo e(trans('app.alert'), false); ?></strong>
        <?php echo trans('messages.your_shop_in_hold'); ?>

    </div>

<?php elseif( ! Auth::user()->shop->hasPaymentMethods() ): ?>

    <?php if (! (Request::is('admin/setting/paymentMethod*'))): ?>
      <div class="alert alert-error alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <strong><i class="icon fa fa-warning"></i><?php echo e(trans('app.alert'), false); ?></strong>
          <?php echo trans('messages.listings_not_visible', ['reason' => trans('messages.no_active_payment_method')]); ?>

          <?php if(Auth::user()->isMerchant()): ?>
            <span class="pull-right">
                <a href="<?php echo e(route('admin.setting.config.paymentMethod.index'), false); ?>" class="btn bg-navy"><i class="fa fa-rocket"></i>  <?php echo e(trans('app.take_action'), false); ?></a>
            </span>
          <?php endif; ?>
      </div>
    <?php endif; ?>

<?php elseif( ! Auth::user()->shop->hasAddress() ): ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon fa fa-warning"></i><?php echo e(trans('app.alert'), false); ?></strong>
        <?php echo trans('messages.no_address_for_invoice'); ?>

        <?php if(Auth::user()->isMerchant() && ! Request::is('admin/setting/general*')): ?>
          <span class="pull-right">
              <a href="<?php echo e(route('admin.setting.config.general'), false); ?>" class="btn bg-navy"><i class="fa fa-rocket"></i>  <?php echo e(trans('app.take_action'), false); ?></a>
          </span>
        <?php endif; ?>
    </div>
<?php elseif( ! Auth::user()->shop->hasShippingZones() ): ?>

    <?php if (! (Request::is('admin/shipping/shippingZone*'))): ?>
      <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <strong><i class="icon fa fa-warning"></i><?php echo e(trans('app.alert'), false); ?></strong>
          <?php echo trans('messages.no_active_shipping_zone'); ?>

          <?php if(Auth::user()->isMerchant()): ?>
            <span class="pull-right">
                <a href="<?php echo e(route('admin.shipping.shippingZone.index'), false); ?>" class="btn bg-navy"><i class="fa fa-rocket"></i>  <?php echo e(trans('app.take_action'), false); ?></a>
            </span>
          <?php endif; ?>
      </div>
    <?php endif; ?>

<?php endif; ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/_listings_notice.blade.php ENDPATH**/ ?>