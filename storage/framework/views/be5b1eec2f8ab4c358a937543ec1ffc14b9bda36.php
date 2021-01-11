

<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.subscription_plans'), false); ?></h3>
			<div class="box-tools pull-right">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\SubscriptionPlan::class)): ?>
					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.subscriptionPlan.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_subscription_plan'), false); ?></a>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-no-option" id="sortable" data-action="<?php echo e(Route('admin.setting.subscriptionPlan.reorder'), false); ?>">
				<thead>
					<tr>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\SubscriptionPlan::class)): ?>
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
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.subscriptionPlan.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.subscriptionPlan.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
									</ul>
								</div>
							</th>
						<?php endif; ?>
				        <th width="7px"><?php echo e(trans('app.#'), false); ?></th>
						<th><?php echo e(trans('app.name'), false); ?></th>
						<th><i class="fa fa-money"></i> <?php echo e(trans('app.cost_per_month'), false); ?></th>
						<th><i class="fa fa-users"></i> <?php echo e(trans('app.team_size'), false); ?></th>
						<th><i class="fa fa-cubes"></i> <?php echo e(trans('app.inventory_limit'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
		        <tbody id="massSelectArea">
					<?php $__currentLoopData = $subscription_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriptionPlan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr id="<?php echo e($subscriptionPlan->plan_id, false); ?>">
						  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\SubscriptionPlan::class)): ?>
							  	<td>
							  		<?php if($subscriptionPlan->shops_count): ?>
										<span class="text-muted">
											<i class="fa fa-ban" data-toggle="tooltip" data-placement="right" title="<?php echo e(trans('help.this_plan_has_active_subscribers'), false); ?>" ></i>
										</span>
								  	<?php else: ?>
										<input id="<?php echo e($subscriptionPlan->plan_id, false); ?>" type="checkbox" class="massCheck">
								  	<?php endif; ?>
							  	</td>
						  	<?php endif; ?>
					        <td>
								<i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.move'), false); ?>" class="fa fa-arrows sort-handler"> </i>
					        </td>
							<td>
								<?php echo e($subscriptionPlan->name, false); ?>

								<?php if($subscriptionPlan->featured): ?>
									<span class="label label-primary indent10"><?php echo e(trans('app.featured'), false); ?></span>
								<?php endif; ?>

								<span class="label label-outline pull-right" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.subscribers_count'), false); ?>">
									<?php echo e($subscriptionPlan->shops_count, false); ?>

								</span>
							</td>
							<td><?php echo e(get_formated_currency($subscriptionPlan->cost, true, 2), false); ?></td>
							<td><?php echo e($subscriptionPlan->team_size, false); ?></td>
							<td><?php echo e($subscriptionPlan->inventory_limit, false); ?></td>
							<td class="row-options">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $subscriptionPlan)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.subscriptionPlan.show', $subscriptionPlan->plan_id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $subscriptionPlan)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.subscriptionPlan.edit', $subscriptionPlan->plan_id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $subscriptionPlan)): ?>
									<?php if($subscriptionPlan->shops_count): ?>
										<span class="text-muted">
											<i class="fa fa-trash-o" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.this_plan_has_active_subscribers'), false); ?>" ></i>
										</span>
									<?php else: ?>
										<?php echo Form::open(['route' => ['admin.setting.subscriptionPlan.trash', $subscriptionPlan->plan_id], 'method' => 'delete', 'class' => 'data-form']); ?>

											<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

										<?php echo Form::close(); ?>

									<?php endif; ?>
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
			<h3 class="box-title">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\SubscriptionPlan::class)): ?>
					<?php echo Form::open(['route' => ['admin.setting.subscriptionPlan.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

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
			<table class="table table-hover table-no-option">
				<thead>
					<tr>
						<th><?php echo e(trans('app.name'), false); ?></th>
						<th><?php echo e(trans('app.cost_per_month'), false); ?></th>
						<th><?php echo e(trans('app.team_size'), false); ?></th>
						<th><?php echo e(trans('app.inventory_limit'), false); ?></th>
						<th><?php echo e(trans('app.deleted_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($trash->name, false); ?></td>
						<td><?php echo e(get_formated_currency($trash->cost, true, 2), false); ?></td>
						<td><?php echo e($trash->team_size, false); ?></td>
						<td><?php echo e($trash->inventory_limit, false); ?></td>
						<td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
								<a href="<?php echo e(route('admin.setting.subscriptionPlan.restore', $trash->plan_id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

								<?php echo Form::open(['route' => ['admin.setting.subscriptionPlan.destroy', $trash->plan_id], 'method' => 'delete', 'class' => 'data-form']); ?>

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

<?php $__env->startSection('page-script'); ?>
	<?php echo $__env->make('plugins.drag-n-drop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/subscription_plan/index.blade.php ENDPATH**/ ?>