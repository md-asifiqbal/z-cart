<div class="row">
    <div class="col-md-2 nopadding-right no-print">
		<?php if($reply->user_id): ?>
    		<img src="<?php echo e(get_avatar_src($reply->user, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">

			<?php if(Gate::allows('view', $reply->user)): ?>
	            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.user.show', $reply->user_id), false); ?>" class="ajax-modal-btn small"><?php echo e($reply->user->getName(), false); ?></a>
			<?php else: ?>
				<span class="small"><?php echo e($reply->user->getName(), false); ?></span>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<div class="col-md-8 nopadding">
		<blockquote style="font-size: 1em;" class="<?php echo e($reply->customer_id ? 'blockquote-reverse' : '', false); ?>">
    		<?php echo $reply->reply; ?>

			<?php if(count($reply->attachments)): ?>
				<small class="no-print">
					<?php echo e(trans('app.attachments') . ': ', false); ?>

					<?php $__currentLoopData = $reply->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			            <a href="<?php echo e(route('attachment.download', $attachment), false); ?>"><i class="fa fa-file"></i></a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</small>
			<?php endif; ?>
			<footer>
				<?php echo e($reply->updated_at->diffForHumans(), false); ?>

			</footer>
    	</blockquote>
	</div>

    <div class="col-md-2 nopadding-left no-print">
		<?php if($reply->customer_id): ?>
    		<img src="<?php echo e(get_avatar_src($reply->customer, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">

			<?php if(Gate::allows('view', $reply->user)): ?>
	            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $reply->customer_id), false); ?>" class="ajax-modal-btn small"><?php echo e($reply->customer->getName(), false); ?></a>
			<?php else: ?>
				<span class="small"><?php echo e($reply->customer->getName(), false); ?></span>
			<?php endif; ?>
		<?php endif; ?>
    </div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_reply_conversations.blade.php ENDPATH**/ ?>