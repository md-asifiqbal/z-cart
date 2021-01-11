<?php $__env->startSection('content'); ?>
    <?php echo Form::model($inventory, ['method' => 'POST', 'route' => ['admin.stock.inventory.update', $inventory->id], 'files' => true, 'id' => 'form-ajax-upload', 'data-toggle' => 'validator']); ?>


        <?php echo $__env->make('admin.inventory._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <?php echo $__env->make('plugins.dropzone-upload', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('plugins.dynamic-inputs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/inventory/edit.blade.php ENDPATH**/ ?>