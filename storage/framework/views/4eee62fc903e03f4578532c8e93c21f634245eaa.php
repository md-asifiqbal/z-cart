<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.shop_deleted.greeting'), false); ?>


<?php echo e(trans('notifications.shop_deleted.message'), false); ?>


<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/mail/shop/deleted.blade.php ENDPATH**/ ?>