<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.shops'), false); ?></h3>
			<div class="box-tools pull-right">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Merchant::class)): ?>
					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.merchant.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_merchant'), false); ?></a>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-no-sort">
				<thead>
					<tr>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Shop::class)): ?>
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
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
									</ul>
								</div>
							</th>
						<?php endif; ?>
						<th><?php echo e(trans('app.image'), false); ?></th>
						<th><?php echo e(trans('app.shop_name'), false); ?></th>
						<?php if(is_subscription_enabled()): ?>
							<th><?php echo e(trans('app.current_billing_plan'), false); ?></th>
						<?php endif; ?>
						<th><?php echo e(trans('app.owner'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody id="massSelectArea">
					<?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="<?php echo e(! $shop->active ? 'inactive' : '', false); ?>">
						  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Shop::class)): ?>
								<td><input id="<?php echo e($shop->id, false); ?>" type="checkbox" class="massCheck"></td>
						  	<?php endif; ?>
							<td>
								<img src="<?php echo e(get_storage_file_url(optional($shop->logo)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
							</td>
							<td>
								<?php echo e($shop->name, false); ?>


			            		<?php if($shop->isVerified()): ?>
									<img src="<?php echo e(get_verified_badge(), false); ?>" class="verified-badge img-xs" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.verified_seller'), false); ?>" alt="verified-badge">
								<?php endif; ?>

			            		<?php if($shop->isDown()): ?>
						          	<span class="label label-default indent10"><?php echo e(trans('app.maintenance_mode'), false); ?></span>
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $shop)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.toggle', $shop), false); ?>" data-doafter="reload" type="button" class="toggle-widget toggle-confirm pull-right">
										<i class="fa fa-<?php echo e($shop->active ? 'heart-o' : 'heart', false); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e($shop->active ? trans('app.deactivate') : trans('app.activate'), false); ?>"></i>
									</a>
								<?php endif; ?>
							</td>

							<?php if(is_subscription_enabled()): ?>
					          	<td>
					          		<?php echo e($shop->plan->name, false); ?>


				            		<?php if($shop->onTrial()): ?>
							          	<span class="label label-info indent10"><?php echo e(trans('app.trialing'), false); ?></span>
							        <?php elseif($shop->hasExpiredPlan()): ?>
							          	<span class="label label-default indent10"><?php echo e(trans('app.expired'), false); ?></span>
									<?php endif; ?>

				            		<?php if($shop->onTrial() || $shop->hasExpiredPlan()): ?>
										<?php if(Auth::user()->isAdmin()): ?>
											<a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.subscription.editTrial', $shop), false); ?>"  class="ajax-modal-btn pull-right"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.update_trial_period'), false); ?>" class="fa fa-calendar"></i> </a>
										<?php endif; ?>
									<?php endif; ?>
					          	</td>
							<?php endif; ?>

							<td>
					            <img src="<?php echo e(get_avatar_src($shop->owner, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
								<p class="indent10">
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $shop->owner)): ?>
							            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.merchant.show', $shop->owner_id), false); ?>" class="ajax-modal-btn"><?php echo e($shop->owner->getName(), false); ?></a>
									<?php else: ?>
										<?php echo e($shop->owner->getName(), false); ?>

									<?php endif; ?>

				            		<?php if (! ($shop->owner->active)): ?>
					            		<span class="label label-default indent10"><?php echo e(trans('app.inactive'), false); ?></span>
									<?php endif; ?>
								</p>
							</td>
							<td class="row-options">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $shop)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.show', $shop->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i></a>&nbsp;

									<a href="<?php echo e(route('admin.vendor.shop.staffs', $shop->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.staffs'), false); ?>" class="fa fa-users"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('secretLogin', $shop->owner)): ?>
									<a href="<?php echo e(route('admin.user.secretLogin', $shop->owner->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.secret_login_merchant'), false); ?>" class="fa fa-user-secret"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $shop)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.edit', $shop->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;

									<?php if($shop->primaryAddress): ?>
										<a href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $shop->primaryAddress->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.update_address'), false); ?>" class="fa fa-map-marker"></i></a>&nbsp;
									<?php else: ?>
										<a href="javascript:void(0)" data-link="<?php echo e(route('address.create', ['shop', $shop->id]), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.add_address'), false); ?>" class="fa fa-plus-square-o"></i></a>&nbsp;
									<?php endif; ?>
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $shop)): ?>
									<?php echo Form::open(['route' => ['admin.vendor.shop.trash', $shop->id], 'method' => 'delete', 'class' => 'data-form']); ?>

										<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

									<?php echo Form::close(); ?>

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
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Shop::class)): ?>
					<?php echo Form::open(['route' => ['admin.vendor.shop.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

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
			<table class="table table-hover table-no-sort">
				<thead>
					<tr>
						<th><?php echo e(trans('app.image'), false); ?></th>
						<th><?php echo e(trans('app.name'), false); ?></th>
						<th><?php echo e(trans('app.email'), false); ?></th>
						<th><?php echo e(trans('app.owner'), false); ?></th>
						<th><?php echo e(trans('app.deleted_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<img src="<?php echo e(get_storage_file_url(optional($trash->logo)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
						</td>
						<td><?php echo e($trash->name, false); ?></td>
						<td><?php echo e($trash->email, false); ?></td>
						<td>
				            <img src="<?php echo e(get_avatar_src($trash->owner, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
							<p class="indent10"><?php echo e($trash->owner->getName(), false); ?></p>
						</td>
						<td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
								<a href="<?php echo e(route('admin.vendor.shop.restore', $trash->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

								<?php echo Form::open(['route' => ['admin.vendor.shop.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/shop/index.blade.php ENDPATH**/ ?>