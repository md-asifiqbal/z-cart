<?php $__env->startSection('buttons'); ?>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Order::class)): ?>
		<a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.order.searchCutomer'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_order'), false); ?></a>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	

	<?php
		$unpaid_orders = $orders->where('payment_status', '<' , App\Order::PAYMENT_STATUS_PAID);
	?>

	<div class="box">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="<?php echo e(Request::has('tab') ? '' : 'active', false); ?>"><a href="#all_orders_tab" data-toggle="tab">
					<i class="fa fa-shopping-cart hidden-sm"></i>
					<?php echo e(trans('app.all_orders'), false); ?>

				</a></li>
				<li class="<?php echo e(Request::input('tab') == 'unpaid' ? 'active' : '', false); ?>"><a href="#unpaid_tab" data-toggle="tab">
					<i class="fa fa-money hidden-sm"></i>
					<?php echo e(trans('app.statuses.unpaid'), false); ?>

				</a></li>
				<li class="<?php echo e(Request::input('tab') == 'unfulfilled' ? 'active' : '', false); ?>"><a href="#unfulfilled_tab" data-toggle="tab">
					<i class="fa fa-shopping-basket hidden-sm"></i>
					<?php echo e(trans('app.statuses.unfulfilled'), false); ?>

				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane <?php echo e(Request::has('tab') ? '' : 'active', false); ?>" id="all_orders_tab">
					<table class="table table-hover table-no-sort">
						<thead>
							<tr>
								<th><?php echo e(trans('app.order_number'), false); ?></th>
								<th><?php echo e(trans('app.order_date'), false); ?></th>
								<th><?php echo e(trans('app.customer'), false); ?></th>
								<th><?php echo e(trans('app.grand_total'), false); ?></th>
								<th><?php echo e(trans('app.payment'), false); ?></th>
								<th><?php echo e(trans('app.status'), false); ?></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $order)): ?>
											<a href="<?php echo e(route('admin.order.order.show', $order->id), false); ?>">
												<?php echo e($order->order_number, false); ?>

											</a>
										<?php else: ?>
											<?php echo e($order->order_number, false); ?>

										<?php endif; ?>
										<?php if($order->disputed): ?>
											<span class="label label-danger indent5"><?php echo e(trans('app.statuses.disputed'), false); ?></span>
										<?php endif; ?>
									</td>
							        <td><?php echo e($order->created_at->toDayDateTimeString(), false); ?></td>
									<td><?php echo e($order->customer->name, false); ?></td>
									<td><?php echo e(get_formated_currency($order->grand_total, true, 2), false); ?></td>
									<td><?php echo $order->paymentStatusName(); ?></td>
									<td><?php echo $order->orderStatus(); ?></td>
									<td class="row-options">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('archive', $order)): ?>
											<?php echo Form::open(['route' => ['admin.order.order.archive', $order->id], 'method' => 'delete', 'class' => 'data-form']); ?>

												<?php echo Form::button('<i class="fa fa-archive text-muted"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.order_archive'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

											<?php echo Form::close(); ?>

										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>

			    <div class="tab-pane <?php echo e(Request::input('tab') == 'unpaid' ? 'active' : '', false); ?>" id="unpaid_tab">
					<table class="table table-hover table-no-sort">
						<thead>
							<tr>
								<th><?php echo e(trans('app.order_number'), false); ?></th>
								<th><?php echo e(trans('app.order_date'), false); ?></th>
								<th><?php echo e(trans('app.customer'), false); ?></th>
								<th><?php echo e(trans('app.grand_total'), false); ?></th>
								<th><?php echo e(trans('app.payment'), false); ?></th>
								<th><?php echo e(trans('app.status'), false); ?></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $unpaid_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $order)): ?>
											<a href="<?php echo e(route('admin.order.order.show', $order->id), false); ?>">
												<?php echo e($order->order_number, false); ?>

											</a>
										<?php else: ?>
											<?php echo e($order->order_number, false); ?>

										<?php endif; ?>
										<?php if($order->disputed): ?>
											<span class="label label-danger indent5"><?php echo e(trans('app.statuses.disputed'), false); ?></span>
										<?php endif; ?>
									</td>
							        <td><?php echo e($order->created_at->toDayDateTimeString(), false); ?></td>
									<td><?php echo e($order->customer->name, false); ?></td>
									<td><?php echo e(get_formated_currency($order->grand_total, true, 2), false); ?></td>
									<td><?php echo $order->paymentStatusName(); ?></td>
									<td><?php echo $order->orderStatus(); ?></td>
									<td class="row-options">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('archive', $order)): ?>
											<?php echo Form::open(['route' => ['admin.order.order.archive', $order->id], 'method' => 'delete', 'class' => 'data-form']); ?>

												<?php echo Form::button('<i class="fa fa-archive text-muted"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.order_archive'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

											<?php echo Form::close(); ?>

										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>

			    <div class="tab-pane <?php echo e(Request::input('tab') == 'unfulfilled' ? 'active' : '', false); ?>" id="unfulfilled_tab">
					<table class="table table-hover table-no-sort">
						<thead>
							<tr>
								<th><?php echo e(trans('app.order_number'), false); ?></th>
								<th><?php echo e(trans('app.order_date'), false); ?></th>
								<th><?php echo e(trans('app.customer'), false); ?></th>
								<th><?php echo e(trans('app.grand_total'), false); ?></th>
								<th><?php echo e(trans('app.payment'), false); ?></th>
								<th><?php echo e(trans('app.status'), false); ?></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if (! ($order->isFulfilled())): ?>
									<tr>
										<td>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $order)): ?>
												<a href="<?php echo e(route('admin.order.order.show', $order->id), false); ?>">
													<?php echo e($order->order_number, false); ?>

												</a>
											<?php else: ?>
												<?php echo e($order->order_number, false); ?>

											<?php endif; ?>
											<?php if($order->disputed): ?>
												<span class="label label-danger indent5"><?php echo e(trans('app.statuses.disputed'), false); ?></span>
											<?php endif; ?>
										</td>
								        <td><?php echo e($order->created_at->toDayDateTimeString(), false); ?></td>
										<td><?php echo e($order->customer->name, false); ?></td>
										<td><?php echo e(get_formated_currency($order->grand_total, true, 2), false); ?></td>
										<td><?php echo $order->paymentStatusName(); ?></td>
										<td><?php echo $order->orderStatus(); ?></td>
										<td class="row-options">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('archive', $order)): ?>
												<?php echo Form::open(['route' => ['admin.order.order.archive', $order->id], 'method' => 'delete', 'class' => 'data-form']); ?>

													<?php echo Form::button('<i class="fa fa-archive text-muted"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.order_archive'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

												<?php echo Form::close(); ?>

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

	<div class="box collapsed-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-trash-o"></i> <?php echo e(trans('app.trash'), false); ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-no-sort">
				<thead>
					<tr>
						<th><?php echo e(trans('app.order_number'), false); ?></th>
						<th><?php echo e(trans('app.order_date'), false); ?></th>
						<th><?php echo e(trans('app.grand_total'), false); ?></th>
						<th><?php echo e(trans('app.payment'), false); ?></th>
						<th><?php echo e(trans('app.status'), false); ?></th>
						<th><?php echo e(trans('app.archived_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $archive)): ?>
								<a href="<?php echo e(route('admin.order.order.show', $archive->id), false); ?>">
									<?php echo e($archive->order_number, false); ?>

								</a>
							<?php else: ?>
								<?php echo e($archive->order_number, false); ?>

							<?php endif; ?>
						</td>
				        <td><?php echo e($archive->created_at->toDayDateTimeString(), false); ?></td>
						<td><?php echo e(get_formated_currency($archive->grand_total, true, 2), false); ?></td>
						<td><?php echo $archive->paymentStatusName(); ?></td>
						<td><?php echo $archive->orderStatus(); ?></td>
						<td><?php echo e($archive->deleted_at->diffForHumans(), false); ?></td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('archive', $archive)): ?>
								<a href="<?php echo e(route('admin.order.order.restore', $archive->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/order/index.blade.php ENDPATH**/ ?>