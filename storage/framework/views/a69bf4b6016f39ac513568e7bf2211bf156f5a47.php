<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.merchant_order_created_notification.greeting', ['merchant' => $order->shop->name]), false); ?>


<?php echo e(trans('notifications.merchant_order_created_notification.message', ['order' => $order->order_number]), false); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'blue']); ?>
<?php echo e(trans('notifications.merchant_order_created_notification.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo $__env->make('admin.mail.order._order_detail_panel', ['order_detail' => $order], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e($order->shop->name  . ', ' . get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/mail/order/merchant_order_created_notification.blade.php ENDPATH**/ ?>