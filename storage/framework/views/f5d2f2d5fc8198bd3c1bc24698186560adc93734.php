<div class="admin-user-widget">
    <span class="admin-user-widget-img">
        <img src="<?php echo e(get_catalog_featured_img_src($product, 'small'), false); ?>" class="thumbnail" alt="<?php echo e(trans('app.image'), false); ?>">
    </span>

    <div class="admin-user-widget-content">
        <span class="admin-user-widget-title">
            <?php echo e($product->name, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e($product->gtin_type.': '.$product->gtin, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e(trans('app.model_number').': '.$product->model_number, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e(trans('app.manufacturer').': '.optional($product->manufacturer)->name, false); ?>

            <i class="fa fa-check-square-o pull-right" style="position: absolute; right: 30px; top: 90px; font-size: 40px; color: rgba(0, 0, 0, 0.2);"></i>
        </span>
    </div>            <!-- /.admin-user-widget-content -->
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_product_widget.blade.php ENDPATH**/ ?>