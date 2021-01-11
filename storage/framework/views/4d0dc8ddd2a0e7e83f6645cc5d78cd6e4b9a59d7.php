<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding-top: 15px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-12 nopadding" style="margin-top: 10px;">
				<table class="table no-border">
					<tr>
						<th class="text-right"><?php echo e(trans('app.role'), false); ?>:</th>
						<td style="width: 75%;"><span class="lead"><?php echo e($role->name, false); ?></span></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.description'), false); ?>:</th>
						<td style="width: 75%;"><?php echo $role->description; ?></td>
					</tr>
		            <tr>
		            	<th class="text-right"><?php echo e(trans('app.type'), false); ?>: </th>
		            	<td style="width: 75%;"><?php echo e(($role->public) ? trans('app.merchant') : trans('app.platform'), false); ?></td>
		            </tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.role_level'), false); ?>:</th>
						<td style="width: 75%;"><span class="label label-default"><?php echo e($role->level ?? trans('app.not_set'), false); ?></span></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.available_from'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($role->created_at->toFormattedDateString(), false); ?></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.updated_at'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($role->updated_at->toDayDateTimeString(), false); ?></td>
					</tr>
				</table>
			</div>

			<div class="clearfix"></div>

            <div class="row">
	            <div class="box-body">
					<?php if($role_permissions): ?>
					    <table class="table table-striped">
							<thead>
								<tr>
								  <th width="40%" class="text-center">
								    <?php echo e(strtoupper(trans('app.modules')), false); ?>

								  </th>
								  <th>
								    <?php echo e(strtoupper(trans('app.form.permissions')), false); ?>

								  </th>
								</tr>
							</thead>
					    	<tbody>
				        		<?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(in_array($module->id, $role_permissions)): ?>
										<tr>
											<td><button class="btn btn-primary btn-lg btn-block disabled" style="cursor: default;"><?php echo e($module->name, false); ?></button></td>
											<td>
									        <?php $__currentLoopData = $module->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									        	<?php if(array_key_exists($permission->slug, $role_permissions)): ?>
													<span class="label label-outline">
													<i class="fa fa-check"></i>
													<?php echo e($permission->name, false); ?></span>
												<?php else: ?>
													<span class="label label-danger">
													<i class="fa fa-times"></i>
													<?php echo e($permission->name, false); ?></span>
												<?php endif; ?>
					 						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</td>
										</tr>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					<?php else: ?>
						<div class="alert alert-danger"><?php echo e(trans('app.no_permissions_set'), false); ?></div>
					<?php endif; ?>
		        </div>
	        </div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/role/_show.blade.php ENDPATH**/ ?>