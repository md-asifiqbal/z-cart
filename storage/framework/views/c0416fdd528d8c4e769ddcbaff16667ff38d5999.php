<div class="admin-user-widget">
    <span class="admin-user-widget-img">
        <img src="<?php echo e(get_storage_file_url(optional($shop->image)->path, 'small'), false); ?>" class="thumbnail" alt="<?php echo e(trans('app.logo'), false); ?>">
    </span>

    <div class="admin-user-widget-content">
        <span class="admin-user-widget-title">
            <?php echo e(trans('app.shop') . ': ' . $shop->name, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e(trans('app.owner') . ': ' . $shop->owner->name, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e(trans('app.email') . ': ' . $shop->email, false); ?>

        </span>
        <span class="admin-user-widget-text text-muted">
            <?php echo e(trans('app.phone') . ': ' . optional($shop->primaryAddress)->phone, false); ?>

        </span>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $shop)): ?>
            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.show', $shop->id), false); ?>" class="ajax-modal-btn small"><?php echo e(trans('app.view_detail'), false); ?></a>
        <?php endif; ?>

        <span class="pull-right" style="margin-top: -60px;margin-right: 30px;font-size: 40px; color: rgba(0, 0, 0, 0.2);">
            <i class="fa fa-check-square-o"></i>
        </span>
    </div>            <!-- /.admin-user-widget-content -->
</div>          <!-- /.admin-user-widget --><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_shop_widget.blade.php ENDPATH**/ ?>