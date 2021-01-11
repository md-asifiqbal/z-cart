<section>
  <div class="container">
    <div class="row">
      <div class="col-md-9 nopadding-left">

        <div class="space20"></div>

        <!-- Place one Banner -->
        <?php echo $__env->make('banners.place_one', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row">
          <div class="section-title">
            <h4><?php echo trans('theme.section_headings.recently_added'); ?></h4>
          </div>

          <?php echo $__env->make('sliders.carousel_without_feedback', ['products' => $recent], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div><!-- /.row -->

        <!-- Place Two Banner -->
        <?php echo $__env->make('banners.place_two', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row">
          <div class="section-title">
            <h4><?php echo trans('theme.section_headings.additional_items'); ?></h4>
          </div>

          <?php echo $__env->make('sliders.carousel_thumbs', ['products' => $additional_items], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- /.row -->

        <!-- Place Three Banner -->
        <?php echo $__env->make('banners.place_three', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div> <!-- /.col-md-9 -->

      <div class="col-md-3 nopadding-right bg-light">
        <div class="section-title" style="margin-top: 30px;">
          <h4><?php echo trans('theme.section_headings.weekly_popular'); ?></h4>
        </div>

        <?php echo $__env->make('contents.sidebar_product_list', ['products' => $weekly_popular], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="space30"></div>

        <!-- Sidebar Banner -->
        <?php echo $__env->make('banners.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div> <!-- /.col-md-3 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/products.blade.php ENDPATH**/ ?>