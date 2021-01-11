<?php
	$can_update = Gate::allows('update', $system) ?: Null;
?>

<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="#basic_settings_tab" data-toggle="tab">
					<i class="fa fa-cubes hidden-sm"></i>
					<?php echo e(trans('app.basic_settings'), false); ?>

				</a></li>
				<li><a href="#formats_tab" data-toggle="tab">
					<i class="fa fa-cog hidden-sm"></i>
					<?php echo e(trans('app.config_formats'), false); ?>

				</a></li>
				<li><a href="#payment_method_tab" data-toggle="tab">
					<i class="fa fa-credit-card hidden-sm"></i>
					<?php echo e(trans('app.payment_methods'), false); ?>

				</a></li>
				<li><a href="#support_tab" data-toggle="tab">
					<i class="fa fa-phone hidden-sm"></i>
					<?php echo e(trans('app.support'), false); ?>

				</a></li>
				<li><a href="#reports_tab" data-toggle="tab">
					<i class="fa fa-line-chart hidden-sm"></i>
					<?php echo e(trans('app.reports'), false); ?>

				</a></li>
				<li><a href="#notifications_tab" data-toggle="tab">
					<i class="fa fa-bell-o hidden-sm"></i>
					<?php echo e(trans('app.notifications'), false); ?>

				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane active" id="basic_settings_tab">
			    	<div class="row">
				        <?php echo Form::model($system, ['method' => 'PUT', 'route' => ['admin.setting.system.update'], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']); ?>

					    	<div class="col-sm-6">
					            <?php if(is_subscription_enabled()): ?>
						    		<fieldset>
						    			<legend><?php echo e(trans('app.config_subscription_section'), false); ?></legend>

										<div class="form-group">
									        <?php echo Form::label('trial_days', trans('app.config_trial_days'). ':', ['class' => 'with-help col-sm-6 control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_trial_days'), false); ?>"></i>
										  	<div class="col-sm-5 nopadding-left">
										  		<?php if($can_update): ?>
												    <div class="input-group">
											    	    <?php echo Form::number('trial_days', $system->trial_days, ['class' => 'form-control', 'max' => '730', 'placeholder' => trans('app.placeholder.trial_days')]); ?>

												        <span class="input-group-addon"><?php echo e(trans('app.form.days'), false); ?></span>
												    </div>
											      	<div class="help-block with-errors"></div>
												<?php else: ?>
													<span><?php echo e($system->trial_days, false); ?></span>
												<?php endif; ?>
										  	</div>
										</div>

								    	<div class="row">
									    	<div class="col-sm-7 text-right">
												<div class="form-group">
											        <?php echo Form::label('required_card_upfront', trans('app.required_card_upfront'). ':', ['class' => 'with-help control-label']); ?>

												  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.required_card_upfront'), false); ?>"></i>
												</div>
											</div>
									    	<div class="col-sm-4">
										  		<?php if($can_update): ?>
												  	<div class="handle horizontal text-center">
														<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'required_card_upfront'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->required_card_upfront ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->required_card_upfront ? 'true' : 'false', false); ?>" autocomplete="off">
															<div class="btn-handle"></div>
														</a>
												  	</div>
												<?php else: ?>
													<span><?php echo e($system->required_card_upfront ? trans('app.on') : trans('app.off'), false); ?></span>
												<?php endif; ?>
											</div>
									  	</div> <!-- /.row -->

								    	<div class="row">
									    	<div class="col-sm-7 text-right">
												<div class="form-group">
											        <?php echo Form::label('vendor_needs_approval', trans('app.vendor_needs_approval'). ':', ['class' => 'with-help control-label']); ?>

												  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.vendor_needs_approval'), false); ?>"></i>
												</div>
											</div>
									    	<div class="col-sm-4">
										  		<?php if($can_update): ?>
												  	<div class="handle horizontal text-center">
														<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'vendor_needs_approval'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->vendor_needs_approval ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->vendor_needs_approval ? 'true' : 'false', false); ?>" autocomplete="off">
															<div class="btn-handle"></div>
														</a>
												  	</div>
												<?php else: ?>
													<span><?php echo e($system->vendor_needs_approval ? trans('app.on') : trans('app.off'), false); ?></span>
												<?php endif; ?>
											</div>
									  	</div> <!-- /.row -->
									</fieldset>
								<?php endif; ?>

					    		<fieldset>
					    			<legend><?php echo e(trans('app.units'), false); ?></legend>
									<div class="form-group">
								        <?php echo Form::label('weight_unit', '*' . trans('app.weight_unit'). ':', ['class' => 'with-help col-sm-5 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_weight_unit'), false); ?>"></i>
									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <?php echo Form::select('weight_unit', ['g' => 'Gram(g)', 'kg' => 'Kilogram(kg)', 'lb' => 'Pound(lb)', 'oz' => 'Ounce(oz)'], $system->weight_unit, ['class' => 'form-control select2-normal', 'required']); ?>

										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->weight_unit, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

									<div class="form-group">
								        <?php echo Form::label('length_unit', '*' . trans('app.length_unit'). ':', ['class' => 'with-help col-sm-5 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_length_unit'), false); ?>"></i>
									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <?php echo Form::select('length_unit', ['meter' => 'Meter(M)', 'cm' => 'Centemeter(cm)', 'in' => 'Inch(in)'], $system->length_unit, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->length_unit, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

									<div class="form-group">
								        <?php echo Form::label('valume_unit', '*' . trans('app.valume_unit'). ':', ['class' => 'with-help col-sm-5 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_valume_unit'), false); ?>"></i>
									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <?php echo Form::select('valume_unit', ['liter' => 'Liter(L)', 'gal' => 'gallon(gal)'], $system->valume_unit, ['class' => 'form-control select2-normal', 'required']); ?>

										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->valume_unit, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
					    		</fieldset>

					    		<fieldset>
					    			<legend><?php echo e(trans('app.config_customer_section'), false); ?></legend>

									<div class="form-group">
								        <?php echo Form::label('can_cancel_order_within', trans('app.can_cancel_order_within'). ':', ['class' => 'with-help col-sm-6 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_can_cancel_order_within'), false); ?>"></i>
									  	<div class="col-sm-5 nopadding-left">
									  		<?php if($can_update): ?>
											    <div class="input-group">
										    	    <?php echo Form::number('can_cancel_order_within', $system->can_cancel_order_within, ['class' => 'form-control', 'placeholder' => trans_choice('app.minutes', 30)]); ?>

											        <span class="input-group-addon"><?php echo e(trans_choice('app.minutes', 30), false); ?></span>
											    </div>
										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->can_cancel_order_within, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('ask_customer_for_email_subscription', trans('app.ask_customer_for_email_subscription'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.ask_customer_for_email_subscription'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'ask_customer_for_email_subscription'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->ask_customer_for_email_subscription ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->ask_customer_for_email_subscription ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->ask_customer_for_email_subscription ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div><!-- /.row -->

							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('allow_guest_checkout', trans('app.allow_guest_checkout'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.allow_guest_checkout'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'allow_guest_checkout'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->allow_guest_checkout ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->allow_guest_checkout ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->allow_guest_checkout ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div><!-- /.row -->

							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('vendor_can_view_customer_info', trans('app.vendor_can_view_customer_info'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.vendor_can_view_customer_info'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'vendor_can_view_customer_info'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->vendor_can_view_customer_info ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->vendor_can_view_customer_info ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->vendor_can_view_customer_info ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div> <!-- /.row -->
								</fieldset>

					    		<fieldset>
					    			<legend><?php echo e(trans('app.others'), false); ?></legend>

							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('enable_chat', trans('app.enable_live_chat'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.enable_live_chat_on_platform'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'enable_chat'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->enable_chat ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->enable_chat ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->vendor_can_view_customer_info ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div> <!-- /.row -->
								</fieldset>
					    	</div>

					    	<div class="col-sm-6">
					    		<fieldset>
					    			<legend><i class="fa fa-cubes hidden-sm"></i> <?php echo e(trans('app.inventory'), false); ?></legend>
							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('can_use_own_catalog_only', trans('app.can_use_own_catalog_only'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_can_use_own_catalog_only'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'can_use_own_catalog_only'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->can_use_own_catalog_only ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->can_use_own_catalog_only ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->can_use_own_catalog_only ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div> <!-- /.row -->

									<div class="form-group">
								        <?php echo Form::label('max_img_size_limit_kb', trans('app.max_img_size_limit_kb'). ':', ['class' => 'with-help col-sm-6 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_max_img_size_limit_kb'), false); ?>"></i>
									  	<div class="col-sm-5 nopadding-left">
									  		<?php if($can_update): ?>
									    	    <?php echo Form::number('max_img_size_limit_kb', $system->max_img_size_limit_kb, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.max_img_size_limit_kb')]); ?>

										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->max_img_size_limit_kb, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

									<div class="form-group">
								        <?php echo Form::label('max_number_of_inventory_imgs', trans('app.max_number_of_inventory_imgs'). ':', ['class' => 'with-help col-sm-6 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_max_number_of_inventory_imgs'), false); ?>"></i>
									  	<div class="col-sm-5 nopadding-left">
									  		<?php if($can_update): ?>
									    	    <?php echo Form::number('max_number_of_inventory_imgs', $system->max_number_of_inventory_imgs, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.max_number_of_inventory_imgs')]); ?>

										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->max_number_of_inventory_imgs, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
					    		</fieldset>

					    		<fieldset>
					    			<legend><i class="fa fa-laptop hidden-sm"></i> <?php echo e(trans('app.views'), false); ?></legend>
									<div class="form-group">
								        <?php echo Form::label('pagination', trans('app.pagination'). ':', ['class' => 'with-help col-sm-6 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_pagination'), false); ?>"></i>
									  	<div class="col-sm-5 nopadding-left">
									  		<?php if($can_update): ?>
									    	    <?php echo Form::number('pagination', $system->pagination, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.pagination')]); ?>

										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->pagination, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('show_seo_info_to_frontend', trans('app.show_seo_info_to_frontend'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_show_seo_info_to_frontend'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'show_seo_info_to_frontend'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->show_seo_info_to_frontend ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->show_seo_info_to_frontend ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->show_seo_info_to_frontend ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div> <!-- /.row -->
								</fieldset>

					    		<fieldset>
					    			<legend><?php echo e(trans('app.address'), false); ?></legend>
									<div class="form-group">
								        <?php echo Form::label('address_default_country', trans('app.config_address_default_country'). ':', ['class' => 'with-help col-sm-5 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_address_default_country'), false); ?>"></i>
									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
										    	<?php echo Form::select('address_default_country', $countries , $system->address_default_country, ['id' => 'country_id', 'class' => 'form-control select2', 'placeholder' => trans('app.placeholder.country')]); ?>

											<?php else: ?>
												<span><?php echo e(get_value_from($system->address_default_country, 'countries', 'name'), false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

									<div class="form-group">
								        <?php echo Form::label('address_default_state', trans('app.config_address_default_state'). ':', ['class' => 'with-help col-sm-5 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_address_default_state'), false); ?>"></i>
									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
										    	<?php echo Form::select('address_default_state', $states , $system->address_default_state, ['id' => 'state_id', 'class' => 'form-control select2-tag', 'placeholder' => trans('app.placeholder.state')]); ?>

											<?php else: ?>
												<span><?php echo e(get_value_from($system->address_default_state, 'states', 'name'), false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('show_address_title', trans('app.show_address_title'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_show_address_title'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'show_address_title'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->show_address_title ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->show_address_title ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->show_address_title ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div> <!-- /.row -->

							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('address_show_country', trans('app.address_show_country'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_address_show_country'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'address_show_country'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->address_show_country ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->address_show_country ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->address_show_country ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div>
								    <!-- /.row -->
							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('address_show_map', trans('app.address_show_map'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_address_show_map'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'address_show_map'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->address_show_map ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->address_show_map ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->address_show_map ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div>
								    <!-- /.row -->
					    		</fieldset>
					    	</div>

					  		<?php if($can_update): ?>
								<div class="col-sm-12">
									<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
						            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new col-sm-offset-2']); ?>

						        </div>
					  		<?php endif; ?>
				        <?php echo Form::close(); ?>

			    	</div>
			    </div>
			  	<!-- /.tab-pane -->

			    <div class="tab-pane" id="formats_tab">
			    	<div class="row">
				        <?php echo Form::model($system, ['method' => 'PUT', 'route' => ['admin.setting.system.update'], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']); ?>

					    	<div class="col-sm-6">
					    		

					    		<fieldset>
					    			<legend><?php echo e(trans('app.config_currency'), false); ?></legend>
									<div class="form-group">
								        <?php echo Form::label('decimals', '*' . trans('app.decimals'). ':', ['class' => 'with-help col-sm-7 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_decimals'), false); ?>"></i>
									  	<div class="col-sm-4 nopadding-left">
									  		<?php if($can_update): ?>
											    <?php echo Form::select('decimals', ['0' => '0', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], $system->decimals, ['class' => 'form-control select2-normal', 'required']); ?>

										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->decimals, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('show_currency_symbol', trans('app.show_currency_symbol'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_show_currency_symbol'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'show_currency_symbol'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->show_currency_symbol ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->show_currency_symbol ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->show_currency_symbol ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div>
								    <!-- /.row -->
							    	<div class="row">
								    	<div class="col-sm-7 text-right">
											<div class="form-group">
										        <?php echo Form::label('show_space_after_symbol', trans('app.show_space_after_symbol'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_show_space_after_symbol'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal text-center">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'show_space_after_symbol'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->show_space_after_symbol ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->show_space_after_symbol ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($system->show_space_after_symbol ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div>
								    <!-- /.row -->
								</fieldset>
					    	</div>

					    	<div class="col-sm-6">
					    		<fieldset>
					    			<legend><?php echo e(trans('app.config_promotions'), false); ?></legend>
									<div class="form-group">
								        <?php echo Form::label('coupon_code_size', '*' . trans('app.coupon_code_size'). ':', ['class' => 'with-help col-sm-7 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_coupon_code_size'), false); ?>"></i>
									  	<div class="col-sm-4 nopadding-left">
									  		<?php if($can_update): ?>
									    	    <?php echo Form::number('coupon_code_size', $system->coupon_code_size, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.coupon_code_size'), 'required']); ?>

										      	<div class="help-block with-errors"></div>
											<?php else: ?>
												<span><?php echo e($system->coupon_code_size, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>

									
								</fieldset>
					    	</div>
					    	<div class="col-sm-12">
						  		<?php if($can_update): ?>
									<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
									<div class="col-md-offset-3">
							            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']); ?>

							        </div>
						  		<?php endif; ?>
							</div>
				        <?php echo Form::close(); ?>

			    	</div>
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="payment_method_tab">
			    	<div class="jumbotron" style="padding: 20px; margin-bottom: 10px;">
			    		<p class="text-center"><?php echo e(trans('help.config_enable_payment_method'), false); ?></p>
			    	</div>
	    			<?php $__currentLoopData = $payment_method_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_id => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    				<?php
	    					$payment_providers = $payment_methods->where('type', $type_id);
	    					$logo_path = sys_image_path('payment-method-types') . "{$type_id}.svg";
	    				?>
				    	<div class="row">
							<span class="spacer10"></span>
					    	<div class="col-sm-6">
					    		<?php if(File::exists($logo_path)): ?>
									<img src="<?php echo e(asset($logo_path), false); ?>" width="100" height="25" alt="<?php echo e($type, false); ?>">
									<span class="spacer10"></span>
								<?php else: ?>
						    		<p class="lead"><?php echo e($type, false); ?></p>
								<?php endif; ?>
					    		<p><?php echo get_payment_method_type($type_id)['admin_description']; ?></p>
					    	</div>
					    	<div class="col-sm-6">
				    			<?php $__currentLoopData = $payment_providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    				<?php
				    					$logo_path = sys_image_path('payment-methods') ."{$payment_provider->code}.png";
				    				?>
									<ul class="list-group">
										<li class="list-group-item">
								    		<?php if(File::exists($logo_path)): ?>
												<img src="<?php echo e(asset($logo_path), false); ?>" class="open-img-md" alt="<?php echo e($type, false); ?>">
											<?php else: ?>
												<p class="list-group-item-heading inline lead">
													<?php echo e($payment_provider->name, false); ?>

												</p>
											<?php endif; ?>

										  	<div class="handle inline pull-right no-margin">
												<span class="spacer10"></span>
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.paymentMethod.toggle', $payment_provider->id), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($payment_provider->enabled == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($payment_provider->enabled == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>

											<span class="spacer10"></span>

											<p class="list-group-item-text">
												<?php echo $payment_provider->admin_description; ?>

											</p>
								    		<?php if($payment_provider->code == 'authorize-net' ||
								    		    $payment_provider->code == 'instamojo' ||
								    		    $payment_provider->code == 'cybersource' ||
								    		    $payment_provider->code == 'paystack' ||
								    			$type_id == \App\PaymentMethod::TYPE_PAYPAL ||
								    			$type_id == \App\PaymentMethod::TYPE_MANUAL
								    		): ?>
								    			<div class="spacer20"></div>
									          	<div class="alert alert-info small">
									            	<strong class="text-uppercase">
									            		<i class="fa fa-info-circle"></i> <?php echo e(trans('app.important'), false); ?> :
										            </strong>
										            <span><?php echo trans('messages.cant_charge_application_fee'); ?></span>
										        </div>
											<?php endif; ?>

											<span class="spacer15"></span>

											<?php if($payment_provider->admin_help_doc_link): ?>
												<a href="<?php echo e($payment_provider->admin_help_doc_link, false); ?>" class="btn btn-default" target="_blank"> <?php echo e(trans('app.documentation'), false); ?></a>
												<span class="spacer15"></span>
											<?php endif; ?>
										</li>
						    		</ul>
				    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    	</div>
					    </div>

					    <?php if (! ($loop->last)): ?>
						    <hr>
					    <?php endif; ?>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="support_tab">
			        <?php echo Form::model($system, ['method' => 'PUT', 'route' => ['admin.setting.system.update'], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']); ?>

				    	<div class="row">
					    	<div class="col-sm-12">
								<div class="form-group">
							        <?php echo Form::label('support_phone', trans('app.support_phone'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.support_phone'), false); ?>"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		<?php if($can_update): ?>
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
									    	    <?php echo Form::number('support_phone', $system->support_phone, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_phone')]); ?>

									    	</div>
										<?php else: ?>
											<span><?php echo e($system->support_phone, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('support_phone_toll_free', trans('app.support_phone_toll_free'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.support_phone_toll_free'), false); ?>"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		<?php if($can_update): ?>
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
									    	    <?php echo Form::number('support_phone_toll_free', $system->support_phone_toll_free, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_phone_toll_free')]); ?>

									    	</div>
										<?php else: ?>
											<span><?php echo e($system->support_phone_toll_free, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('support_email', '*' . trans('app.support_email'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.support_email'), false); ?>"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		<?php if($can_update): ?>
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
												<?php echo Form::email('support_email', $system->support_email, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_email'), 'required']); ?>

									    	</div>
									      	<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->support_email, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('default_sender_email_address', '*' . trans('app.default_sender_email_address'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.default_sender_email_address'), false); ?>"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		<?php if($can_update): ?>
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-at"></i></span>
												<?php echo Form::email('default_sender_email_address', $system->default_sender_email_address, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.default_sender_email_address'), 'required']); ?>

									    	</div>
									      	<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->default_sender_email_address, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('default_email_sender_name', '*' . trans('app.default_email_sender_name'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.default_email_sender_name'), false); ?>"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		<?php if($can_update): ?>
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-user"></i></span>
												<?php echo Form::text('default_email_sender_name', $system->default_email_sender_name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.default_email_sender_name'), 'required']); ?>

									    	</div>
									      	<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->default_email_sender_name, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>
							</div>
						</div>

				    	<div class="row">
				    		<fieldset>
								<div class="col-sm-12">
					    			<legend class="col-sm-9"><?php echo e(trans('app.social_links'), false); ?></legend>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
								        <?php echo Form::label('google_plus_link', trans('app.google_plus_link'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <div class="input-group">
											        <span class="input-group-addon"><i class="fa fa-google-plus-official"></i></span>
													<?php echo Form::text('google_plus_link', $system->google_plus_link, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.google_plus_link')]); ?>

										    	</div>
											<?php else: ?>
												<span><?php echo e($system->google_plus_link, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
									<div class="form-group">
								        <?php echo Form::label('facebook_link', trans('app.facebook_link'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <div class="input-group">
											        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
													<?php echo Form::text('facebook_link', $system->facebook_link, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.facebook_link')]); ?>

										    	</div>
											<?php else: ?>
												<span><?php echo e($system->facebook_link, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
   									<div class="form-group">
								        <?php echo Form::label('twitter_link', trans('app.twitter_link'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <div class="input-group">
											        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
													<?php echo Form::text('twitter_link', $system->twitter_link, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.twitter_link')]); ?>

										    	</div>
											<?php else: ?>
												<span><?php echo e($system->twitter_link, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
									<div class="form-group">
								        <?php echo Form::label('pinterest_link', trans('app.pinterest_link'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <div class="input-group">
											        <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
													<?php echo Form::text('pinterest_link', $system->pinterest_link, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.pinterest_link')]); ?>

										    	</div>
											<?php else: ?>
												<span><?php echo e($system->pinterest_link, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
									<div class="form-group">
								        <?php echo Form::label('instagram_link', trans('app.instagram_link'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <div class="input-group">
											        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
													<?php echo Form::text('instagram_link', $system->instagram_link, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.instagram_link')]); ?>

										    	</div>
											<?php else: ?>
												<span><?php echo e($system->instagram_link, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
									<div class="form-group">
								        <?php echo Form::label('youtube_link', trans('app.youtube_link'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

									  	<div class="col-sm-6 nopadding-left">
									  		<?php if($can_update): ?>
											    <div class="input-group">
											        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
													<?php echo Form::text('youtube_link', $system->youtube_link, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.youtube_link')]); ?>

										    	</div>
											<?php else: ?>
												<span><?php echo e($system->youtube_link, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
						    	</div>
				    		</fieldset>
				    	</div>

					    <div class="row">
					    	<div class="col-sm-12">
								<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
						  		<?php if($can_update): ?>
									<div class="col-md-offset-3">
							            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']); ?>

							        </div>
						  		<?php endif; ?>
					    	</div>
				    	</div>
			        <?php echo Form::close(); ?>

			    </div>
			  	<!-- /.tab-pane -->

			    <div class="tab-pane" id="reports_tab">
			    	<div class="row">
				    	<div class="col-sm-6">
				    		<fieldset>
				    			<legend><?php echo e(trans('app.visitors'), false); ?></legend>
						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('google_analytic_report', trans('app.google_analytic_report'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.google_analytic_report'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'google_analytic_report'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->google_analytic_report ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->google_analytic_report ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($system->google_analytic_report ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div>
							    <!-- /.row -->
							</fieldset>
					  	</div>
					    <!-- /.col-sm-6 -->

					  	<div class="col-sm-6">

					  	</div>
					    <!-- /.col-sm-6 -->
			    	</div>
				    <!-- /.row -->
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="notifications_tab">
			    	<div class="row">
				    	<div class="col-sm-6">
				    		<fieldset>
				    			<legend><?php echo e(trans('app.notifications'), false); ?></legend>
						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_when_vendor_registered', trans('app.notify_when_vendor_registered'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_when_vendor_registered'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'notify_when_vendor_registered'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->notify_when_vendor_registered ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->notify_when_vendor_registered ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($system->notify_when_vendor_registered ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div>
							    <!-- /.row -->

						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_new_message', trans('app.notify_new_message'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_new_message'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'notify_new_message'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->notify_new_message ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->notify_new_message ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($system->notify_new_message ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div>
							    <!-- /.row -->

						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_new_ticket', trans('app.notify_new_ticket'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_new_ticket'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'notify_new_ticket'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->notify_new_ticket ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->notify_new_ticket ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($system->notify_new_ticket ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div>
							    <!-- /.row -->

						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_when_dispute_appealed', trans('app.notify_when_dispute_appealed'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_when_dispute_appealed'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.notification.toggle', 'notify_when_dispute_appealed'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($system->notify_when_dispute_appealed ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->notify_when_dispute_appealed ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($system->notify_when_dispute_appealed ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div>
							    <!-- /.row -->
							</fieldset>
					  	</div>
					    <!-- /.col-sm-6 -->

					  	<div class="col-sm-6">

					  	</div>
					    <!-- /.col-sm-6 -->
			    	</div>
				    <!-- /.row -->
			    </div>
			    <!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div>
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/system/config.blade.php ENDPATH**/ ?>