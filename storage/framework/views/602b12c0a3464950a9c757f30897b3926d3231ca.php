

<?php $__env->startSection('content'); ?>
    <!-- MAIN SLIDER -->
    <?php echo $__env->make('sliders.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- BEST DEALS BANNER -->
    <?php echo $__env->make('banners.best_deals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- TRENDING ITEMS -->
    <section>
        <div class="container">
          <div class="row">
              <div class="col-md-12 nopadding">
                <div class="section-title">
                  <h4><?php echo trans('theme.section_headings.trending_now'); ?></h4>
                </div>

                <?php echo $__env->make('sliders.carousel_with_feedback', ['products' => $trending], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <!-- PRODUCTS -->
    <?php echo $__env->make('contents.products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- BROWSING ITEMS -->
    <?php echo $__env->make('sliders.browsing_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Bottom Banner -->
    <?php echo $__env->make('banners.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/index.blade.php ENDPATH**/ ?>