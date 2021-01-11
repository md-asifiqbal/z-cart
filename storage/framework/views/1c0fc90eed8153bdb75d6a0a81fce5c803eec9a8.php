<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.partials.notices.worldwide_business_area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo e(trans('app.countries'), false); ?>

			    <i class="fa fa-question-circle indent10 small" data-toggle="tooltip" data-placement="right" title="<?php echo e(trans('help.active_business_zone'), false); ?>"></i>
			</h3>
			<div class="box-tools pull-right">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Country::class)): ?>
					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.country.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_country'), false); ?></a>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-no-sort">
				<thead>
					<tr>
						<th><?php echo e(trans('app.flag'), false); ?></th>
						<th><?php echo e(trans('app.iso_code'), false); ?></th>
						<th><?php echo e(trans('app.name'), false); ?></th>
						<th class="text-center"><?php echo e(trans('app.number_of_states'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo get_flag_img_by_code($country->iso_code); ?></td>
						<td><?php echo e($country->iso_code, false); ?></td>
						<td>
							<a href="<?php echo e(route('admin.setting.country.states', $country->id), false); ?>">
								<?php echo e($country->name, false); ?>

							</a>

				          	<?php if($country->eea): ?>
					          	<span class="indent10 label label-outline" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.eea'), false); ?>"><?php echo e(trans('app.eea'), false); ?></span>
					        <?php endif; ?>

				          	<?php if($country->active): ?>
					          	<span class="indent10 label label-primary pull-right"><?php echo e(trans('app.active'), false); ?></span>
					        <?php endif; ?>
						</td>
						<td class="text-center"><?php echo e($country->states_count, false); ?></td>
						<td class="row-options">
							<a href="<?php echo e(route('admin.setting.country.states', $country->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.state'), false); ?>" class="fa fa-plus"></i></a>&nbsp;

							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $country)): ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.country.edit', $country->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/country/index.blade.php ENDPATH**/ ?>