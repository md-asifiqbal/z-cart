<?php if($disputes->count() > 0): ?>
  <table class="table" id="buyer-order-table">
  	<thead>
    	<tr><th colspan="3"><?php echo app('translator')->getFromJson('theme.disputes'); ?></th></tr>
  	</thead>
  	<tbody>
			<?php $__currentLoopData = $disputes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dispute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr class="order-info-head">
            	<td width="40%">
                  <h5><span><?php echo app('translator')->getFromJson('theme.order_id'); ?>: </span><?php echo e($dispute->order->order_number, false); ?></h5>
                  <h5><span><?php echo app('translator')->getFromJson('theme.order_time_date'); ?>: </span><?php echo e($dispute->order->created_at->toDayDateTimeString(), false); ?></h5>
            	</td>
            	<td width="35%" class="store-info">
                  <h5>
                    <span><?php echo app('translator')->getFromJson('theme.store'); ?>:</span>
                    <?php if($dispute->shop->slug): ?>
                      <a href="<?php echo e(route('show.store', $dispute->shop->slug), false); ?>"> <?php echo e($dispute->shop->name, false); ?></a>
                    <?php else: ?>
                      <?php echo app('translator')->getFromJson('theme.seller'); ?>
                    <?php endif; ?>
                  </h5>
                  <h5>
                      <span><?php echo app('translator')->getFromJson('theme.status'); ?></span>
                      <?php echo $dispute->order->dispute->statusName(); ?>

                  </h5>
            	</td>
            	<td width="25%" class="order-amount">
                  <h5><span><?php echo app('translator')->getFromJson('theme.order_amount'); ?>: </span><?php echo e(get_formated_currency($dispute->order->grand_total, true, 2), false); ?></h5>
                  <div class="btn-group" role="group">
                    <a class="btn btn-xs btn-default flat" href="<?php echo e(route('order.detail', $dispute->order), false); ?>"><?php echo app('translator')->getFromJson('theme.button.order_detail'); ?></a>
                    <a class="btn btn-xs btn-default flat" href="<?php echo e(route('order.detail', $dispute->order) . '#message-section', false); ?>"><?php echo app('translator')->getFromJson('theme.button.contact_seller'); ?></a>
                  </div>
            	</td>
        	</tr> <!-- /.order-info-head -->
        	<?php $__currentLoopData = $dispute->order->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="order-body">
                <td colspan="2">
                    <div class="product-img-wrap">
                      <img src="<?php echo e(get_storage_file_url(optional($item->image)->path, 'small'), false); ?>" alt="<?php echo e($item->slug, false); ?>" title="<?php echo e($item->slug, false); ?>" />
                    </div>
                    <div class="product-info">
                        <a href="<?php echo e(route('show.product', $item->slug), false); ?>" class="product-info-title"><?php echo e($item->pivot->item_description, false); ?></a>

                        <div class="order-info-amount">
                            <span><?php echo e(get_formated_currency($item->pivot->unit_price, true, 2), false); ?> x <?php echo e($item->pivot->quantity, false); ?></span>
                        </div>
                        
                        <?php if($dispute->product_id == $item->product_id): ?>
                          <span class="label label-danger"><?php echo app('translator')->getFromJson('theme.disputed'); ?></span>
                        <?php endif; ?>
                    </div>
                </td>
                <?php if($loop->first): ?>
                  <td rowspan="<?php echo e($loop->count, false); ?>" class="order-actions text-center">
                    <?php if($dispute->order->refunds->count()): ?>
                      <a href="<?php echo e(route('order.detail', $dispute->order) . '#refund-detail-section', false); ?>" class="btn btn-primary btn-sm btn-block flat"><?php echo app('translator')->getFromJson('theme.refund_details'); ?></a>
                    <?php endif; ?>

                    <a href="<?php echo e(route('dispute.open', $dispute->order), false); ?>" class="btn btn-default btn-sm btn-block flat"><?php echo trans('theme.dispute_details'); ?></a>

                    <?php if($dispute->isOpen()): ?>
                        <?php echo Form::open(['route' => ['dispute.markAsSolved', $dispute]]); ?>

                            <?php echo Form::button(trans('theme.mark_as_solved'), ['type' => 'submit', 'class' => 'confirm btn btn-primary btn-block btn-sm flat']); ?>

                        <?php echo Form::close(); ?>

                    <?php endif; ?>

                  </td>
                <?php endif; ?>
              </tr> <!-- /.order-body -->
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        	<?php if($dispute->order->message_to_customer): ?>
              <tr class="message_from_seller">
                <td colspan="3">
                  <p>
                    <strong><?php echo app('translator')->getFromJson('theme.message_from_seller'); ?>: </strong> <?php echo e($dispute->order->message_to_customer, false); ?>

                  </p>
                </td>
              </tr>
        	<?php endif; ?>

        	<?php if($dispute->order->buyer_note): ?>
              <tr class="order-info-footer">
                <td colspan="3">
                  <p class="order-detail-buyer-note">
                    <span><?php echo app('translator')->getFromJson('theme.note'); ?>: </span> <?php echo e($dispute->order->buyer_note, false); ?>

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
    	<?php echo app('translator')->getFromJson('theme.nothing_found'); ?>
  	</p>
<?php endif; ?>

<div class="row pagenav-wrapper">
    <?php echo e($disputes->links('layouts.pagination'), false); ?>

</div><!-- /.row .pagenav-wrapper -->
<div class="clearfix space20"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/disputes.blade.php ENDPATH**/ ?>