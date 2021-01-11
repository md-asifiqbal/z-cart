

<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.merchants'), false); ?></h3>
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
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Merchant::class)): ?>
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
						<th><?php echo e(trans('app.avatar'), false); ?></th>
						<th><?php echo e(trans('app.nice_name'), false); ?></th>
						<th><?php echo e(trans('app.full_name'), false); ?></th>
						<th><?php echo e(trans('app.shop'), false); ?></th>
                      <th>Bkash No</th>
                      <th>TXT ID</th>
						<?php if(is_subscription_enabled()): ?>
							<th><?php echo e(trans('app.current_billing_plan'), false); ?></th>
			          	<?php endif; ?>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody id="massSelectArea">
				    <?php $__currentLoopData = $merchants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merchant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr>
						  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Merchant::class)): ?>
								<td><input id="<?php echo e($merchant->owns->id, false); ?>" type="checkbox" class="massCheck"></td>
						  	<?php endif; ?>
				          	<td>
				            	<img src="<?php echo e(get_avatar_src($merchant, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
				            </td>
				            <td>
								<?php echo e($merchant->nice_name, false); ?>


			            		<?php if (! ($merchant->active)): ?>
				            		<span class="label label-default indent10"><?php echo e(trans('app.inactive'), false); ?></span>
								<?php endif; ?>
				          	</td>
				          	<td><?php echo e($merchant->name, false); ?></td>
				          	<td>
					          	<?php if($merchant->owns->name): ?>
									<img src="<?php echo e(get_storage_file_url(optional($merchant->owns->image)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
									<p class="indent10">
							            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.show', $merchant->owns->id), false); ?>" class="ajax-modal-btn">
											<?php echo e($merchant->owns->name, false); ?>

								         </a>
									</p>

						          	<?php if($merchant->owns->deleted_at): ?>
							          	<span class="label label-default indent10">
							          		<i class="fa fa-trash-o small"></i> <?php echo e(trans('app.in_trash'), false); ?>

							          	</span>
						          	<?php endif; ?>

				            		<?php if($merchant->owns->isDown()): ?>
							          	<span class="label label-default indent10"><?php echo e(trans('app.maintenance_mode'), false); ?></span>
				            		<?php elseif(!$merchant->owns->active): ?>
					            		<span class="label label-default indent10"><?php echo e(trans('app.inactive'), false); ?></span>
									<?php endif; ?>
					          	<?php endif; ?>
				          	</td>
							<td><?php echo e($merchant->bkash, false); ?></td>
                          <td><?php echo e($merchant->txtid, false); ?></td>
							<?php if(is_subscription_enabled()): ?>
					          	<td>
					          		<?php echo e(optional($merchant->owns)->plan->name, false); ?>


			            			<?php if($merchant->owns->onTrial()): ?>
						          		<span class="label label-info indent10"><?php echo e(trans('app.trialing'), false); ?></span>
									<?php endif; ?>
					          	</td>
				          	<?php endif; ?>

				          	<td class="row-options">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $merchant)): ?>
						            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.merchant.show', $merchant->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.profile'), false); ?>" class="fa fa-user-circle-o"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('secretLogin', $merchant)): ?>
									<a href="<?php echo e(route('admin.user.secretLogin', $merchant), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.secret_login_user'), false); ?>" class="fa fa-user-secret"></i></a>&nbsp;
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $merchant)): ?>
						            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.merchant.edit', $merchant->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;

								    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.merchant.changePassword', $merchant->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.change_password'), false); ?>" class="fa fa-lock"></i></a>&nbsp;

									<?php if($merchant->primaryAddress): ?>
										<a href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $merchant->primaryAddress->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.update_address'), false); ?>" class="fa fa-map-marker"></i></a>&nbsp;
									<?php else: ?>
										<a href="javascript:void(0)" data-link="<?php echo e(route('address.create', ['merchant', $merchant->id]), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.add_address'), false); ?>" class="fa fa-plus-square-o"></i></a>&nbsp;
									<?php endif; ?>
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $merchant)): ?>
						            <?php echo Form::open(['route' => ['admin.vendor.shop.trash', $merchant->owns->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Merchant::class)): ?>
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
		          <th><?php echo e(trans('app.avatar'), false); ?></th>
		          <th><?php echo e(trans('app.nice_name'), false); ?></th>
		          <th><?php echo e(trans('app.full_name'), false); ?></th>
		          <th><?php echo e(trans('app.email'), false); ?></th>
		          <th><?php echo e(trans('app.shop'), false); ?></th>
		          <th><?php echo e(trans('app.deleted_at'), false); ?></th>
		          <th><?php echo e(trans('app.option'), false); ?></th>
		        </tr>
		        </thead>
		        <tbody>
			        <?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr>
				          	<td>
					            <img src="<?php echo e(get_avatar_src($trash, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
							</td>
					        <td><?php echo e($trash->nice_name, false); ?></td>
					        <td><?php echo e($trash->name, false); ?></td>
					        <td><?php echo e($trash->email, false); ?></td>
					        <td>
					          	<?php if($trash->owns): ?>
									<img src="<?php echo e(get_storage_file_url(optional($trash->owns->image)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
									<p class="indent10"><?php echo e($trash->owns->name, false); ?></p>
					          	<?php endif; ?>

					          	<?php if($trash->owns->deleted_at): ?>
						          	<span class="label label-default indent10">
						          		<i class="fa fa-trash-o small"></i> <?php echo e(trans('app.in_trash'), false); ?>

						          	</span>
					          	<?php endif; ?>
				          	</td>
				          <td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
				          <td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
			                    <a href="<?php echo e(route('admin.vendor.shop.restore', $trash->owns->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

			                    <?php echo Form::open(['route' => ['admin.vendor.shop.destroy', $trash->owns->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/merchant/index.blade.php ENDPATH**/ ?>