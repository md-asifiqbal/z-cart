<?php $__env->startComponent('mail::panel'); ?>
<?php echo e(trans('messages.shop_name') . ': ' . $order_detail->shop->name, false); ?><br/>
<?php echo e(trans('messages.order_id') . ': ' . $order_detail->order_number, false); ?><br/>
<?php echo e(trans('messages.payment_method') . ': ' . $order_detail->paymentMethod->name, false); ?><br/>
<?php echo trans('messages.payment_status') . ': ' . $order_detail->paymentStatusName(True); ?><br/>
<?php echo e(trans('messages.order_status') . ': ', false); ?> <strong><?php echo $order_detail->orderStatus(True); ?></strong><br/>
<?php if($order_detail->carrier_id): ?>
<?php echo e(trans('messages.shipping_carrier') . ': ' . $order_detail->carrier->name, false); ?><br/>
<?php endif; ?>
<?php if($order_detail->tracking_id): ?>
<?php
  $tracking_url = getTrackingUrl($order_detail->tracking_id, $order_detail->carrier_id);
?>
<a href="<?php echo e($tracking_url, false); ?>" target="_blank"><?php echo e(trans('messages.tracking_id'), false); ?></a>: <?php echo e($order_detail->tracking_id, false); ?><br/>
<?php endif; ?>
<br/>
<?php echo trans('messages.shipping_address') . ': ' . $order_detail->shipping_address; ?><br/><br/>
<?php echo trans('messages.billing_address') . ': ' . $order_detail->billing_address; ?><br/>
<?php echo $__env->renderComponent(); ?>
<br/><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/mail/order/_order_detail_panel.blade.php ENDPATH**/ ?>