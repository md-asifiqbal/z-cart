<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>
            <div class="col-md-12 nopadding">
				<table class="table no-border">
					<tr>
						<th class="text-right"><?php echo e(trans('app.name'), false); ?>:</th>
						<td style="width: 65%;"><span class="lead"><?php echo e($coupon->name, false); ?></span></td>
					</tr>
		            <?php if($coupon->shop_id): ?>
					<tr>
						<th class="text-right"><?php echo e(trans('app.merchant'), false); ?>:</th>
						<td style="width: 65%;">
							<span class="label label-outline">
		                		<?php echo e($coupon->shop->name, false); ?>

							</span>
						</td>
					</tr>
					<?php endif; ?>
					<tr>
						<th class="text-right"><?php echo e(trans('app.coupon_value'), false); ?>:</th>
						<td style="width: 65%;">
							<span class="label label-primary">
								<?php echo e($coupon->type == 'amount' ? get_formated_currency($coupon->value, true, 2) : get_formated_decimal($coupon->value) . ' ' . trans('app.percent'), false); ?>

							</span>
						</td>
					</tr>
	                <tr>
	                	<th class="text-right"><?php echo e(trans('app.status'), false); ?>: </th>
	                	<td style="width: 65%;">
							<?php if($coupon->ending_time < \Carbon\Carbon::now()): ?>
								<?php echo e(trans('app.expired'), false); ?>

							<?php else: ?>
								<?php echo e(($coupon->active) ? trans('app.active') : trans('app.inactive'), false); ?>

							<?php endif; ?>
	                	</td>
	                </tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.created_at'), false); ?>:</th>
						<td style="width: 65%;"><?php echo e($coupon->created_at->toDayDateTimeString(), false); ?></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.updated_at'), false); ?>:</th>
						<td style="width: 65%;"><?php echo e($coupon->updated_at->toDayDateTimeString(), false); ?></td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#tab_1" data-toggle="tab">
					<?php echo e(trans('app.basic_info'), false); ?>

				  </a></li>
				  <li><a href="#tab_2" data-toggle="tab">
					<?php echo e(trans('app.description'), false); ?>

				  </a></li>
				  <li><a href="#tab_3" data-toggle="tab">
					<?php echo e(trans('app.accessibility'), false); ?>

				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="tab_1">
				        <table class="table">
			                <tr>
			                	<th><?php echo e(trans('app.code'), false); ?>: </th>
			                	<td><?php echo e($coupon->code, false); ?></td>
			                </tr>
				            <?php if($coupon->quantity_per_customer && $coupon->quantity_per_customer != 0): ?>
				                <tr>
				                	<th><?php echo e(trans('app.coupon_quantity_per_customer'), false); ?>: </th>
				                	<td><?php echo e($coupon->quantity_per_customer, false); ?></td>
				                </tr>
				            <?php endif; ?>
			                <tr>
			                	<th><?php echo e(trans('app.active_from'), false); ?>: </th>
			                	<td><?php echo e($coupon->starting_time ? $coupon->starting_time->toDayDateTimeString() : '', false); ?></td>
			                </tr>
			                <tr>
			                	<th><?php echo e(trans('app.active_till'), false); ?>: </th>
			                	<td><?php echo e($coupon->ending_time ? $coupon->ending_time->toDayDateTimeString() : '', false); ?></td>
			                </tr>
				            <?php if($coupon->min_order_amount && $coupon->min_order_amount != 0): ?>
				                <tr>
				                	<th><?php echo e(trans('app.min_order_amount'), false); ?>: </th>
				                	<td><?php echo e(get_formated_currency($coupon->min_order_amount, true, 2), false); ?></td>
				                </tr>
				            <?php endif; ?>
			                <tr>
			                	<th><?php echo e(trans('app.restriction'), false); ?>: </th>
			                	<td><?php echo e($coupon->limited ? trans('app.limited_coupon') : trans('app.public_coupon'), false); ?></td>
			                </tr>
				        </table>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_2">
					  <div class="box-body">
				        <?php if($coupon->description): ?>
				            <?php echo htmlspecialchars_decode($coupon->description); ?>

				        <?php else: ?>
				            <p><?php echo e(trans('app.description_not_available'), false); ?> </p>
				        <?php endif; ?>
					  </div>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_3">
			            <?php if($coupon->limited): ?>
							<table class="table table-hover table-2nd-sort">
								<thead>
									<tr>
							          <th><?php echo e(trans('app.avatar'), false); ?></th>
							          <th><?php echo e(trans('app.nice_name'), false); ?></th>
							          <th><?php echo e(trans('app.full_name'), false); ?></th>
							          <th><?php echo e(trans('app.email'), false); ?></th>
							          <th><?php echo e(trans('app.status'), false); ?></th>
									</tr>
								</thead>
						        <tbody>
							        <?php $__currentLoopData = $coupon->customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								          <td>
											<img src="<?php echo e(get_storage_file_url(optional($customer->image)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
								          </td>
								          <td><?php echo e($customer->nice_name, false); ?></td>
								          <td><?php echo e($customer->name, false); ?></td>
								          <td><?php echo e($customer->email, false); ?></td>
								          <td><?php echo e(($customer->active) ? trans('app.active') : trans('app.inactive'), false); ?></td>
								        </tr>
							        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						        </tbody>
							</table>
			            <?php else: ?>
				            <p><?php echo e(trans('app.public_coupon'), false); ?> </p>
			            <?php endif; ?>
				    </div>
				  <!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/coupon/_show.blade.php ENDPATH**/ ?>