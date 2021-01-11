<?php $__env->startSection('page-style'); ?>
	<?php echo $__env->make('plugins.ionic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('admin.partials._subscription_notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right">
          <div class="info-box">
            <span class="info-box-icon bg-yellow">
				<i class="icon ion-md-cube"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo e(trans('app.unfulfilled_orders'), false); ?></span>
              <span class="info-box-number">
              	<?php echo e($unfulfilled_order_count, false); ?>

    			<a href="<?php echo e(url('admin/order/order?tab=unfulfilled'), false); ?>" class="pull-right small" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.detail'), false); ?>" >
    				<i class="icon ion-md-send"></i>
    			</a>
              </span>
              	<?php
              		$unfulfilled_percents = $todays_order_count == 0 ?
              				($unfulfilled_order_count * 100) : round(($unfulfilled_order_count / $todays_order_count) * 100);
              	?>
              	<div class="progress">
                	<div class="progress-bar progress-bar-warning" style="width: <?php echo e($unfulfilled_percents, false); ?>%"></div>
              	</div>
              	<span class="progress-description text-muted">
              		<?php echo e(trans('messages.unfulfilled_percents', ['percent' => $unfulfilled_percents]), false); ?>

                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right nopadding-left">
          <div class="info-box">
            <span class="info-box-icon bg-aqua">
				<i class="icon ion-md-cart"></i>
            </span>

            <div class="info-box-content">
	            <span class="info-box-text"><?php echo e(trans('app.last_sale'), false); ?></span>
              	<span class="info-box-number">
              		<?php echo e(get_formated_currency($last_sale ? $last_sale->total : 0), false); ?>

              		<?php if($last_sale): ?>
	  	    			<a href="<?php echo e(route('admin.order.order.show', $last_sale->id), false); ?>" class="pull-right small" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.detail'), false); ?>" >
    						<i class="icon ion-md-send"></i>
    					</a>
					<?php endif; ?>
				</span>
              	<div class="progress" style="background: transparent;"></div>
              	<span class="progress-description text-muted">
              		<?php if($last_sale): ?>
	                    <i class="icon ion-md-time"></i> <?php echo e($last_sale->created_at->diffForHumans(), false); ?>

					<?php else: ?>
						<i class="icon ion-md-hourglass"></i> <?php echo e(trans('messages.no_sale', ['date' => trans('app.yet')]), false); ?>

					<?php endif; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right nopadding-left">
          <div class="info-box">
            <span class="info-box-icon bg-green">
            	<i class="icon ion-md-wallet"></i>
            </span>

            <div class="info-box-content">
	            <span class="info-box-text"><?php echo e(trans('app.todays_sale'), false); ?></span>
              	<span class="info-box-number">
              		<?php echo e(get_formated_currency($todays_sale_amount), false); ?>

  	    			<a href="<?php echo e(route('admin.order.order.index'), false); ?>" class="pull-right small" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.detail'), false); ?>" >
    					<i class="icon ion-md-send"></i>
    				</a>
				</span>

              	<?php
              		$difference = $todays_sale_amount - $yesterdays_sale_amount;
              		$todays_sale_percents = $todays_sale_amount > 0 ? round(($difference / $todays_sale_amount) * 100) : 0;
              	?>
              	<div class="progress">
                	<div class="progress-bar progress-bar-success" style="width: <?php echo e($todays_sale_percents, false); ?>%"></div>
              	</div>
              	<span class="progress-description text-muted">
              		<?php if($todays_sale_amount == 0): ?>
	              		<i class="icon ion-md-hourglass"></i>
              			<?php echo e(trans('messages.no_sale', ['date' => trans('app.today')]), false); ?>

              		<?php else: ?>
	              		<i class="icon ion-md-arrow-<?php echo e($difference < 0 ? 'down' : 'up', false); ?>"></i>
	              		<?php echo e(trans('messages.todays_sale_percents', ['percent' => $todays_sale_percents, 'state' => $difference < 0 ? trans('app.down') : trans('app.up')]), false); ?>

              		<?php endif; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12 nopadding-left">
          <div class="info-box">
            <span class="info-box-icon bg-red">
            	<i class="icon ion-md-notifications-outline"></i>
            </span>

            <div class="info-box-content">
	            <span class="info-box-text"><?php echo e(trans('app.stock_outs'), false); ?></span>
              	<span class="info-box-number">
              		<?php echo e($stock_out_count, false); ?>

	    			<a href="<?php echo e(url('admin/stock/inventory?tab=out_of_stock'), false); ?>" class="pull-right small" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.detail'), false); ?>" >
	    				<i class="icon ion-md-send"></i>
	    			</a>
              	</span>

              	<?php
              		$stock_out_percents = $stock_count > 0 ?
              				round(($stock_out_count / $stock_count) * 100) :
              				($stock_out_count * 100);
              	?>
              	<div class="progress">
                	<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              	</div>
              	<span class="progress-description text-muted">
	          		<?php echo e(trans('messages.stock_out_percents', ['percent' => $stock_out_percents, 'total' => $stock_count]), false); ?>

                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div> <!-- /.row -->

    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
			<?php if($dispute_count > 0 || $refund_request_count > 0): ?>
			    <div class="row">
			        <div class="col-sm-6 col-xs-12 nopadding-right">
						<div class="info-box bg-yellow">
							<span class="info-box-icon"><i class="icon ion-md-megaphone"></i></span>

							<div class="info-box-content">
								<span class="info-box-text"><?php echo e(trans('app.disputes'), false); ?></span>
								<span class="info-box-number">
					              	<?php echo e($dispute_count, false); ?>

					    			<a href="<?php echo e(route('admin.support.dispute.index'), false); ?>" class="pull-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.take_action'), false); ?>" >
					    				<i class="icon ion-md-paper-plane"></i>
					    			</a>
								</span>

				              	<?php
				              		$last_months = $last_60days_dispute_count - $last_30days_dispute_count;
				              		$difference = $last_30days_dispute_count - $last_months;
				              		$last_30_days_percents = $last_months > 0 ? round(($difference / $last_months) * 100) : 100;
				              	?>
								<div class="progress">
									<div class="progress-bar" style="width: <?php echo e($last_30_days_percents, false); ?>%"></div>
								</div>
								<span class="progress-description">
				              		<i class="icon ion-md-arrow-<?php echo e($difference > 0 ? 'up' : 'down', false); ?>"></i>
				              		<?php echo e(trans('messages.last_30_days_percents', ['percent' => $last_30_days_percents, 'state' => $difference > 0 ? trans('app.increase') : trans('app.decrease')]), false); ?>

								</span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</div>

			        <div class="col-sm-6 col-xs-12 nopadding-left">
						<div class="info-box bg-aqua">
							<span class="info-box-icon"><i class="icon ion-md-nuclear"></i></span>

							<div class="info-box-content">
								<span class="info-box-text"><?php echo e(trans('app.refund_requests'), false); ?></span>
								<span class="info-box-number">
					              	<?php echo e($refund_request_count, false); ?>

					    			<a href="<?php echo e(route('admin.support.refund.index'), false); ?>" class="pull-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.take_action'), false); ?>" >
					    				<i class="icon ion-md-paper-plane"></i>
					    			</a>
								</span>

				              	<?php
				              		$last_months = $last_60days_refund_request_count - $last_30days_refund_request_count;
				              		$difference = $last_30days_refund_request_count - $last_months;
				              		$last_30_days_percents = $last_months > 0 ? round(($difference / $last_months) * 100) : 100;
				              	?>
								<div class="progress">
									<div class="progress-bar" style="width: <?php echo e($last_30_days_percents, false); ?>%"></div>
								</div>
								<span class="progress-description">
				              		<i class="icon ion-md-arrow-<?php echo e($difference > 0 ? 'up' : 'down', false); ?>"></i>
				              		<?php echo e(trans('messages.last_30_days_percents', ['percent' => $last_30_days_percents, 'state' => $difference > 0 ? trans('app.increase') : trans('app.decrease')]), false); ?>

								</span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</div>
				</div>
			<?php endif; ?>

         	<div class="box">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a href="#orders_tab" data-toggle="tab">
							<i class="fa fa-shopping-cart hidden-sm"></i>
							<?php echo e(trans('app.latest_orders'), false); ?>

						</a></li>
						<li><a href="#inventory_tab" data-toggle="tab">
							<i class="fa fa-cubes hidden-sm"></i>
							<?php echo e(trans('app.recently_added_products'), false); ?>

						</a></li>
						<li><a href="#low_stock_tab" data-toggle="tab">
							<i class="fa fa-cube hidden-sm"></i>
							<?php echo e(trans('app.low_stock_items'), false); ?>

						</a></li>
					</ul>
		            <!-- /.nav .nav-tabs -->

					<div class="tab-content">
					    <div class="tab-pane active" id="orders_tab">
				            <div class="box-body nopadding">
								<div class="table-responsive">
									<table class="table no-margin table-condensed">
										<thead>
											<tr>
												<th><?php echo e(trans('app.order_number'), false); ?></th>
												<th><?php echo e(trans('app.order_date'), false); ?></th>
												<th><?php echo e(trans('app.customer'), false); ?></th>
												<th><?php echo e(trans('app.grand_total'), false); ?></th>
												<th><?php echo e(trans('app.payment'), false); ?></th>
												<th><?php echo e(trans('app.status'), false); ?></th>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $latest_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
												<tr>
													<td>
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $order)): ?>
															<a href="<?php echo e(route('admin.order.order.show', $order->id), false); ?>">
																<?php echo e($order->order_number, false); ?>

															</a>
														<?php else: ?>
															<?php echo e($order->order_number, false); ?>

														<?php endif; ?>
														<?php if($order->disputed): ?>
															<span class="label label-danger indent5"><?php echo e(trans('app.statuses.disputed'), false); ?></span>
														<?php endif; ?>
													</td>
											        <td><?php echo e($order->created_at->diffForHumans(), false); ?></td>
													<td><?php echo e(optional($order->customer)->name, false); ?></td>
													<td><?php echo e(get_formated_currency($order->grand_total, 2), false); ?></td>
													<td><?php echo $order->paymentStatusName(); ?></td>
													<td><?php echo $order->orderStatus(); ?></td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
												<tr>
													<td colspan="6"><?php echo e(trans('app.no_data_found'), false); ?></td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
								<!-- /.table-responsive -->
				            </div>
				            <!-- /.box-body -->
				            <div class="box-footer clearfix">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Order::class)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.order.searchCutomer'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat pull-left">
										<i class="icon ion-md-cart"></i> <?php echo e(trans('app.add_order'), false); ?>

									</a>
								<?php endif; ?>
					            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Order::class)): ?>
									<a href="<?php echo e(route('admin.order.order.index'), false); ?>" class="btn btn-default btn-flat pull-right">
										<i class="icon ion-md-gift"></i> <?php echo e(trans('app.all_orders'), false); ?>

									</a>
								<?php endif; ?>
				            </div>
				            <!-- /.box-footer -->
						</div>
			            <!-- /.tab-pane -->

					    <div class="tab-pane" id="inventory_tab">
				            <div class="box-body nopadding">
								<div class="table-responsive">
									<table class="table no-margin table-condensed">
										<thead>
											<tr>
												<th><?php echo e(trans('app.image'), false); ?></th>
												<th><?php echo e(trans('app.sku'), false); ?></th>
												<th><?php echo e(trans('app.name'), false); ?></th>
												<th><?php echo e(trans('app.price'), false); ?> <small>( <?php echo e(trans('app.excl_tax'), false); ?> )</small> </th>
												<th><?php echo e(trans('app.quantity'), false); ?></th>
												<th><?php echo e(trans('app.status'), false); ?></th>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $latest_stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
												<tr>
													<td>
														<img src="<?php echo e(get_storage_file_url(optional($inventory->image)->path, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
													</td>
													<td><?php echo e($inventory->sku, false); ?></td>
													<td><?php echo e(optional($inventory->product)->name, false); ?></td>
													<td>
														<?php if(($inventory->offer_price > 0) && ($inventory->offer_end > \Carbon\Carbon::now())): ?>
															<?php $offer_price_help =
																	trans('help.offer_starting_time') . ': ' .
																	$inventory->offer_start->diffForHumans() . ' and ' .
																	trans('help.offer_ending_time') . ': ' .
																	$inventory->offer_end->diffForHumans(); ?>

															<small class="text-muted"><?php echo e($inventory->sale_price, false); ?></small><br/>
															<?php echo e(get_formated_currency($inventory->offer_price, 2), false); ?>


															<small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e($offer_price_help, false); ?>"><sup><i class="fa fa-question"></i></sup></small>
														<?php else: ?>
															<?php echo e(get_formated_currency($inventory->sale_price, 2), false); ?>

														<?php endif; ?>
													</td>
													<td><?php echo e(($inventory->stock_quantity > 0) ? $inventory->stock_quantity : trans('app.out_of_stock'), false); ?></td>
													<td><?php echo e(($inventory->active) ? trans('app.active') : trans('app.inactive'), false); ?></td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
												<tr>
													<td colspan="6"><?php echo e(trans('app.no_data_found'), false); ?></td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div><!-- /.table-responsive -->
				            </div><!-- /.box-body -->
				            <div class="box-footer clearfix">
					            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Inventory::class)): ?>
									<a href="<?php echo e(route('admin.stock.inventory.index'), false); ?>" class="btn btn-default btn-flat pull-right">
										<i class="icon ion-md-cube"></i> <?php echo e(trans('app.inventories'), false); ?>

									</a>
								<?php endif; ?>
				            </div><!-- /.box-footer -->
						</div><!-- /.tab-pane -->

					    <div class="tab-pane" id="low_stock_tab">
				            <div class="box-body nopadding">
								<div class="table-responsive">
									<table class="table no-margin table-condensed">
										<thead>
											<tr>
												<th><?php echo e(trans('app.image'), false); ?></th>
												<th><?php echo e(trans('app.sku'), false); ?></th>
												<th><?php echo e(trans('app.name'), false); ?></th>
												<th><?php echo e(trans('app.quantity'), false); ?></th>
												<th><?php echo e(trans('app.status'), false); ?></th>
												<th width="20px">&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $low_qtt_stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
												<tr>
													<td>
														<img src="<?php echo e(get_storage_file_url(optional($inventory->image)->path, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
													</td>
													<td><?php echo e($inventory->sku, false); ?></td>
													<td><?php echo e(optional($inventory->product)->name, false); ?></td>
													<td class="qtt-<?php echo e($inventory->id, false); ?>"><?php echo e(($inventory->stock_quantity > 0) ? $inventory->stock_quantity : trans('app.out_of_stock'), false); ?></td>
													<td><?php echo e($inventory->active ? trans('app.active') : trans('app.inactive'), false); ?></td>
													<td class="row-options">
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $inventory)): ?>
															<a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.editQtt', $inventory->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.update'), false); ?>" class="icon ion-md-add-circle"></i></a>
														<?php endif; ?>
													</td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
												<tr>
													<td colspan="6"><?php echo e(trans('app.no_data_found'), false); ?></td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div> <!-- /.table-responsive -->
				            </div> <!-- /.box-body -->
				            <div class="box-footer clearfix">
					            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Inventory::class)): ?>
									<a href="<?php echo e(route('admin.stock.inventory.index'), false); ?>" class="btn btn-default btn-flat pull-right">
										<i class="icon ion-md-cube"></i> <?php echo e(trans('app.inventories'), false); ?>

									</a>
								<?php endif; ?>
				            </div> <!-- /.box-footer -->
						</div> <!-- /.tab-pane -->
					</div> <!-- /.tab-content -->
				</div> <!-- /.nav-tabs-custom -->
          	</div> <!-- /.box -->

          	
	    	<?php echo $__env->make('admin.partials._activity_logs', ['logger' => Auth::user()->shop], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	    </div> <!-- /.col-*-* -->

        <div class="col-md-4 col-sm-5 col-xs-12 nopadding-left">
        	<?php if($current_plan->team_size && (bool) config('dashboard.upgrade_plan_notice')): ?>
	          	<?php
	          		$staff_count_percentage = round(($user_count / $current_plan->team_size ) * 100);
	          		$stock_used_percentage = round(($stock_count / $current_plan->inventory_limit ) * 100);
	          	?>

	        	<?php if($staff_count_percentage > 90 || $stock_used_percentage > 75): ?>
	          		<div class="box box-solid removable">
						<div class="box-header">
							<h3 class="box-title text-warning"><i class="icon ion-md-pulse"></i> <?php echo e(trans('app.resource_uses'), false); ?></h3>
							<div class="box-tools pull-right">
			                	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>

			            <div class="box-body">
			              	<span class="progress-description">
	            				<i class="icon ion-md-contacts"></i> <?php echo e(trans('app.staff'), false); ?>

			                </span>

			              	<?php
			              		switch ($staff_count_percentage) {
			              			case $staff_count_percentage > 90: $state = 'red'; break;
			              			case $staff_count_percentage > 75: $state = 'warning'; break;
			              			case $staff_count_percentage > 60: $state = 'info'; break;
			              			default: $state = 'primary'; break;
			              		}
			              	?>

							<div class="progress active">
				                <div class="progress-bar progress-bar-<?php echo e($state, false); ?> progress-bar-striped" role="progressbar" aria-valuenow="<?php echo e($staff_count_percentage, false); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($staff_count_percentage, false); ?>%">
				                  <span class="show <?php echo e($staff_count_percentage < 50 ? 'text-muted' : '', false); ?>"><?php echo e(trans('messages.resource_uses_out_of', ['used' => $user_count, 'limit' => $current_plan->team_size]), false); ?></span>
				                </div>
				            </div>

			              	<span class="progress-description">
	            				<i class="icon ion-md-cube"></i> <?php echo e(trans('app.stock'), false); ?>

			                </span>

			              	<?php
			              		switch ($stock_used_percentage) {
			              			case $stock_used_percentage > 90: $state = 'red'; break;
			              			case $stock_used_percentage > 75: $state = 'warning'; break;
			              			case $stock_used_percentage > 60: $state = 'info'; break;
			              			default: $state = 'primary'; break;
			              		}
			              	?>

							<div class="progress active">
				                <div class="progress-bar progress-bar-<?php echo e($state, false); ?> progress-bar-striped" role="progressbar" aria-valuenow="<?php echo e($stock_used_percentage, false); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($stock_used_percentage, false); ?>%">
				                  <span class="show <?php echo e($stock_used_percentage < 50 ? 'text-muted' : '', false); ?>"><?php echo e(trans('messages.resource_uses_out_of', ['used' => $stock_count, 'limit' => $current_plan->inventory_limit]), false); ?></span>
				                </div>
				            </div>

							<div class="callout callout-info" style="margin-bottom: 0!important;">
				            	<i class="fa fa-support"></i> <?php echo e(trans('messages.time_to_upgrade_plan'), false); ?>

						    </div>
			        	</div>
						<div class="box-footer">
	                		<a href="<?php echo e(route('admin.account.billing'), false); ?>" type="button" class="btn btn-flat btn-default">
		                		<i class="fa fa-leaf"></i> <?php echo e(trans('app.choose_plan'), false); ?>

		                	</a>

							<div class="box-tools pull-right">
		                		<a href="javascript:void(0)" data-link="<?php echo e(route('admin.dashboard.config.toggle', 'upgrade_plan_notice'), false); ?>" type="button" class="btn btn-box-tool toggle-widget toggle-confirm">
			                		<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.never_show_this'), false); ?>"></i>
			                	</a>
							</div>
						</div>
			        </div>
	        	<?php endif; ?>
        	<?php endif; ?>

          	<div class="box box-solid">
	            <div class="box-header with-border">
	              	<h3 class="box-title text-warning">
	              		<i class="icon ion-md-clock"></i> <?php echo e(trans('app.latest_days', ['days' => config('charts.latest_sales.days', 15)]), false); ?>

	              	</h3>
	              	<div class="box-tools pull-right">
	                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              	</div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	            	<p class="text-muted"><span class="lead"> <?php echo e(trans('app.total'), false); ?>: <?php echo e(get_formated_currency($latest_sale_total, 2), false); ?> </span><span class="pull-right"><?php echo e($latest_order_count . ' ' . trans('app.orders'), false); ?></span></p>
	        		<div><?php echo $chart->container(); ?></div>

        			<table class="table table-default">
        				<thead>
        					<tr>
        						<td><span class="info-box-text"><?php echo e(trans('app.breakdown'), false); ?>:</span></td>
        						<td>&nbsp;</td>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td><?php echo e(trans('app.orders'), false); ?></td>
        						<td class="pull-right"><?php echo e(get_formated_currency($latest_sale_total, 2), false); ?></td>
        					</tr>
        					<tr>
        						<td><?php echo e(trans('app.refunds'), false); ?></td>
        						<td class="pull-right">-<?php echo e(get_formated_currency($latest_refund_total, 2), false); ?></td>
        					</tr>
        					<tr>
        						<td><?php echo e(trans('app.total'), false); ?></td>
        						<td class="pull-right"><?php echo e(get_formated_currency($latest_sale_total - $latest_refund_total, 2), false); ?></td>
        					</tr>
        				</tbody>
        			</table>
	            </div>
	            <!-- /.box-body -->
          	</div> <!-- /.box -->

	        <!-- PRODUCT LIST -->
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              	<h3 class="box-title"><i class="icon ion-md-rocket"></i> <?php echo e(trans('app.top_selling_items'), false); ?></h3>
	              	<div class="box-tools pull-right">
	                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              	</div>
	            </div><!-- /.box-header -->
	            <div class="box-body">
	                <div class="table-responsive">
	                  	<table class="table no-margin table-condensed">
	                      	<thead>
	                        	<tr class="text-muted">
	                          		<th width="60px">&nbsp;</th>
	                          		<th><?php echo e(trans('app.inventory'), false); ?></th>
	                          		<th width="8%"><?php echo e(trans('app.sold'), false); ?></th>
	                        	</tr>
	                      	</thead>
	                      	<tbody>
				                <?php $__currentLoopData = $top_listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>
											<img src="<?php echo e(get_storage_file_url(optional($inventory->image)->path, 'small'), false); ?>" class="img-md" alt="<?php echo e(trans('app.image'), false); ?>">
										</td>
										<td>
				                            <h5 class="nopadding">
				                            	<small><?php echo e(trans('app.sku') . ': ', false); ?></small>
				                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $inventory)): ?>
				                                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.show', $inventory->id), false); ?>" class="ajax-modal-btn modal-btn"><?php echo e($inventory->sku, false); ?></a>
				                                <?php else: ?>
				                                  <?php echo e($inventory->sku, false); ?>

				                                <?php endif; ?>
				                            </h5>

				                        	<span class="text-muted">
				                          		<?php echo e($inventory->name, false); ?>

												<?php if($inventory->attributeValues->count()): ?>
					                          		<small>(<?php echo e(implode(' | ', array_column($inventory->attributeValues->toArray(), 'value') ), false); ?>)</small>
				                                <?php endif; ?>
				                        	</span>
										</td>
										<td><?php echo e(trans('app.sold_units', ['units' => $inventory->sold_qtt]), false); ?></td>
									</tr>
				                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                      	</tbody>
	                  	</table>
	              	</div>
	            </div><!-- /.box-body -->
	            <div class="box-footer text-center">
					<a href="<?php echo e(route('admin.stock.inventory.index'), false); ?>" class="btn btn-default btn-flat pull-right">
						<i class="icon ion-md-cube"></i> <?php echo e(trans('app.inventories'), false); ?>

					</a>
	            </div><!-- /.box-footer -->
	        </div><!-- /.box -->

	    </div><!-- /.col-*-* -->
    </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
	<?php echo $__env->make('plugins.chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $chart->script(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/dashboard/merchant.blade.php ENDPATH**/ ?>