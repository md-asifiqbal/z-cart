<div class="admin-user-widget">
    <span class="admin-user-widget-img">
        <img src="<?php echo e(get_catalog_featured_img_src($product->id, 'small'), false); ?>" class="thumbnail" alt="<?php echo e(trans('app.image'), false); ?>">
    </span>
    <div class="admin-user-widget-content">
        <span class="admin-user-widget-title">
            <?php echo e($product->name, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e($product->gtin_type ?? 'GTIN: ', false); ?> <?php echo e(': '.$product->gtin, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e(trans('app.model_number').': '.$product->model_number, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e(trans('app.brand').': '.$product->brand, false); ?>

        </span>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $product)): ?>
            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.product.show', $product->id), false); ?>" class="ajax-modal-btn small"><?php echo e(trans('app.view_detail'), false); ?></a>
        <?php endif; ?>

        <span class="option-btn" style=" margin-top: -50px;">
            <?php if($product->has_variant): ?>
                <a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.setVariant', $product->id), false); ?>" class="ajax-modal-btn btn bg-olive btn-flat"><?php echo e(trans('app.add_to_inventory_with_variant'), false); ?></a>
            <?php endif; ?>

            <a href="<?php echo e(route('admin.stock.inventory.add', $product->id), false); ?>" class="btn bg-purple btn-flat"><?php echo e(trans('app.add_to_inventory'), false); ?></a>
        </span>
    </div>            <!-- /.admin-user-widget-content -->
</div>          <!-- /.admin-user-widget --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/inventory/_product_list.blade.php ENDPATH**/ ?>