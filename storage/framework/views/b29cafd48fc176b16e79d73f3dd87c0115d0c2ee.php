<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.currencies'), false); ?></h3>
			<div class="box-tools pull-right">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Currency::class)): ?>
					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.currency.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_currency'), false); ?></a>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-no-sort">
				<thead>
					<tr>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Currency::class)): ?>
							<th class="massActionWrapper">
				                <!-- Check all button -->
								<div class="btn-group ">
									<button type="button" class="btn btn-xs btn-default checkbox-toggle">
										<i class="fa fa-square-o" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.select_all'), false); ?>"></i>
									</button>
									<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<span class="caret"></span>
										<span class="sr-only"><?php echo e(trans('app.toggle_dropdown'), false); ?></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.currency.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
									</ul>
								</div>
							</th>
						<?php endif; ?>
						<th><?php echo e(trans('app.iso_code'), false); ?></th>
						<th><?php echo e(trans('app.name'), false); ?></th>
						<th><?php echo e(trans('app.symbol'), false); ?></th>
						<th><?php echo e(trans('app.subunit'), false); ?></th>
						<th><?php echo e(trans('app.decimal_mark'), false); ?></th>
						<th><?php echo e(trans('app.thousands_separator'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody id="massSelectArea">
					<?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
					  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Currency::class)): ?>
							<td><input id="<?php echo e($currency->id, false); ?>" type="checkbox" class="massCheck"></td>
					  	<?php endif; ?>
						<td><?php echo e($currency->iso_code, false); ?></td>
						<td>
							<?php echo e($currency->name, false); ?>

				          	<?php if($currency->active): ?>
					          	<span class="indent10 label label-primary pull-right"><?php echo e(trans('app.active'), false); ?></span>
							    
					        <?php endif; ?>
						</td>
						<td><?php echo e($currency->symbol, false); ?></td>
						<td><?php echo e($currency->subunit, false); ?></td>
						<td>
				          	<span class="label label-default"><?php echo e($currency->decimal_mark, false); ?></span>
						</td>
						<td>
				          	<span class="label label-default"><?php echo e($currency->thousands_separator, false); ?></span>
						</td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $currency)): ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.currency.edit', $currency->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
							<?php endif; ?>

							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $currency)): ?>
								<?php echo Form::open(['route' => ['admin.setting.currency.destroy', $currency->id], 'method' => 'delete', 'class' => 'data-form']); ?>

									<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/currency/index.blade.php ENDPATH**/ ?>