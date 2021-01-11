<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-truck"></i> <?php echo e(trans('app.shipping_zones'), false); ?></h3>
			<div class="box-tools pull-right">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\ShippingZone::class)): ?>
					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.shipping.shippingZone.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_shipping_zone'), false); ?></a>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<div class="row">
				<div class="spacer10"></div>
				<?php $__empty_1 = true; $__currentLoopData = $shipping_zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping_zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="col-xs-12">
						<span class="lead text-muted indent10"><i class="fa fa-<?php echo e($shipping_zone->rest_of_the_world ? 'globe' : 'map-marker', false); ?>"></i> <?php echo e($shipping_zone->name, false); ?></span>

						<?php if($shipping_zone->rest_of_the_world): ?>
							<span class="label label-outline indent10"><?php echo e(trans('app.rest_of_the_world'), false); ?></span>
						<?php endif; ?>

						<?php if (! ($shipping_zone->active)): ?>
							<span class="label label-default indent10"><?php echo e(trans('app.inactive'), false); ?></span>
						<?php endif; ?>

						<span class="indent50"><?php echo e($shipping_zone->tax->name, false); ?></span>

						<div class="pull-right">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\ShippingRate::class)): ?>
								<div class="btn-group">
								  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  	<i class="fa fa-plus-square-o"></i>
								    <?php echo e(trans('app.add_shipping_rate'), false); ?> <span class="caret"></span>
								  </button>
									  <ul class="dropdown-menu">
									    <li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.shipping.shippingRate.create', [$shipping_zone->id,'price']), false); ?>" class="ajax-modal-btn"><i class="fa fa-money"></i> <?php echo e(trans('app.add_price_based_rate'), false); ?></a></li>

										<li role="separator" class="divider"></li>

									    <li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.shipping.shippingRate.create', [$shipping_zone->id, 'weight']), false); ?>" class="ajax-modal-btn"><i class="fa fa-balance-scale"></i> <?php echo e(trans('app.add_weight_based_rate'), false); ?></a></li>
									  </ul>
								</div>
							<?php endif; ?>

						  	<?php if (! ($shipping_zone->rest_of_the_world)): ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\ShippingZone::class)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.shipping.shippingZone.edit', $shipping_zone->id), false); ?>"  class="ajax-modal-btn btn btn-default btn-flat">
										<i class="fa fa-plus-square-o"></i> <?php echo e(trans('app.add_shipping_country'), false); ?>

								  	</a>
								<?php endif; ?>
						  	<?php endif; ?>

							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $shipping_zone)): ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.shipping.shippingZone.edit', $shipping_zone->id), false); ?>"  class="ajax-modal-btn btn btn-default btn-flat"><i class="fa fa-edit"></i> <?php echo e(trans('app.edit'), false); ?></a>
							<?php endif; ?>

							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $shipping_zone)): ?>
								<?php echo Form::open(['route' => ['admin.shipping.shippingZone.destroy', $shipping_zone->id], 'method' => 'delete', 'class' => 'inline']); ?>

									<?php echo Form::button('<i class="fa fa-trash-o"></i> ' . trans('app.delete'), ['type' => 'submit', 'class' => 'confirm btn btn-danger btn-flat']); ?>

								<?php echo Form::close(); ?>

							<?php endif; ?>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="indent10"><?php echo e(trans('app.countries'), false); ?></label>
								</div>

								<ul class="list-group">
									<?php if($shipping_zone->rest_of_the_world): ?>
										<li class="list-group-item">
											<h4 class="list-group-item-heading inline">
												<?php echo e(trans('help.rest_of_the_world'), false); ?>

											</h4>
										</li>
									<?php else: ?>
										<?php if(!empty($shipping_zone->country_ids)): ?>
											<?php
												$countries = get_countries_in_shipping_zone($shipping_zone);
											?>

											<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li class="list-group-item <?php echo e($country->in_active_business_area ? "" : "disabled", false); ?>">

													<h4 class="list-group-item-heading inline">
														<?php echo get_formated_country_name($country->name, $country->iso_code); ?>

													</h4>

										          	<?php if (! ($country->in_active_business_area)): ?>
											          	<span class="indent10 label label-outline" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.not_in_business_area'), false); ?>"><?php echo e(trans('app.not_in_business_area'), false); ?></span>
											        <?php endif; ?>

													<?php echo Form::open(['route' => ['admin.shipping.shippingZone.removeCountry', $shipping_zone->id, $country->id], 'method' => 'delete', 'class' => 'data-form']); ?>

														<?php echo Form::button('<i class="fa fa-times-circle"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent small text-muted pull-right', 'title' => trans('app.remove'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

													<?php echo Form::close(); ?>


													<?php if($country->states_count): ?>
														<p class="list-group-item-text">
															<span class="indent40">
																<?php echo e(trans('app._of_states', ['states' => $shipping_zone->state_ids ? count( array_intersect($shipping_zone->state_ids, $country->states->pluck('id')->toArray())) : '0', 'allStates' => $country->states_count]), false); ?>

															</span>

												          	<?php if($country->in_active_business_area): ?>
																<small class="pull-right">
																	<a href="javascript:void(0)" data-link="<?php echo e(route('admin.shipping.shippingZone.editStates', [$shipping_zone->id, $country->id]), false); ?>"  class="ajax-modal-btn"><i  class="fa fa-edit"></i> <?php echo e(trans('app.edit'), false); ?></a>
																</small>
													        <?php endif; ?>
															</p>
													<?php endif; ?>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											<li class="list-group-item">
												<h4 class="list-group-item-heading inline">
													<?php echo e(trans('app.empty_shipping_country'), false); ?>

												</h4>
											</li>
										<?php endif; ?>
									<?php endif; ?>
								</ul>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label class="indent10"><?php echo e(trans('app.shipping_rates'), false); ?></label>
								</div>

								<ul class="list-group">
									<?php $__empty_2 = true; $__currentLoopData = $shipping_zone->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
									  <li class="list-group-item">
									    <h4 class="list-group-item-heading">
									    	<?php echo e($shipping->name, false); ?>


									    	<?php if($shipping->carrier): ?>
										    	<small class="indent20"> <?php echo e(trans('app.by') . ' ' . $shipping->carrier->name . ' ' . trans('app.and_takes', ['time' => $shipping->delivery_takes]), false); ?> </small>
									    	<?php endif; ?>

											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $shipping)): ?>
												<?php echo Form::open(['route' => ['admin.shipping.shippingRate.destroy', $shipping->id], 'method' => 'delete', 'class' => 'data-form']); ?>

													<?php echo Form::button('<i class="fa fa-times-circle"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent small text-muted pull-right', 'title' => trans('app.delete'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

												<?php echo Form::close(); ?>

											<?php endif; ?>
										</h4>

									    <p class="list-group-item-text">
									    	<?php echo e(get_formated_shipping_range_of($shipping), false); ?>

										  	<span class="badge indent20">
										  		<?php echo e($shipping->rate > 0 ? get_formated_currency($shipping->rate, true, 2) : trans('app.free'), false); ?>

										  	</span>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $shipping)): ?>
												<small class="pull-right">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.shipping.shippingRate.edit', $shipping->id), false); ?>"  class="ajax-modal-btn"><i  class="fa fa-edit"></i> <?php echo e(trans('app.edit'), false); ?></a>
												</small>
											<?php endif; ?>
									    </p>

									  </li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
									  <li class="list-group-item">
										<h4 class="list-group-item-heading"><?php echo e(trans('app.empty_shipping_rates'), false); ?></h4>
									  </li>
									<?php endif; ?>
								</ul>
							</div>
						</div>

						<?php if (! ($loop->last)): ?>
    						<hr class="style3"/>
					    <?php endif; ?>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<div class="col-sm-12">
						<div class="jumbotron text-center">
							<h3><?php echo e('Opps !', false); ?></h3>
							<p><?php echo e(trans('app.empty_shipping_zones'), false); ?></p>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/shipping_zone/index.blade.php ENDPATH**/ ?>