<div class="product-info">
  <?php if($item->product->manufacturer->slug): ?>
    <a href="<?php echo e(route('show.brand', $item->product->manufacturer->slug), false); ?>" class="product-info-seller-name"><?php echo $item->product->manufacturer->name; ?></a>
  <?php else: ?>
    <a href="<?php echo e(route('show.store', $item->shop->slug), false); ?>" class="product-info-seller-name">
      <?php echo $item->shop->getQualifiedName(); ?>

    </a>
  <?php endif; ?>

  <h5 class="product-info-title space10" data-name="product_name"><?php echo $item->title; ?></h5>

  <?php echo $__env->make('layouts.ratings', ['ratings' => $item->feedbacks->avg('rating'), 'count' => $item->feedbacks_count], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('layouts.pricing', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="row">
    <div class="col-sm-6 col-xs-12 nopadding-right">
        <div class="product-info-availability space10"><?php echo app('translator')->getFromJson('theme.availability'); ?>:
          <span><?php echo e($item->stock_quantity > 0 ? trans('theme.in_stock') : trans('theme.out_of_stock'), false); ?></span>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12 nopadding-left">
        <div class="product-info-condition space10">

          <?php echo app('translator')->getFromJson('theme.condition'); ?>: <span><b id="item_condition"><?php echo $item->condition; ?></b></span>

          <?php if($item->condition_note): ?>
            <sup><i class="fa fa-question" id="item_condition_note" data-toggle="tooltip" title="<?php echo $item->condition_note; ?>" data-placement="top"></i></sup>
          <?php endif; ?>
        </div>
    </div>
  </div><!-- /.row -->

  <div class="row">
    <div class="col-sm-6 col-xs-12 nopadding-right">
      <a href="<?php echo e(route('wishlist.add', $item), false); ?>" class="btn btn-link">
        <i class="fa fa-heart-o"></i> <?php echo app('translator')->getFromJson('theme.button.add_to_wishlist'); ?>
      </a>
    </div>
    <div class="col-sm-6 col-xs-12 nopadding-left">
      <?php if('quickView.product' == Route::currentRouteName()): ?>
        <a href="<?php echo e(route('show.store', $item->shop->slug), false); ?>" class="btn btn-link">
          <i class="fa fa-list-alt"></i> <?php echo app('translator')->getFromJson('theme.more_items_from_this_seller', ['seller' => $item->shop->name]); ?>
        </a>
      
        
      <?php else: ?>
        <a href="javascript:void(0);" class="btn btn-link" data-toggle="modal" data-target="<?php echo e(Auth::guard('customer')->check() ? "#contactSellerModal" : "#loginModal", false); ?>">
          <i class="fa fa-envelope-o"></i> <?php echo app('translator')->getFromJson('theme.button.contact_seller'); ?>
        </a>
      <?php endif; ?>
    </div>
  </div><!-- /.row -->
</div><!-- /.product-info -->

<?php echo $__env->make('layouts.share_btns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/layouts/product_info.blade.php ENDPATH**/ ?>