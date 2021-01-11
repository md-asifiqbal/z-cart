<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.user_updated.greeting', ['user' => $user->getName()]), false); ?>


<?php echo e(trans('notifications.user_updated.message'), false); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'blue']); ?>
<?php echo e(trans('notifications.user_updated.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>
<br/>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/mail/user/profile_updated.blade.php ENDPATH**/ ?>