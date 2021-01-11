<?php $__env->startSection('content'); ?>
	<?php if($assigned->count()): ?>
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo e(trans('app.assigned_to_me'), false); ?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div> <!-- /.box-header -->
			<div class="box-body">
				<table class="table table-hover table-no-sort">
					<thead>
						<tr>
							<th><?php echo e(trans('app.merchant'), false); ?></th>
							<th><?php echo e(trans('app.subject'), false); ?></th>
							<th><?php echo e(trans('app.priority'), false); ?></th>
							<th><?php echo e(trans('app.replies'), false); ?></th>
							<th><?php echo e(trans('app.assigned_to'), false); ?></th>
							<th><?php echo e(trans('app.updated_at'), false); ?></th>
							<th><?php echo e(trans('app.option'), false); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $assigned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<img src="<?php echo e(get_storage_file_url(optional($ticket->shop->image)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
								<p class="indent10">
									<strong>
										<?php echo e($ticket->shop->name, false); ?>

									</strong>
									 <br/>
									<?php echo e(trans('app.by') . ' ' . $ticket->user->name, false); ?>

								</p>
							</td>
							<td>
								<?php echo $ticket->statusName(); ?>

								<span class="label label-outline"> <?php echo e($ticket->category->name, false); ?> </span> &nbsp;
								<a href="<?php echo e(route('admin.support.ticket.show', $ticket->id), false); ?>"><?php echo e($ticket->subject, false); ?></a>
							</td>
							<td><?php echo $ticket->priorityLevel(); ?></td>
							<td><span class="label label-default"><?php echo e($ticket->replies_count, false); ?></span></td>
							<td><?php echo e(($ticket->assigned_to) ? $ticket->assignedTo->name : '-', false); ?></td>
				          	<td><?php echo e($ticket->updated_at->diffForHumans(), false); ?></td>
							<td class="row-options">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply', $ticket)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.ticket.reply', $ticket), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.reply'), false); ?>" class="fa fa-reply"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $ticket)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.ticket.edit', $ticket->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.update'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign', $ticket)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.ticket.showAssignForm', $ticket->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.assign'), false); ?>" class="fa fa-hashtag"></i></a>&nbsp;
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div> <!-- /.box-body -->
		</div> <!-- /.box -->
	<?php endif; ?>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.open_tickets'), false); ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-no-sort">
				<thead>
					<tr>
						<th><?php echo e(trans('app.merchant'), false); ?></th>
						<th><?php echo e(trans('app.subject'), false); ?></th>
						<th><?php echo e(trans('app.priority'), false); ?></th>
						<th><?php echo e(trans('app.replies'), false); ?></th>
						<th><?php echo e(trans('app.assigned_to'), false); ?></th>
						<th><?php echo e(trans('app.updated_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<img src="<?php echo e(get_storage_file_url(optional($ticket->shop->image)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
							<p class="indent10">
								<strong>
									<?php echo e($ticket->shop->name, false); ?>

								</strong>
								<?php if($ticket->user): ?>
									 <br/>
									<?php echo e(trans('app.by') . ' ' . $ticket->user->name, false); ?>

								<?php endif; ?>
							</p>
						</td>
						<td>
							<?php echo $ticket->statusName(); ?>

							<span class="label label-outline"> <?php echo e($ticket->category->name, false); ?> </span> &nbsp;
							<a href="<?php echo e(route('admin.support.ticket.show', $ticket->id), false); ?>"><?php echo e($ticket->subject, false); ?></a>
						</td>
						<td><?php echo $ticket->priorityLevel(); ?></td>
						<td><span class="label label-default"><?php echo e($ticket->replies_count, false); ?></span></td>
						<td><?php echo e(($ticket->assigned_to) ? $ticket->assignedTo->name : '-', false); ?></td>
			          	<td><?php echo e($ticket->updated_at->diffForHumans(), false); ?></td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply', $ticket)): ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.ticket.reply', $ticket), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.reply'), false); ?>" class="fa fa-reply"></i></a>&nbsp;
							<?php endif; ?>

							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $ticket)): ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.ticket.edit', $ticket->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.update'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
							<?php endif; ?>

							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign', $ticket)): ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.ticket.showAssignForm', $ticket->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.assign'), false); ?>" class="fa fa-hashtag"></i></a>&nbsp;
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->

	<div class="box collapsed-box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.closed_tickets'), false); ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-no-sort">
				<thead>
					<tr>
						<th><?php echo e(trans('app.shop'), false); ?></th>
						<th><?php echo e(trans('app.subject'), false); ?></th>
						<th><?php echo e(trans('app.priority'), false); ?></th>
						<th><?php echo e(trans('app.assigned_to'), false); ?></th>
						<th><?php echo e(trans('app.updated_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $closed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<strong>
								<?php echo e($ticket->shop->name, false); ?>

							</strong>
							 <br/>
							<?php echo e(trans('app.by') . ' ' . $ticket->user->name, false); ?>

						</td>
						<td>
							<?php echo $ticket->statusName(); ?>

							<span class="label label-outline"> <?php echo e($ticket->category->name, false); ?> </span> &nbsp;
							<a href="<?php echo e(route('admin.support.ticket.show', $ticket->id), false); ?>"><?php echo e($ticket->subject, false); ?></a>
						</td>
						<td><?php echo $ticket->priorityLevel(); ?></td>
						<td><?php echo e(($ticket->assigned_to) ? $ticket->assignedTo->name : '-', false); ?></td>
			          	<td><?php echo e($ticket->updated_at->diffForHumans(), false); ?></td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $ticket)): ?>
			                    <?php echo Form::open(['route' => ['admin.support.ticket.reopen', $ticket->id], 'method' => 'POST', 'class' => 'data-form']); ?>

			                        <?php echo Form::button('<i class="glyphicon glyphicon-refresh"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.reopen'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

								<?php echo Form::close(); ?>

							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/ticket/index.blade.php ENDPATH**/ ?>