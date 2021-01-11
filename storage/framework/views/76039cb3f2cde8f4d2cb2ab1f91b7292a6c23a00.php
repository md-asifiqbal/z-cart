<?php $__env->startSection('buttons'); ?>
    <?php if(Gate::allows('create', App\Order::class) || Gate::allows('create', App\Cart::class)): ?>
		<a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.order.searchCutomer'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_order'), false); ?></a>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Cart::class)): ?>
		<?php echo $__env->make('admin/partials/_cart_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>

	<div class="box collapsed-box">
		<div class="box-header with-bcart">
			<h3 class="box-title">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Cart::class)): ?>
					<?php echo Form::open(['route' => ['admin.order.cart.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

						<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm btn btn-default btn-flat ajax-silent', 'title' => trans('help.empty_trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'right']); ?>

					<?php echo Form::close(); ?>

				<?php else: ?>
					<i class="fa fa-trash-o"></i>
				<?php endif; ?>
				<?php echo e(trans('app.trash'), false); ?>

			</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-sort">
				<thead>
					<tr>
	                    <th><?php echo e(trans('app.created_at'), false); ?></th>
	                    <th><?php echo e(trans('app.customer'), false); ?></th>
	                    <th><?php echo e(trans('app.items'), false); ?></th>
	                    <th><?php echo e(trans('app.quantities'), false); ?></th>
	                    <th><?php echo e(trans('app.grand_total'), false); ?></th>
	                    <th><?php echo e(trans('app.deleted_at'), false); ?></th>
	                    <th class="text-right"><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
                        <td><?php echo e($trash->created_at->diffForHumans(), false); ?></td>
                        <td><?php echo e($trash->customer->getName(), false); ?></td>
                        <td><?php echo e($trash->item_count, false); ?></td>
                        <td><?php echo e($trash->quantity, false); ?></td>
                        <td><?php echo e(get_formated_currency($trash->grand_total, true, 2), false); ?></td>
                        <td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
								<a href="<?php echo e(route('admin.order.cart.restore', $trash->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

								<?php echo Form::open(['route' => ['admin.order.cart.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']); ?>

									<?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete_permanently'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/cart/index.blade.php ENDPATH**/ ?>