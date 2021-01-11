<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.low_inventory_notification.greeting'), false); ?>


<?php echo e(trans('notifications.low_inventory_notification.message'), false); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'red']); ?>
<?php echo e(trans('notifications.low_inventory_notification.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/mail/inventory/low_inventory_notification.blade.php ENDPATH**/ ?>