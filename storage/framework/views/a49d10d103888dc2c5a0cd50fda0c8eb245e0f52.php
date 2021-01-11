<div class="row">
	<div class="col-xs-12">
		<table class="table table-hover table-no-sort">
			<thead>
				<tr>
					<th><?php echo e(trans('app.subject'), false); ?></th>
					<th><?php echo e(trans('app.category'), false); ?></th>
					<th><?php echo e(trans('app.priority'), false); ?></th>
					<th><i class="fa fa-comments-o"></i></th>
					<th><?php echo e(trans('app.updated_at'), false); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<a href="<?php echo e(route('admin.account.ticket.show', $ticket->id), false); ?>"><?php echo e($ticket->subject, false); ?></a>
		                    <span class="indent5">
								<?php echo $ticket->statusName(); ?>

							</span>
							<?php if($ticket->attachments_count): ?>
								<i class="fa fa-paperclip pull-right"></i>
							<?php endif; ?>
						</td>
						<td><span class="label label-outline"> <?php echo e($ticket->category->name, false); ?> </span></td>
						<td><?php echo $ticket->priorityLevel(); ?></td>
						<td><span class="label label-default"><?php echo e($ticket->replies_count, false); ?></span></td>
			          	<td><?php echo e($ticket->updated_at->diffForHumans(), false); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
	<div class="col-xs-12">
		<a href="javascript:void(0)" data-link="<?php echo e(route('admin.account.ticket.create'), false); ?>" class="ajax-modal-btn btn btn-lg btn-new btn-flat">
			<i class="fa fa-ticket"></i>
			<?php echo e(trans('app.submit_a_ticket'), false); ?>

		</a>
	</div>
</div>

<div class="spacer30"></div>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/account/_ticket.blade.php ENDPATH**/ ?>