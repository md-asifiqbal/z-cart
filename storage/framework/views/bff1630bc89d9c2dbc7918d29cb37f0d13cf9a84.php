<?php if($messages->count() > 0): ?>
  <?php
    $search_q = isset($search_q) ? $search_q : Null;
  ?>

  <table class="table table-hover table-striped message-inbox">
  	<thead>
    	<tr>
        <td colspan="6"><?php echo e(trans('theme.of_total', ['first' => $messages->firstItem(), 'last' => $messages->lastItem(), 'total' => $messages->total()]) . ' ' . trans('theme.my_messages'), false); ?></td>
      </tr>
  	</thead>
  	<tbody>
			<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="item_<?php echo e($message->id, false); ?>">
          <td class="mailbox-name" width="15%">
            <?php if($message->shop): ?>
              <a href="<?php echo e(route('show.store', $message->shop->slug), false); ?>">
                  <img src="<?php echo e(get_storage_file_url(optional($message->shop->image)->path, 'thumbnail'), false); ?>" class="seller-info-logo img-circle" alt="<?php echo e(trans('theme.logo'), false); ?>">
                  <?php echo $message->shop->getQualifiedName(); ?>

              </a>
            <?php else: ?>
              <?php echo e(trans('theme.store'), false); ?>

            <?php endif; ?>
          </td>
          <td class="mailbox-subject" width="60%">
            <a href="<?php echo e(route('message.show', $message), false); ?>" class="<?php echo e($message->isUnread() ? 'unread' : '', false); ?>">
              <span><?php echo highlightWords($message->subject, $search_q); ?> </span> - <?php echo highlightWords(str_limit(strip_tags($message->message), 180 - strlen($message->subject)), $search_q); ?>

            </a>
          </td>
          <td class="mailbox-attachment">
            <?php if($message->replies_count): ?>
              <span class="label label-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.replies'), false); ?>"><?php echo e($message->replies_count, false); ?></span>
            <?php endif; ?>
            <?php if($message->hasAttachments()): ?>
              <i class="fa fa-paperclip" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.attachments'), false); ?>"></i>
            <?php endif; ?>
          </td>
          <td>
            <small>
              <?php if($message->isUnread()): ?>
                <?php echo $message->statusName(); ?>

              <?php endif; ?>

              <?php if($message->about()): ?>
                <?php echo $message->about(); ?>

              <?php endif; ?>
            </small>
          </td>
          <td class="mailbox-date"><?php echo e($message->updated_at->diffForHumans(), false); ?></td>
          <td>
            <?php if($message->order_id): ?>
              <a href="<?php echo e(route('order.detail', $message->order_id), false); ?>" data-toggle="tooltip" data-placement="left" data-title="<?php echo e(trans('theme.button.order_detail'), false); ?>"><i class="fa fa-shopping-cart"></i></a>
            <?php endif; ?>

            <?php if($message->product_id): ?>
              <a href="<?php echo e(route('show.product', $message->item->slug), false); ?>" data-toggle="tooltip" data-placement="left" data-title="<?php echo e(trans('theme.button.view_product_details'), false); ?>"><i class="fa fa-external-link"></i></a>
            <?php endif; ?>

            <a href="<?php echo e(route('message.archive', $message), false); ?>" class="confirm" data-toggle="tooltip" data-placement="left" data-title="<?php echo e(trans('theme.archive'), false); ?>"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
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
    <?php echo e($messages->links('layouts.pagination'), false); ?>

</div><!-- /.row .pagenav-wrapper -->
<div class="clearfix space20"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/messages.blade.php ENDPATH**/ ?>