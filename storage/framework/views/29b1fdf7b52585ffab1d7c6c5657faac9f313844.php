<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.shop_updated.greeting', ['merchant' => $shop->owner->getName()]), false); ?>


<?php echo e(trans('notifications.shop_updated.message', ['shop_name' => $shop->name]), false); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'blue']); ?>
<?php echo e(trans('notifications.shop_updated.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibest.com/public_html/resources/views/admin/mail/shop/updated.blade.php ENDPATH**/ ?>