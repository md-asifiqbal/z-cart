<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.customer_registered.greeting', ['customer' => $customer->getName()]), false); ?>


<?php echo e(trans('notifications.customer_registered.message'), false); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'blue']); ?>
<?php echo e(trans('notifications.customer_registered.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/mail/customer/welcome.blade.php ENDPATH**/ ?>