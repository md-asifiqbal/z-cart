<?php if($orders->count() > 0): ?>
  <table class="table" id="buyer-order-table">
      <thead>
          <tr>
            <th colspan="3"><?php echo app('translator')->getFromJson('theme.your_order_history'); ?></th>
          </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr class="order-info-head">
            <td width="40%">
              <h5>
                <span><?php echo app('translator')->getFromJson('theme.order_id'); ?>: </span>
                <a class="btn-link" href="<?php echo e(route('order.detail', $order), false); ?>"><?php echo e($order->order_number, false); ?></a>
                <?php if($order->hasPendingCancellationRequest()): ?>
                  <span class="label label-warning indent10 text-uppercase">
                    <?php echo e(trans('theme.'.$order->cancellation->request_type.'_requested'), false); ?>

                  </span>
                <?php elseif($order->hasClosedCancellationRequest()): ?>
                  <span class="indent10">
                    <?php echo e(trans('theme.'.$order->cancellation->request_type), false); ?>

                  </span>
                  <?php echo $order->cancellation->statusName(); ?>

                <?php elseif($order->isCanceled()): ?>
                  <span class="indent10"><?php echo $order->orderStatus(); ?></span>
                <?php endif; ?>
                <?php if($order->dispute): ?>
                  <span class="label label-danger indent10 text-uppercase"><?php echo app('translator')->getFromJson('theme.disputed'); ?></span>
                <?php endif; ?>
              </h5>
              <h5><span><?php echo app('translator')->getFromJson('theme.order_time_date'); ?>: </span><?php echo e($order->created_at->toDayDateTimeString(), false); ?></h5>
            </td>
            <td width="40%" class="store-info">
              <h5>
                <span><?php echo app('translator')->getFromJson('theme.store'); ?>:</span>
                <?php if($order->shop->slug): ?>
                  <a href="<?php echo e(route('show.store', $order->shop->slug), false); ?>"> <?php echo e($order->shop->name, false); ?></a>
                <?php else: ?>
                  <?php echo app('translator')->getFromJson('theme.store_not_available'); ?>
                <?php endif; ?>
              </h5>
              <h5>
                  <span><?php echo app('translator')->getFromJson('theme.status'); ?></span>
                  <?php echo $order->orderStatus(True) . ' &nbsp; ' . $order->paymentStatusName(); ?>

              </h5>
            </td>
            <td width="20%" class="order-amount">
              <h5><span><?php echo app('translator')->getFromJson('theme.order_amount'); ?>: </span><?php echo e(get_formated_currency($order->grand_total, true, 2), false); ?></h5>
              <div class="text-center">
                <div class="btn-group" role="group">
                  <a class="btn btn-xs btn-default flat" href="<?php echo e(route('order.detail', $order), false); ?>"><?php echo app('translator')->getFromJson('theme.button.order_detail'); ?></a>
                  <?php if($order->dispute): ?>
                    <a href="<?php echo e(route('dispute.open', $order), false); ?>" class="btn btn-xs btn-default flat" data-confirm="<?php echo app('translator')->getFromJson('theme.confirm_action.open_a_dispute'); ?>"><?php echo app('translator')->getFromJson('theme.dispute_detail'); ?></a>
                  <?php else: ?>
                    <a href="<?php echo e(route('dispute.open', $order), false); ?>" class="confirm btn btn-xs btn-default flat" data-confirm="<?php echo app('translator')->getFromJson('theme.confirm_action.open_a_dispute'); ?>"><?php echo app('translator')->getFromJson('theme.button.open_dispute'); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            </td>
          </tr> <!-- /.order-info-head -->

          <?php $__currentLoopData = $order->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="order-body">
              <td colspan="2">
                  <div class="product-img-wrap">
                    <img src="<?php echo e(get_storage_file_url(optional($item->image)->path, 'small'), false); ?>" alt="<?php echo e($item->slug, false); ?>" title="<?php echo e($item->slug, false); ?>" />
                  </div>
                  <div class="product-info">
                      <a href="<?php echo e(route('show.product', $item->slug), false); ?>" class="product-info-title" style="display: inline;"><?php echo e($item->pivot->item_description, false); ?></a>

                      <?php if($order->cancellation && $order->cancellation->isItemInRequest($item->id)): ?>
                        <span class="label label-danger indent10">
                          <?php echo e(trans('theme.'.$order->cancellation->request_type.'_requested'), false); ?>

                        </span>
                      <?php endif; ?>

                      <div class="order-info-amount">
                          <span><?php echo e(get_formated_currency($item->pivot->unit_price, true, 2), false); ?> x <?php echo e($item->pivot->quantity, false); ?></span>
                      </div>
                      
                  </div>
              </td>
              <?php if($loop->first): ?>

                <td rowspan="<?php echo e($loop->count, false); ?>" class="order-actions">
                  <a href="<?php echo e(route('order.again', $order), false); ?>" class="btn btn-default btn-sm btn-block flat">
                    <i class="fa fa-shopping-cart"></i> <?php echo app('translator')->getFromJson('theme.order_again'); ?>
                  </a>

                  <?php if (! ($order->isCanceled())): ?>
                    <a href="<?php echo e(route('order.invoice', $order), false); ?>" class="btn btn-default btn-sm btn-block flat">
                      <i class="fa fa-cloud-download"></i> <?php echo app('translator')->getFromJson('theme.invoice'); ?>
                    </a>

                    <?php if($order->canBeCanceled()): ?>

                      <?php echo Form::model($order, ['method' => 'PUT', 'route' => ['order.cancel', $order]]); ?>

                        <?php echo Form::button('<i class="fa fa-times-circle-o"></i> ' . trans('theme.cancel_order'), ['type' => 'submit', 'class' => 'confirm btn btn-default btn-block flat', 'data-confirm' => trans('theme.confirm_action.cant_undo')]); ?>

                      <?php echo Form::close(); ?>


                    <?php elseif($order->canRequestCancellation()): ?>

                      <a href="<?php echo e(route('cancellation.form', ['order' => $order, 'action' => 'cancel']), false); ?>" class="modalAction btn btn-default btn-sm btn-block flat"><i class="fa fa-times"></i> <?php echo app('translator')->getFromJson('theme.cancel_items'); ?></a>

                    <?php endif; ?>

                    <?php if($order->canTrack()): ?>
                      <a href="<?php echo e(route('order.track', $order), false); ?>" class="btn btn-black btn-sm btn-block flat">
                        <i class="fa fa-map-marker"></i> <?php echo app('translator')->getFromJson('theme.button.track_order'); ?>
                      </a>
                    <?php endif; ?>

                    <?php if($order->canEvaluate()): ?>
                      <a href="<?php echo e(route('order.feedback', $order), false); ?>" class="btn btn-primary btn-sm btn-block flat">
                        <?php echo app('translator')->getFromJson('theme.button.give_feedback'); ?>
                      </a>
                    <?php endif; ?>

                    <?php if($order->isFulfilled()): ?>
                      <?php if($order->canRequestReturn()): ?>
                        <a href="<?php echo e(route('cancellation.form', ['order' => $order, 'action' => 'return']), false); ?>" class="modalAction btn btn-default btn-sm btn-block flat"><i class="fa fa-undo"></i> <?php echo app('translator')->getFromJson('theme.return_items'); ?></a>
                      <?php endif; ?>

                      <?php if (! ($order->goods_received)): ?>
                        <?php echo Form::model($order, ['method' => 'PUT', 'route' => ['goods.received', $order]]); ?>

                          <?php echo Form::button(trans('theme.button.confirm_goods_received'), ['type' => 'submit', 'class' => 'confirm btn btn-primary btn-block flat', 'data-confirm' => trans('theme.confirm_action.goods_received')]); ?>

                        <?php echo Form::close(); ?>

                      <?php endif; ?>
                    <?php endif; ?>

                  <?php endif; ?>

                  <a href="<?php echo e(route('order.detail', $order) . '#message-section', false); ?>" class="btn btn-link btn-block">
                    <i class="fa fa-envelope-o"></i> <?php echo app('translator')->getFromJson('theme.button.contact_seller'); ?>
                  </a>
                </td>
              <?php endif; ?>
            </tr> <!-- /.order-body -->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php if($order->message_to_customer): ?>
            <tr class="message_from_seller">
              <td colspan="3">
                <p>
                  <strong><?php echo app('translator')->getFromJson('theme.message_from_seller'); ?>: </strong> <?php echo e($order->message_to_customer, false); ?>

                </p>
              </td>
            </tr>
          <?php endif; ?>

          <?php if($order->buyer_note): ?>
            <tr class="order-info-footer">
              <td colspan="3">
                <p class="order-detail-buyer-note">
                  <span><?php echo app('translator')->getFromJson('theme.note'); ?>: </span> <?php echo e($order->buyer_note, false); ?>

                </p>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
  </table>
  <div class="sep"></div>
<?php else: ?>
  <div class="clearfix space50"></div>
  <p class="lead text-center space50">
    <?php echo app('translator')->getFromJson('theme.no_order_history'); ?>
    <a href="<?php echo e(url('/'), false); ?>" class="btn btn-primary btn-sm flat"><?php echo app('translator')->getFromJson('theme.button.shop_now'); ?></a>
  </p>
<?php endif; ?>

<div class="row pagenav-wrapper">
  <?php echo e($orders->links('layouts.pagination'), false); ?>

</div><!-- /.row .pagenav-wrapper -->
<div class="clearfix space20"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/orders.blade.php ENDPATH**/ ?>