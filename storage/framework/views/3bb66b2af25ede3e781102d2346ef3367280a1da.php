<?php
	$can_update = Gate::allows('update', $config) ?: Null;
?>

<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="#inventory_tab" data-toggle="tab">
					<i class="fa fa-cubes hidden-sm"></i>
					<?php echo e(trans('app.inventory'), false); ?>

				</a></li>
				<li><a href="#order_tab" data-toggle="tab">
					<i class="fa fa-shopping-cart hidden-sm"></i>
					<?php echo e(trans('app.order'), false); ?>

				</a></li>
				<li><a href="#views_tab" data-toggle="tab">
					<i class="fa fa-laptop hidden-sm"></i>
					<?php echo e(trans('app.views'), false); ?>

				</a></li>
				<li><a href="#support_tab" data-toggle="tab">
					<i class="fa fa-phone hidden-sm"></i>
					<?php echo e(trans('app.support'), false); ?>

				</a></li>
				<li><a href="#notifications_tab" data-toggle="tab">
					<i class="fa fa-bell-o hidden-sm"></i>
					<?php echo e(trans('app.notifications'), false); ?>

				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane active" id="inventory_tab">
			    	<div class="row">
				        <?php echo Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']); ?>

					    	<div class="col-sm-9">
								<div class="form-group">
							        <?php echo Form::label('alert_quantity', trans('app.alert_quantity'). ':', ['class' => 'with-help col-sm-4 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_alert_quantity'), false); ?>"></i>
								  	<div class="col-sm-2 nopadding-left">
								  		<?php if($can_update): ?>
								        	<?php echo Form::number('alert_quantity', get_formated_decimal($config->alert_quantity), ['class' => 'form-control', 'placeholder' => trans('app.placeholder.alert_quantity')]); ?>

										<?php else: ?>
											<span><?php echo e(get_formated_decimal($config->alert_quantity), false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('default_supplier_id', trans('app.default_supplier'). ':', ['class' => 'with-help col-sm-4 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.default_supplier'), false); ?>"></i>
								  	<div class="col-sm-7 nopadding-left">
								  		<?php if($can_update): ?>
									        <?php echo Form::select('default_supplier_id', $suppliers , $config->default_supplier_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]); ?>

										<?php else: ?>
											<span><?php echo e(optional($config->supplier)->name, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('default_warehouse_id', trans('app.default_warehouse'). ':', ['class' => 'with-help col-sm-4 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.default_warehouse'), false); ?>"></i>
								  	<div class="col-sm-7 nopadding-left">
								  		<?php if($can_update): ?>
									        <?php echo Form::select('default_warehouse_id', $warehouses , $config->default_warehouse_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]); ?>

										<?php else: ?>
											<span><?php echo e(optional($config->warehouse)->name, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('default_packaging_ids', trans('app.default_packagings'). ':', ['class' => 'with-help col-sm-4 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.default_packaging_ids_for_inventory'), false); ?>"></i>
								  	<div class="col-sm-7 nopadding-left">
								  		<?php if($can_update): ?>
										    <?php echo Form::select('default_packaging_ids[]', $packagings , $config->default_packaging_ids, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']); ?>

										<?php else: ?>
											<?php $__currentLoopData = $config->default_packaging_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packaging): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<span class="label label-outline"><?php echo e(get_value_from($packaging, 'packagings', 'name'), false); ?></span>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
								  	</div>
								</div>

						  		<?php if($can_update): ?>
									<div class="col-md-offset-4">
							            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']); ?>

							        </div>
						  		<?php endif; ?>
					    	</div>
					    	<div class="col-sm-3">&nbsp;</div>
				        <?php echo Form::close(); ?>

			    	</div>
			    </div>
			  	<!-- /.tab-pane -->

			    <div class="tab-pane" id="order_tab">
			    	<div class="row">
				        <?php echo Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']); ?>

					    	<div class="col-sm-7 nopadding-right">
								<div class="form-group">
									<?php echo Form::label('order_number_prefix', trans('app.order_number_prefix') . ':', ['class' => 'with-help col-sm-4 control-label']); ?>

							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.order_number_prefix_suffix'), false); ?>"></i>
								  	<div class="col-sm-2 nopadding-left">
								  		<?php if($can_update): ?>
								  			<?php echo Form::text('order_number_prefix', $config->order_number_prefix, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.order_number_prefix')]); ?>

										<?php else: ?>
											<span><?php echo e($config->order_number_prefix, false); ?></span>
										<?php endif; ?>
								  	</div>

									<?php echo Form::label('order_number_suffix', trans('app.and') . ' ' . trans('app.suffix') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<div class="col-sm-2 nopadding-left">
								  		<?php if($can_update): ?>
								  			<?php echo Form::text('order_number_suffix', $config->order_number_suffix, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.order_number_suffix')]); ?>

										<?php else: ?>
											<span><?php echo e($config->order_number_suffix, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('default_payment_method_id', trans('app.default_payment_method'). ':', ['class' => 'with-help col-sm-4 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.default_payment_method_id'), false); ?>"></i>
								  	<div class="col-sm-7 nopadding-left">
								  		<?php if($can_update): ?>
										    <?php echo Form::select('default_payment_method_id', $payment_methods , $config->default_payment_method_id, ['class' => 'form-control select2-normal']); ?>

										<?php else: ?>
											<span><?php echo e(optional($config->payment_method)->name, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('default_tax_id', trans('app.default_tax'). ':', ['class' => 'with-help col-sm-4 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.default_tax_id'), false); ?>"></i>
								  	<div class="col-sm-7 nopadding-left">
								  		<?php if($can_update): ?>
									        <?php echo Form::select('default_tax_id', $taxes , $config->default_tax_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]); ?>

										<?php else: ?>
											<span><?php echo e($config->tax->name, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('order_handling_cost', trans('app.order_handling_cost'). ':', ['class' => 'with-help col-sm-4 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_order_handling_cost'), false); ?>"></i>
								  	<div class="col-sm-7 nopadding-left">
								  		<?php if($can_update): ?>
										    <div class="input-group">
									        	<?php echo Form::number('order_handling_cost', get_formated_decimal($config->order_handling_cost), ['class' => 'form-control', 'placeholder' => trans('app.placeholder.order_handling_cost')]); ?>

										        <span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
											</div>
										<?php else: ?>
											<span><?php echo e(get_formated_decimal($config->order_handling_cost), false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>
					    	</div>
					    	<div class="col-sm-5 nopadding-left">
					    		<fieldset>
					    			<legend><?php echo e(trans('app.after_fulfilled'), false); ?></legend>
							    	<div class="row">
								    	<div class="col-sm-6 text-right">
											<div class="form-group">
										        <?php echo Form::label('auto_archive_order', trans('app.auto_archive_order'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_auto_archive_order'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-6">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'auto_archive_order'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->auto_archive_order == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->auto_archive_order == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($config->auto_archive_order == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div>
								    <!-- /.row -->
					    		</fieldset>
					    	</div>

					    	<div class="col-sm-12">
						  		<?php if($can_update): ?>
									<div class="col-md-offset-3">
							            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']); ?>

							        </div>
						  		<?php endif; ?>
					    	</div>
				        <?php echo Form::close(); ?>

			    	</div>
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="views_tab">
			    	<div class="row">
				        <?php echo Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']); ?>

					    	<div class="col-sm-6">
					    		<fieldset>
					    			<legend><?php echo e(trans('app.back_office'), false); ?></legend>
									<div class="form-group">
								        <?php echo Form::label('pagination', trans('app.pagination'). ':', ['class' => 'with-help col-sm-4 control-label']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_pagination'), false); ?>"></i>
									  	<div class="col-sm-7 nopadding-left">
									  		<?php if($can_update): ?>
											    <div class="input-group">
										    	    <?php echo Form::number('pagination', get_formated_decimal($config->pagination)?:Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.pagination')]); ?>

											        <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
										    	</div>
											<?php else: ?>
												<span><?php echo e(get_formated_decimal($config->pagination)?:Null, false); ?></span>
											<?php endif; ?>
									  	</div>
									</div>
					    		</fieldset>
					    	</div>
					    	<div class="col-sm-6">
					    		<fieldset>
					    			<legend><?php echo e(trans('app.store_front'), false); ?></legend>
							    	<div class="row">
								    	<div class="col-sm-8 text-right">
											<div class="form-group">
										        <?php echo Form::label('show_shop_desc_with_listing', trans('app.show_shop_desc_with_listing'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.show_shop_desc_with_listing'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'show_shop_desc_with_listing'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->show_shop_desc_with_listing == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->show_shop_desc_with_listing == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($config->show_shop_desc_with_listing == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div> <!-- /.row -->

							    	<div class="row">
								    	<div class="col-sm-8 text-right">
											<div class="form-group">
										        <?php echo Form::label('show_refund_policy_with_listing', trans('app.show_refund_policy_with_listing'). ':', ['class' => 'with-help control-label']); ?>

											  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.show_refund_policy_with_listing'), false); ?>"></i>
											</div>
										</div>
								    	<div class="col-sm-4">
									  		<?php if($can_update): ?>
											  	<div class="handle horizontal">
													<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'show_refund_policy_with_listing'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->show_refund_policy_with_listing == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->show_refund_policy_with_listing == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
														<div class="btn-handle"></div>
													</a>
											  	</div>
											<?php else: ?>
												<span><?php echo e($config->show_refund_policy_with_listing == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
											<?php endif; ?>
										</div>
								  	</div> <!-- /.row -->
					    		</fieldset>
					    	</div>

					  		<?php if($can_update): ?>
								<div class="col-sm-12">
						            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new col-sm-offset-2']); ?>

						        </div>
					  		<?php endif; ?>
				        <?php echo Form::close(); ?>

			    	</div>
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="support_tab">
			    	<?php if(config('system_settings.enable_chat')): ?>
				    	<div class="row">
					    	<div class="col-sm-3 text-right">
								<div class="form-group">
							        <?php echo Form::label('enable_live_chat', trans('app.enable_live_chat'). ':', ['class' => 'with-help control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.enable_live_chat_on_shop'), false); ?>"></i>
								</div>
							</div>
					    	<div class="col-sm-6">
						  		<?php if($can_update): ?>
								  	<div class="handle horizontal">
										<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'enable_live_chat'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->enable_live_chat == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->enable_live_chat == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
											<div class="btn-handle"></div>
										</a>
								  	</div>
								<?php else: ?>
									<span><?php echo e($config->enable_live_chat == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
								<?php endif; ?>
							</div>
					  	</div> <!-- /.row -->
				  	<?php endif; ?>

			    	<div class="row">
				        <?php echo Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']); ?>

					    	<div class="col-sm-12">
								<div class="form-group">
							        <?php echo Form::label('support_agent', trans('app.support_agent'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.support_agent'), false); ?>"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		<?php if($can_update): ?>
										    
										        
							                  	<?php echo Form::select('support_agent', $staffs , $config->support_agent, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

									    	
										<?php else: ?>
											<span><?php echo e($config->supportAgent->getName(), false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('support_phone', trans('app.support_phone'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.support_phone'), false); ?>"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		<?php if($can_update): ?>
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
									    	    <?php echo Form::number('support_phone', $config->support_phone, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_phone')]); ?>

									    	</div>
										<?php else: ?>
											<span><?php echo e($config->support_phone, false); ?></span>
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
									    	    <?php echo Form::number('support_phone_toll_free', $config->support_phone_toll_free, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_phone_toll_free')]); ?>

									    	</div>
										<?php else: ?>
											<span><?php echo e($config->support_phone_toll_free, false); ?></span>
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
												<?php echo Form::email('support_email', $config->support_email, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_email'), 'required']); ?>

									    	</div>
									      	<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($config->support_email, false); ?></span>
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
												<?php echo Form::email('default_sender_email_address', $config->default_sender_email_address, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.default_sender_email_address'), 'required']); ?>

									    	</div>
									      	<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($config->default_sender_email_address, false); ?></span>
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
												<?php echo Form::text('default_email_sender_name', $config->default_email_sender_name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.default_email_sender_name'), 'required']); ?>

									    	</div>
									      	<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($config->default_email_sender_name, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('return_refund', '*' . trans('app.form.config_return_refund'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.config_return_refund'), false); ?>"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		<?php if($can_update): ?>
											<?php echo Form::textarea('return_refund', $config->return_refund, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.config_return_refund'), 'required']); ?>

									      	<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($config->return_refund, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>

						  		<?php if($can_update): ?>
									<div class="col-md-offset-3">
							            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']); ?>

							        </div>
						  		<?php endif; ?>
						  	</div>
				        <?php echo Form::close(); ?>

			    	</div>
			    </div>
			  	<!-- /.tab-pane -->

			    <div class="tab-pane" id="notifications_tab">
			    	<div class="row">
				    	<div class="col-sm-6">
				    		<fieldset>
				    			<legend><?php echo e(trans('app.inventory'), false); ?></legend>
						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_alert_quantity', trans('app.notify_alert_quantity'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_alert_quantity'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'notify_alert_quantity'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->notify_alert_quantity == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->notify_alert_quantity == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($config->notify_alert_quantity == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div>
							    <!-- /.row -->

						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_inventory_out', trans('app.notify_inventory_out'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_inventory_out'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'notify_inventory_out'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->notify_inventory_out == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->notify_inventory_out == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($config->notify_inventory_out == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div>
							    <!-- /.row -->
							</fieldset>
					  	</div> <!-- /.col-sm-6 -->

					  	<div class="col-sm-6">
				    		<fieldset>
				    			<legend><?php echo e(trans('app.order'), false); ?></legend>
						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_new_order', trans('app.notify_new_order'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_new_order'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'notify_new_order'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->notify_new_order == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->notify_new_order == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($config->notify_new_order == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div> <!-- /.row -->

						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_abandoned_checkout', trans('app.notify_abandoned_checkout'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_abandoned_checkout'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'notify_abandoned_checkout'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->notify_abandoned_checkout == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->notify_abandoned_checkout == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($config->notify_abandoned_checkout == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div> <!-- /.row -->

						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_new_disput', trans('app.notify_new_disput'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_new_disput'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'notify_new_disput'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->notify_new_disput == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->notify_new_disput == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($config->notify_new_disput == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div> <!-- /.row -->
							</fieldset>
					  	</div> <!-- /.col-sm-6 -->

				    	<div class="col-sm-6">
				    		<fieldset>
				    			<legend><?php echo e(trans('app.support'), false); ?></legend>
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
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'notify_new_message'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->notify_new_message == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->notify_new_message == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($config->notify_new_message == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div> <!-- /.row -->

						    	<div class="row">
							    	<div class="col-sm-8 text-right">
										<div class="form-group">
									        <?php echo Form::label('notify_new_chat', trans('app.notify_new_chat'). ':', ['class' => 'with-help control-label']); ?>

										  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.notify_new_chat'), false); ?>"></i>
										</div>
									</div>
							    	<div class="col-sm-4">
								  		<?php if($can_update): ?>
										  	<div class="handle horizontal">
												<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.notification.toggle', 'notify_new_chat'), false); ?>" type="button" class="btn btn-md btn-secondary btn-toggle <?php echo e($config->notify_new_chat == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($config->notify_new_chat == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
													<div class="btn-handle"></div>
												</a>
										  	</div>
										<?php else: ?>
											<span><?php echo e($config->notify_new_chat == 1 ? trans('app.on') : trans('app.off'), false); ?></span>
										<?php endif; ?>
									</div>
							  	</div> <!-- /.row -->
							</fieldset>
					  	</div> <!-- /.col-sm-6 -->
			    	</div> <!-- /.row -->
			    </div> <!-- /.tab-pane -->
			</div> <!-- /.tab-content -->
		</div>
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/config/index.blade.php ENDPATH**/ ?>