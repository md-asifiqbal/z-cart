<?php $__env->startSection('buttons'); ?>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Order::class)): ?>
		<a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.order.searchCutomer'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_order'), false); ?></a>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="box">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="<?php echo e(Request::has('tab') ? '' : 'active', false); ?>"><a href="#open_tab" data-toggle="tab">
					
					<?php echo e(trans('app.open'), false); ?>

				</a></li>
				<li class="<?php echo e(Request::input('tab') == 'archived' ? 'active' : '', false); ?>"><a href="#archived_tab" data-toggle="tab">
					<i class="fa fa-trash hidden-sm"></i>
					<?php echo e(trans('app.archived'), false); ?>

				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane <?php echo e(Request::has('tab') ? '' : 'active', false); ?>" id="open_tab">
					<table class="table table-hover table-no-sort">
						<thead>
							<tr>
								<th><?php echo e(trans('app.order_number'), false); ?></th>
								<th><?php echo e(trans('app.customer'), false); ?></th>
								<th><?php echo e(trans('app.grand_total'), false); ?></th>
								<th><?php echo e(trans('app.payment'), false); ?></th>
								<th><?php echo e(trans('app.status'), false); ?></th>
								<th><?php echo e(trans('app.requested_items'), false); ?></th>
								<th><?php echo e(trans('app.requested_at'), false); ?></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $cancellations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancellation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($cancellation->isOpen()): ?>
									<tr>
										<td>
											<a href="<?php echo e(route('admin.order.order.show', $cancellation->order), false); ?>">
												<?php echo e($cancellation->order->order_number, false); ?>

											</a>
											<?php if($cancellation->order->disputed): ?>
												<span class="label label-danger indent5"><?php echo e(trans('app.statuses.disputed'), false); ?></span>
											<?php endif; ?>
										</td>
										<td><?php echo e($cancellation->order->customer->name, false); ?></td>
										<td><?php echo e(get_formated_currency($cancellation->order->grand_total, true, 2), false); ?></td>
										<td><?php echo $cancellation->order->paymentStatusName(); ?></td>
										<td><?php echo $cancellation->order->orderStatus(); ?></td>
										<td><?php echo e($cancellation->items_count .'/'. $cancellation->order->quantity, false); ?></td>
								        <td><?php echo e($cancellation->created_at->diffForHumans(), false); ?></td>
										<td class="row-options">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cancel', $cancellation->order)): ?>
								                <?php if (! ($cancellation->isApproved())): ?>
								                  <?php echo Form::open(['route' => ['admin.order.cancellation.handle', $cancellation->order, 'approve'], 'method' => 'put', 'class' => 'form-inline indent5']); ?>


								                    <button class="btn btn-default-outline btn-sm confirm" type="submit">
								                      <i class="fa fa-check"></i>
								                      <?php echo e(trans('app.approve'), false); ?>

								                    </button>

								                  <?php echo Form::close(); ?>

								                <?php endif; ?>

								                <?php if (! ($cancellation->isDeclined())): ?>
								                  <?php echo Form::open(['route' => ['admin.order.cancellation.handle', $cancellation->order, 'decline'], 'method' => 'put', 'class' => 'form-inline indent5']); ?>


								                    <button class="btn btn-danger btn-sm confirm" type="submit">
								                      <i class="fa fa-times"></i>
								                      <?php echo e(trans('app.decline'), false); ?>

								                    </button>
								                  <?php echo Form::close(); ?>

								                <?php endif; ?>

											<?php endif; ?>
										</td>
									</tr>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>

			    <div class="tab-pane <?php echo e(Request::input('tab') == 'archived' ? 'active' : '', false); ?>" id="archived_tab">
					<table class="table table-hover table-no-sort">
						<thead>
							<tr>
								<th><?php echo e(trans('app.order_number'), false); ?></th>
								<th><?php echo e(trans('app.customer'), false); ?></th>
								<th><?php echo e(trans('app.grand_total'), false); ?></th>
								<th><?php echo e(trans('app.payment'), false); ?></th>
								<th><?php echo e(trans('app.status'), false); ?></th>
								<th><?php echo e(trans('app.requested_items'), false); ?></th>
								<th><?php echo e(trans('app.requested_at'), false); ?></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $cancellations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancellation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if (! ($cancellation->isOpen())): ?>
									<tr>
										<td>
											<a href="<?php echo e(route('admin.order.order.show', $cancellation->order), false); ?>">
												<?php echo e($cancellation->order->order_number, false); ?>

											</a>
											<span class="indent5"><?php echo $cancellation->statusName(); ?></span>
											<?php if($cancellation->order->disputed): ?>
												<span class="label label-danger indent5"><?php echo e(trans('app.statuses.disputed'), false); ?></span>
											<?php endif; ?>
										</td>
										<td><?php echo e($cancellation->order->customer->name, false); ?></td>
										<td><?php echo e(get_formated_currency($cancellation->order->grand_total, true, 2), false); ?></td>
										<td><?php echo $cancellation->order->paymentStatusName(); ?></td>
										<td><?php echo $cancellation->order->orderStatus(); ?></td>
										<td><?php echo e($cancellation->items_count .'/'. $cancellation->order->quantity, false); ?></td>
								        <td><?php echo e($cancellation->created_at->diffForHumans(), false); ?></td>
										<td class="row-options">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cancel', $cancellation->order)): ?>
								                <?php if (! ($cancellation->isApproved())): ?>
								                  <?php echo Form::open(['route' => ['admin.order.cancellation.handle', $cancellation->order, 'approve'], 'method' => 'put', 'class' => 'form-inline indent5']); ?>


								                    <button class="btn btn-default-outline btn-sm confirm" type="submit">
								                      <i class="fa fa-check"></i>
								                      <?php echo e(trans('app.approve'), false); ?>

								                    </button>

								                  <?php echo Form::close(); ?>

								                <?php endif; ?>

								                <?php if (! ($cancellation->isDeclined())): ?>
								                  <?php echo Form::open(['route' => ['admin.order.cancellation.handle', $cancellation->order, 'decline'], 'method' => 'put', 'class' => 'form-inline indent5']); ?>


								                    <button class="btn btn-danger btn-sm confirm" type="submit">
								                      <i class="fa fa-times"></i>
								                      <?php echo e(trans('app.decline'), false); ?>

								                    </button>
								                  <?php echo Form::close(); ?>

								                <?php endif; ?>

											<?php endif; ?>
										</td>
									</tr>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/order/cancellations.blade.php ENDPATH**/ ?>