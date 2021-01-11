<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.pending_verifications'), false); ?></h3>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-option">
				<thead>
					<tr>
						<th><?php echo e(trans('app.shop_name'), false); ?></th>
						<th><?php echo e(trans('app.current_billing_plan'), false); ?></th>
						<th><?php echo e(trans('app.uploaded_documents'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $merchants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merchant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(! $merchant->shop) continue; ?> 

						<tr>
							<td>
								<img src="<?php echo e(get_storage_file_url(optional($merchant->shop->logo)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">

								<p class="indent10">
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $merchant->shop)): ?>
										<a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.show', $merchant->shop->id), false); ?>"  class="ajax-modal-btn"><?php echo e($merchant->shop->name, false); ?></a>
									<?php else: ?>
										<?php echo e($merchant->shop->name, false); ?>

									<?php endif; ?>

				            		<?php if($merchant->shop->isDown()): ?>
							          	<span class="label label-default indent10"><?php echo e(trans('app.maintenance_mode'), false); ?></span>
									<?php endif; ?>
								</p>
							</td>
				          	<td>
				          		<?php echo e($merchant->shop->plan->name, false); ?>

				          	</td>
							<td>
								<?php $__currentLoopData = $merchant->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<a href="<?php echo e(route('attachment.download', $attachment), false); ?>">
										<i class="fa fa-cloud-download"></i>
										<?php echo e($attachment->name, false); ?>

									</a>
									<small class="indent10">
							            (<?php echo e(get_formated_file_size($attachment->size), false); ?>)
							            <?php echo e($attachment->updated_at->diffForHumans(), false); ?>

									</small>

									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $attachment)): ?>
										<?php echo Form::open(['route' => ['attachment.delete', $attachment], 'method' => 'delete', 'class' => 'data-form']); ?>

											<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent text-muted indent10', 'title' => trans('app.delete'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

										<?php echo Form::close(); ?>

									<?php endif; ?>

									<?php if(! $loop->last): ?>
										<br/>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</td>
							<td class="row-options">
								<?php if(auth()->user()->isAdmin()): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.verify', $merchant->shop), false); ?>" class="ajax-modal-btn btn btn-default btn-sm btn-flat"><?php echo e(trans('app.verify'), false); ?></a>&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/shop/verifications.blade.php ENDPATH**/ ?>