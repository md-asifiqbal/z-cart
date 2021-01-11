<section>
  <div class="container full-width">
      <div class="row">
        <?php if($products->count()): ?>
          <div class="col-sm-2 bg-light">

            <?php echo $__env->make('contents.product_list_sidebar_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          </div><!-- /.col-sm-2 -->
          <div class="col-sm-10" style="padding-left: 15px;">

            <?php echo $__env->make('contents.product_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(config('system_settings.show_seo_info_to_frontend')): ?>
              <div class="clearfix space20"></div>
              <span class="lead"><?php echo $category->meta_title; ?></span>
              <p><?php echo $category->meta_description; ?></p>
              <div class="clearfix space20"></div>
            <?php endif; ?>

          </div><!-- /.col-sm-10 -->

        <?php else: ?>

          <div class="clearfix space50"></div>
          <p class="lead text-center space50">
            <span class="space50"><?php echo app('translator')->getFromJson('theme.no_product_found'); ?></span><br/>
            <div class="space50 text-center">
              <a href="<?php echo e(url('categories'), false); ?>" class="btn btn-primary btn-sm flat"><?php echo app('translator')->getFromJson('theme.button.shop_from_other_categories'); ?></a>
            </div>
          </p>
          <div class="clearfix space50"></div>
        <?php endif; ?>
      </div><!-- /.row -->
  </div><!-- /.container -->
</section><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/contents/category_page.blade.php ENDPATH**/ ?>