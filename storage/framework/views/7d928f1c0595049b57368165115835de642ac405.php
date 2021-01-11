<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.user_created.greeting', ['user' => $user->getName()]), false); ?>


<?php echo e(trans('notifications.user_created.message', ['admin' => $admin, 'marketplace' => get_platform_title()]), false); ?>

<br/>
<?php $__env->startComponent('mail::panel'); ?>
<?php echo e(trans('messages.temp_password', ['password' => $password]), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'green']); ?>
<?php echo e(trans('notifications.user_created.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::panel'); ?>
<strong><?php echo e(trans('messages.alert'), false); ?>: </strong>
<?php echo e(trans('notifications.user_created.alert'), false); ?>

<?php echo $__env->renderComponent(); ?>
<br/>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/mail/user/send_login_info.blade.php ENDPATH**/ ?>