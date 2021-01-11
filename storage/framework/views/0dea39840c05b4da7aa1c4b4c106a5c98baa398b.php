<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.verdor_registered.greeting'), false); ?>


<?php echo trans('notifications.verdor_registered.message', ['marketplace' => get_platform_title(), 'shop_name' => $merchant->owns->name, 'merchant_email' => $merchant->email]); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'green']); ?>
<?php echo e(trans('notifications.verdor_registered.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibest.com/public_html/resources/views/admin/mail/super_admin/verdor_registered.blade.php ENDPATH**/ ?>