<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>
	        <div class="box-widget widget-user">
	            <div class="widget-user-header bg-aqua-active card-background">
	              	<h3 class="widget-user-username"><?php echo e($customer->getName(), false); ?></h3>
	              	<h5 class="widget-user-desc">
		                <?php echo e(($customer->active) ? trans('app.active') : 	trans('app.inactive'), false); ?>

	              	</h5>
	            </div>
	            <div class="widget-user-image">
            		<img src="<?php echo e(get_avatar_src($customer, 'small'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
	            </div>
	            <div class="spacer10"></div>
              	<div class="row">
	                <div class="col-sm-4 border-right">
	                  <div class="description-block">
	                    <h5 class="description-header"><?php echo e(get_formated_currency(\App\Helpers\Statistics::total_spent($customer)), false); ?></h5>
	                    <span class="description-text"><?php echo e(trans('app.spent'), false); ?></span>
	                  </div>
	                </div>

	                <div class="col-sm-4 border-right">
	                  <div class="description-block">
	                  	<h5 class="description-header">&nbsp;</h5>
	                    <span class="description-text small"><?php echo e(trans('app.member_since'), false); ?>: <?php echo e($customer->created_at->diffForHumans(), false); ?></span>
	                  </div>
	                </div>

	                <div class="col-sm-4">
	                  <div class="description-block">
	                    <h5 class="description-header"><?php echo e(\App\Helpers\Statistics::customer_orders_count($customer), false); ?></h5>
	                    <span class="description-text">#<?php echo e(trans('app.orders'), false); ?></span>
	                  </div>
	                </div>
            	</div>
              	<!-- /.row -->
	            <div class="spacer10"></div>
	        </div>
	        <!-- /.widget-user -->

			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#basic_info_tab" data-toggle="tab">
				  	<?php echo e(trans('app.basic_info'), false); ?>

				  </a></li>
				  <li><a href="#address_tab" data-toggle="tab">
				  	<?php echo e(trans('app.addresses'), false); ?>

				  </a></li>
				  <?php if(Auth::user()->isFromPlatform()): ?>
					  <li><a href="#latest_orders_tab" data-toggle="tab">
					  	<?php echo e(trans('app.latest_orders'), false); ?>

					  </a></li>
				  <?php endif; ?>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="basic_info_tab">
				        <table class="table">
				            <?php if($customer->name): ?>
				                <tr>
				                	<th width="25%"><?php echo e(trans('app.full_name'), false); ?>: </th>
				                	<td><?php echo e($customer->name, false); ?></td>
				                </tr>
				            <?php endif; ?>

			                <tr>
			                	<th><?php echo e(trans('app.email'), false); ?>: </th>
			                	<td><?php echo e($customer->email, false); ?></td>
			                </tr>

				            <?php if($customer->dob): ?>
				                <tr>
				                	<th><?php echo e(trans('app.dob'), false); ?>: </th>
				                	<td><?php echo date('F j, Y', strtotime($customer->dob)) . '<small> (' . get_age($customer->dob) . ')</small>'; ?></td>
				                </tr>
				            <?php endif; ?>

				            <?php if($customer->sex): ?>
				                <tr>
				                	<th><?php echo e(trans('app.sex'), false); ?>: </th>
				                	<td><?php echo get_formated_gender($customer->sex); ?></td>
				                </tr>
				            <?php endif; ?>

				            <?php if($customer->description): ?>
				                <tr>
				                	<th><?php echo e(trans('app.description'), false); ?>: </th>
				                	<td><?php echo $customer->description; ?></td>
				                </tr>
				            <?php endif; ?>
				        </table>
				    </div> <!-- /.tab-pane -->

				    <div class="tab-pane" id="address_tab">
				    	<?php $__currentLoopData = $customer->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					        <?php echo $address->toHtml(); ?>


				    		<?php if (! ($loop->last)): ?>
						        <hr/>
					        <?php endif; ?>
				    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				        <br/>
	            		<?php if(config('system_settings.address_show_map') && $customer->primaryAddress): ?>
					        <div class="row">
			                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo e(urlencode($customer->primaryAddress->toGeocodeString()), false); ?>&output=embed"></iframe>
					        </div>
					        <div class="help-block" style="margin-bottom: -10px;"><i class="fa fa-warning"></i> <?php echo e(trans('app.map_location'), false); ?></div>
				       	<?php endif; ?>
				    </div> <!-- /.tab-pane -->

					<?php if(Auth::user()->isFromPlatform()): ?>
				    <div class="tab-pane" id="latest_orders_tab">
				    	<?php if($customer->latest_orders->count()): ?>
							<table class="table table-hover table-2nd-sort">
								<thead>
									<tr>
										<th><?php echo e(trans('app.order_number'), false); ?></th>
										<th><?php echo e(trans('app.grand_total'), false); ?></th>
										<th><?php echo e(trans('app.payment'), false); ?></th>
										<th><?php echo e(trans('app.status'), false); ?></th>
										<th><?php echo e(trans('app.order_date'), false); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $customer->latest_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($order->order_number, false); ?></td>
											<td><?php echo e(get_formated_currency($order->grand_total), false); ?></td>
											<td><?php echo $order->paymentStatusName(); ?></td>
											<td><?php echo $order->orderStatus(); ?></td>
									        <td><?php echo e($order->created_at->toFormattedDateString(), false); ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
				       	<?php else: ?>
				       		<p><?php echo e(trans('messages.no_orders'), false); ?></p>
				       	<?php endif; ?>
				    </div> <!-- /.tab-pane -->
					<?php endif; ?>
				</div> <!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/customer/_show.blade.php ENDPATH**/ ?>