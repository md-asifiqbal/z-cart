<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.refunds'), false); ?></h3>
			<div class="box-tools pull-right">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('initiate', App\Refund::class)): ?>
					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.refund.form'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.initiate_refund'), false); ?></a>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-option">
				<thead>
					<tr>
						<th><?php echo e(trans('app.order_number'), false); ?></th>
						<th><?php echo e(trans('app.return_goods'), false); ?></th>
						<th><?php echo e(trans('app.order_amount'), false); ?></th>
						<th><?php echo e(trans('app.refund_amount'), false); ?></th>
						<th><?php echo e(trans('app.status'), false); ?></th>
						<th><?php echo e(trans('app.created_at'), false); ?></th>
						<th><?php echo e(trans('app.updated_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
					            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Order::class)): ?>
									<a href="<?php echo e(route('admin.order.order.show', $refund->order_id), false); ?>">
										<?php echo e($refund->order->order_number, false); ?>

									</a>
								<?php else: ?>
									<?php echo e($refund->order->order_number, false); ?>

								<?php endif; ?>
							</td>
							<td><?php echo get_yes_or_no($refund->return_goods); ?></td>
							<td><?php echo e(get_formated_currency($refund->order->grand_total, true, 2), false); ?></td>
							<td><?php echo e(get_formated_currency($refund->amount, true, 2), false); ?></td>
							<td><?php echo $refund->statusName(); ?></td>
				          	<td><?php echo e($refund->created_at->diffForHumans(), false); ?></td>
				          	<td><?php echo e($refund->updated_at->diffForHumans(), false); ?></td>
							<td class="row-options">
					            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Customer::class)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $refund->order->customer_id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.customer'), false); ?>" class="fa fa-user"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve', $refund)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.refund.response', $refund), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.response'), false); ?>" class="fa fa-random"></i></a>&nbsp;
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
			<h3 class="box-title"><?php echo e(trans('app.closed_refunds'), false); ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-option">
				<thead>
					<tr>
						<th><?php echo e(trans('app.order_number'), false); ?></th>
						<th><?php echo e(trans('app.return_goods'), false); ?></th>
						<th><?php echo e(trans('app.order_amount'), false); ?></th>
						<th><?php echo e(trans('app.refund_amount'), false); ?></th>
						<th><?php echo e(trans('app.status'), false); ?></th>
						<th><?php echo e(trans('app.created_at'), false); ?></th>
						<th><?php echo e(trans('app.updated_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $closed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
					            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Order::class)): ?>
									<a href="<?php echo e(route('admin.order.order.show', $refund->order_id), false); ?>">
										<?php echo e($refund->order->order_number, false); ?>

									</a>
								<?php else: ?>
									<?php echo e($refund->order->order_number, false); ?>

								<?php endif; ?>
							</td>
							<td><?php echo get_yes_or_no($refund->return_goods); ?></td>
							<td><?php echo e(get_formated_currency($refund->order->total, true, 2), false); ?></td>
							<td><?php echo e(get_formated_currency($refund->amount, true, 2), false); ?></td>
							<td><?php echo $refund->statusName(); ?></td>
				          	<td><?php echo e($refund->created_at->diffForHumans(), false); ?></td>
				          	<td><?php echo e($refund->updated_at->diffForHumans(), false); ?></td>
							<td class="row-options">
					            
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $refund->order->customer_id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.customer'), false); ?>" class="fa fa-user"></i></a>&nbsp;
								
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/refund/index.blade.php ENDPATH**/ ?>