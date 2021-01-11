<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-3 nopadding" style="margin-top: 10px;">
				<img src="<?php echo e(get_storage_file_url(optional($shop->logo)->path, 'medium'), false); ?>" class="thumbnail" width="100%" alt="<?php echo e(trans('app.logo'), false); ?>">
			</div>
            <div class="col-md-9 nopadding">
				<table class="table no-border">
					<tr>
						<th class="text-right"><?php echo e(trans('app.name'), false); ?>:</th>
						<td style="width: 75%;">
							<?php echo e($shop->name, false); ?>

		            		<?php if($shop->onTrial()): ?>
					          	<span class="label label-info indent10"><?php echo e(trans('app.trialing'), false); ?></span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.owner'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($shop->owner->name, false); ?></td>
					</tr>
		            <tr>
		            	<th class="text-right"><?php echo e(trans('app.status'), false); ?>: </th>
		            	<td style="width: 75%;">
		            		<?php if($shop->config->maintenance_mode): ?>
					          	<span class="label label-warning"><?php echo e(trans('app.maintenance_mode'), false); ?></span>
		            		<?php else: ?>
			            		<?php echo e(($shop->active) ? trans('app.active') : trans('app.inactive'), false); ?>

							<?php endif; ?>
		            	</td>
		            </tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.member_since'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($shop->created_at->toFormattedDateString(), false); ?></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.updated_at'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($shop->updated_at->toDayDateTimeString(), false); ?></td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>

			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#basic" data-toggle="tab">
					<?php echo e(trans('app.basic_info'), false); ?>

				  </a></li>
				  <li><a href="#config" data-toggle="tab">
					<?php echo e(trans('app.configs'), false); ?>

				  </a></li>
				  <li><a href="#description" data-toggle="tab">
					<?php echo e(trans('app.description'), false); ?>

				  </a></li>
				  <li><a href="#contact" data-toggle="tab">
					<?php echo e(trans('app.contact'), false); ?>

				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="basic">
					  	<div class="box-body">
				        	<table class="table">
								<tr>
									<th class="text-right"><?php echo e(trans('app.current_billing_plan'), false); ?>:</th>
									<td style="width: 75%;">
										<?php echo e($shop->current_billing_plan, false); ?>

					            		
								          	
										
										<?php if($shop->onTrial()): ?>
								          	<span class="label label-info indent10"><?php echo e(trans('app.trialing'), false); ?></span>
										<?php endif; ?>
									</td>
								</tr>
			            		<?php if($shop->onTrial()): ?>
									<tr>
										<th class="text-right"><?php echo e(trans('app.trial_ends_at'), false); ?>:</th>
										<td style="width: 75%;"><?php echo e($shop->trial_ends_at->toDayDateTimeString(), false); ?></td>
									</tr>
								<?php endif; ?>
			            		<?php if($shop->subscribed($shop->current_billing_plan)): ?>
									<tr>
										<th class="text-right"><?php echo e(trans('app.next_billing_date'), false); ?>:</th>
										<td style="width: 75%;"><?php echo e($shop->getNextBillingDate(), false); ?></td>
									</tr>
								<?php endif; ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.legal_name'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($shop->legal_name, false); ?></td>
								</tr>
								<tr>
									<th class="text-right"><?php echo e(trans('app.slug'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($shop->slug, false); ?></td>
								</tr>
								<tr>
									<th class="text-right"><?php echo e(trans('app.time_zone'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($shop->timezone->text, false); ?></td>
								</tr>
					            <?php if($shop->external_url): ?>
									<tr>
										<th class="text-right"><?php echo e(trans('app.external_url'), false); ?>:</th>
										<td style="width: 75%;"><?php echo e($shop->external_url, false); ?></td>
									</tr>
								<?php endif; ?>
							</table>
						</div>
					</div>
				    <div class="tab-pane" id="config">
					  <div class="box-body">
				        <table class="table">
							<tr>
								<th class="text-right"><?php echo e(trans('app.order_handling_cost'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e(get_formated_currency($shop->config->order_handling_cost, true, 2), false); ?></td>
							</tr>

							<?php if($shop->config->tax): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.default_tax'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($shop->config->tax->name, false); ?></td>
								</tr>
							<?php endif; ?>

							<?php if($shop->config->paymentMethod): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.default_payment_method'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($shop->config->paymentMethod->name, false); ?></td>
								</tr>
							<?php endif; ?>

							<tr>
								<th class="text-right"><?php echo e(trans('app.payment_methods'), false); ?>:</th>
								<td style="width: 75%;">
									<?php $__currentLoopData = $shop->config->paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<span class="label label-outline"> <?php echo e($paymentMethod->name, false); ?></span>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</td>
							</tr>

							<tr>
								<th class="text-right"><?php echo e(trans('app.support_phone'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($shop->config->support_phone, false); ?></td>
							</tr>

				            <?php if($shop->config->support_phone_toll_free): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.support_phone_toll_free'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($shop->config->support_phone_toll_free, false); ?></td>
								</tr>
							<?php endif; ?>

							<tr>
								<th class="text-right"><?php echo e(trans('app.support_email'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($shop->config->support_email, false); ?></td>
							</tr>

							<tr>
								<th class="text-right"><?php echo e(trans('app.config_updated_at'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($shop->config->updated_at->toDayDateTimeString(), false); ?></td>
							</tr>
				        </table>
					  </div>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="description">
			            <?php echo $shop->description ?? trans('app.description_not_available'); ?>

				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="contact">
					  <div class="box-body">
				        <table class="table">
				            <?php if($shop->email): ?>
							<tr>
								<th class="text-right"><?php echo e(trans('app.email'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($shop->email, false); ?></td>
							</tr>
							<?php endif; ?>
				            <?php if($shop->primaryAddress): ?>
							<tr>
								<th class="text-right"><?php echo e(trans('app.address'), false); ?>:</th>
								<td style="width: 75%;">
				        			<?php echo $shop->primaryAddress->toHtml(); ?>

								</td>
							</tr>
							<?php endif; ?>
				        </table>
					  </div>
				    </div>
				    <!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/shop/_show.blade.php ENDPATH**/ ?>