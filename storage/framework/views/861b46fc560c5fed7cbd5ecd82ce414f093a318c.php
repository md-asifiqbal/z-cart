<div class="alert alert-danger alert-dismissible">
    <strong><i class="icon fa fa-info-circle"></i><?php echo e(trans('app.notice'), false); ?></strong>
    <?php echo e(trans('messages.cant_add_more_inventory'), false); ?>

    <span class="indent15">
        <a href="<?php echo e(route('admin.account.billing'), false); ?>" class="btn bg-navy"><i class="fa fa-rocket"></i>  <?php echo e(trans('app.choose_plan'), false); ?></a>
    </span>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_max_inventory_limit_notice.blade.php ENDPATH**/ ?>