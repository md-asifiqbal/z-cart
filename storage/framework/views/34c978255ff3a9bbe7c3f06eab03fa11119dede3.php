<?php $__env->startSection('content'); ?>
    <!-- HEADER SECTION -->
    <?php echo $__env->make('headers.product_page', ['product' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- CONTENT SECTION -->
    <?php echo $__env->make('contents.product_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- RELATED ITEMS -->
    <section id="related-items">
        <div class="container">
          <div class="row">
              <div class="col-md-12 nopadding">
                <div class="section-title">
                  <h4><?php echo trans('theme.section_headings.related_items'); ?></h4>
                </div>

                <?php echo $__env->make('sliders.carousel_with_feedback', ['products' => $related], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <div class="clearfix space20"></div>

    <!-- BROWSING ITEMS -->
    <?php echo $__env->make('sliders.browsing_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- bottom Banner -->
    <?php echo $__env->make('banners.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- MODALS -->
    <?php echo $__env->make('modals.shopReviews', ['shop' => $item->shop], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(Auth::guard('customer')->check()): ?>
      <?php echo $__env->make('modals.contact_seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if(is_chat_enabled($item->shop)): ?>
        <?php echo $__env->make('scripts.chatbox', ['shop' => $item->shop, 'agent' => $item->shop->owner, 'agent_status' => trans('theme.online')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('modals.ship_to', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.product_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/product.blade.php ENDPATH**/ ?>