<?php $__env->startComponent('mail::message'); ?>

#<?php echo e(trans('notifications.new_contact_us_message.greeting'), false); ?>


<?php echo e($message->message, false); ?>

<br/><br/>

<small>
<?php if($message->phone): ?>
<?php echo e(trans('notifications.new_contact_us_message.message_footer_with_phone', ['phone' => $message->phone]), false); ?>

<?php else: ?>
<?php echo e(trans('notifications.new_contact_us_message.message_footer'), false); ?>

<?php endif; ?>
</small>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/mail/system/new_contact_us_message.blade.php ENDPATH**/ ?>