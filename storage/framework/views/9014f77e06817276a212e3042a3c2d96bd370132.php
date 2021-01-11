<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.disputes'), false); ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-no-sort">
				<thead>
					<tr>
						<th><?php echo e(trans('app.customer'), false); ?></th>
						<th><?php echo e(trans('app.type'), false); ?></th>
						<th><?php echo e(trans('app.response'), false); ?></th>
						<th><?php echo e(trans('app.updated_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $disputes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dispute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
					            <img src="<?php echo e(get_avatar_src($dispute->customer, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
					            <p class="indent10">
									<strong><?php echo e($dispute->customer->getName(), false); ?></strong>
		    						<?php if(Auth::user()->isFromPlatform() && $dispute->shop): ?>
										<br/><span><?php echo e(trans('app.vendor') . ': ' . optional($dispute->shop)->name, false); ?></span>
									<?php endif; ?>
					            </p>
							</td>
							<td>
	    						<?php if(!Auth::user()->isFromPlatform()): ?>
									<?php echo $dispute->statusName(); ?>

								<?php endif; ?>
								<a href="<?php echo e(route('admin.support.dispute.show', $dispute->id), false); ?>"><?php echo e($dispute->dispute_type->detail, false); ?></a>
							</td>
							<td><span class="label label-default"><?php echo e($dispute->replies_count, false); ?></span></td>
				          	<td><?php echo e($dispute->updated_at->diffForHumans(), false); ?></td>
							<td class="row-options">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('response', $dispute)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.dispute.response', $dispute), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.response'), false); ?>" class="fa fa-reply"></i></a>&nbsp;
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
			<h3 class="box-title"><?php echo e(trans('app.closed_disputes'), false); ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-no-sort">
				<thead>
					<tr>
						<th><?php echo e(trans('app.customer'), false); ?></th>
						<th><?php echo e(trans('app.type'), false); ?></th>
						<th><?php echo e(trans('app.response'), false); ?></th>
						<th><?php echo e(trans('app.updated_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $closed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dispute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
					            <img src="<?php echo e(get_avatar_src($dispute->customer, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
					            <p class="indent10">
									<strong><?php echo e($dispute->customer->getName(), false); ?></strong>
		    						<?php if(Auth::user()->isFromPlatform() && $dispute->shop): ?>
										<br/><span><?php echo e(trans('app.vendor') . ': ' . optional($dispute->shop)->name, false); ?></span>
									<?php endif; ?>
					            </p>
							</td>
							<td>
	    						<?php if(!Auth::user()->isFromPlatform()): ?>
									<?php echo $dispute->statusName(); ?>

								<?php endif; ?>
								<a href="<?php echo e(route('admin.support.dispute.show', $dispute->id), false); ?>"><?php echo e($dispute->dispute_type->detail, false); ?></a>
							</td>
							<td><span class="label label-default"><?php echo e($dispute->replies_count, false); ?></span></td>
				          	<td><?php echo e($dispute->updated_at->diffForHumans(), false); ?></td>
							<td class="row-options">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('response', $dispute)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.dispute.response', $dispute), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.response'), false); ?>" class="fa fa-reply"></i></a>&nbsp;
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/dispute/index.blade.php ENDPATH**/ ?>