<?php if($wishlist->count() > 0): ?>
    <div class="row product-list">
        <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12">
                <div class="product product-list-view">
                    <ul class="product-info-labels">
                        <?php if($wish->inventory->free_shipping == 1): ?>
                            <li><?php echo app('translator')->getFromJson('theme.free_shipping'); ?></li>
                        <?php endif; ?>
                        <?php if($wish->inventory->stuff_pick == 1): ?>
                            <li><?php echo app('translator')->getFromJson('theme.stuff_pick'); ?></li>
                        <?php endif; ?>
                        <?php if($wish->inventory->hasOffer()): ?>
                            <li><?php echo app('translator')->getFromJson('theme.percent_off', ['value' => get_percentage_of($wish->inventory->sale_price, $wish->inventory->offer_price)]); ?></li>
                        <?php endif; ?>
                    </ul>

                    <div class="product-img-wrap">
                        <img class="product-img-primary" src="<?php echo e(get_product_img_src($wish->inventory, 'medium'), false); ?>" alt="<?php echo $wish->inventory->title; ?>" title="<?php echo $wish->inventory->title; ?>" />

                        <img class="product-img-alt" src="<?php echo e(get_product_img_src($wish->inventory, 'medium', 'alt'), false); ?>" alt="<?php echo $wish->inventory->title; ?>" title="<?php echo $wish->inventory->title; ?>" />

                        <a class="product-link" href="<?php echo e(route('show.product', $wish->inventory->slug), false); ?>"></a>
                    </div>

                    <div class="product-actions">
                        <a class="btn btn-default flat itemQuickView" href="<?php echo e(route('quickView.product', $wish->inventory->slug), false); ?>">
                            <i class="fa fa-external-link" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('theme.button.quick_view'); ?>"></i>
                            <span><?php echo app('translator')->getFromJson('theme.button.quick_view'); ?></span>
                        </a>

                        <a class="btn btn-primary flat" href="<?php echo e(route('direct.checkout', $wish->inventory->slug), false); ?>">
                            <i class="fa fa-rocket"></i> <?php echo app('translator')->getFromJson('theme.button.buy_now'); ?>
                        </a>

                        <?php echo Form::open(['route' => ['wishlist.remove', $wish], 'method' => 'delete', 'class' => 'data-form']); ?>

                            <button class="btn btn-link btn-block confirm" type="submit">
                                <i class="fa fa-trash-o" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('theme.button.remove_from_wishlist'); ?>"></i>
                                <span><?php echo app('translator')->getFromJson('theme.button.remove'); ?></span>
                            </button>
                        <?php echo Form::close(); ?>

                    </div>

                    <div class="product-info">
                        <?php echo $__env->make('layouts.ratings', ['ratings' => $wish->inventory->feedbacks->avg('rating')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <a href="<?php echo e(route('show.product', $wish->inventory->slug), false); ?>" class="product-info-title">
                            <?php echo $wish->inventory->title; ?>

                        </a>

                        <div class="product-info-availability">
                            <?php echo app('translator')->getFromJson('theme.availability'); ?>: <span><?php echo e(($wish->inventory->stock_quantity > 0) ? trans('theme.in_stock') : trans('theme.out_of_stock'), false); ?></span>
                        </div>

                        <?php echo $__env->make('layouts.pricing', ['item' => $wish->inventory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="product-info-desc"> <?php echo $wish->inventory->description; ?> </div>
                        <ul class="product-info-feature-list">
                            <li><?php echo e($wish->inventory->condition, false); ?></li>
                        </ul>
                    </div><!-- /.product-info -->
                </div><!-- /.product -->
            </div><!-- /.col-md-* -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div><!-- /.row .product-list -->
    <div class="sep"></div>
<?php else: ?>
  <div class="clearfix space50"></div>
  <p class="lead text-center space50">
    <?php echo app('translator')->getFromJson('theme.empty_wishlist'); ?>
    <a href="<?php echo e(url('/'), false); ?>" class="btn btn-primary btn-sm flat"><?php echo app('translator')->getFromJson('theme.button.shop_now'); ?></a>
  </p>
<?php endif; ?>

<div class="row pagenav-wrapper">
    <?php echo e($wishlist->links('layouts.pagination'), false); ?>

</div><!-- /.row .pagenav-wrapper -->

<div class="clearfix space20"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/wishlist.blade.php ENDPATH**/ ?>