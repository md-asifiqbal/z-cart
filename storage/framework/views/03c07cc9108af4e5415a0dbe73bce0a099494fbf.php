<?php
	$can_update = Gate::allows('update', $system) ?: Null;
?>

<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="#general_settings_tab" data-toggle="tab">
					<i class="fa fa-cubes hidden-sm"></i>
					<?php echo e(trans('app.general_settings'), false); ?>

				</a></li>
				<li><a href="#envioronment_config_tab" data-toggle="tab">
					<i class="fa fa-cog hidden-sm"></i>
					<?php echo e(trans('app.environment_config'), false); ?>

				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane active" id="general_settings_tab">
			    	<div class="row">
				        <?php echo Form::model($system, ['method' => 'PUT', 'route' => ['admin.setting.basic.system.update'], 'files' => true, 'id' => 'form', 'class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>

					    	<div class="col-sm-9">
								<div class="form-group">
									<?php echo Form::label('name', '*' . trans('app.marketplace_name') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.marketplace_name'), false); ?>"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		<?php if($can_update): ?>
								  			<?php echo Form::text('name', $system->name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.marketplace_name'), 'required']); ?>

									  		<div class="help-block with-errors"></div>
										<?php else: ?>
											<span class="lead"><?php echo e($system->name, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
									<?php echo Form::label('slogan', trans('app.form.slogan') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_slogan'), false); ?>"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		<?php if($can_update): ?>
								  			<?php echo Form::text('slogan', $system->slogan, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.slogan')]); ?>

										<?php else: ?>
											<span><?php echo e($system->slogan, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
									<?php echo Form::label('legal_name', '*' . trans('app.legal_name') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_legal_name'), false); ?>"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		<?php if($can_update): ?>
								  			<?php echo Form::text('legal_name', $system->legal_name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.legal_name'), 'required']); ?>

									  		<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->legal_name, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
									<?php echo Form::label('email', '*' . trans('app.form.email_address'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_email'), false); ?>"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		<?php if($can_update): ?>
											<?php echo Form::email('email', $system->email, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']); ?>

									  		<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->email, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('worldwide_business_area', '*' . trans('app.business_area'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.marketplace_business_area'), false); ?>"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		<?php if($can_update): ?>
									        <?php echo Form::select('worldwide_business_area', $business_areas , $system->worldwide_business_area, ['class' => 'form-control select2-normal', 'required']); ?>

									  		<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->business_area, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('timezone_id', '*' . trans('app.form.timezone'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_timezone'), false); ?>"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		<?php if($can_update): ?>
									        <?php echo Form::select('timezone_id', $timezones , $system->timezone_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.timezone'), 'required']); ?>

									  		<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->timezone->text, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('default_language', '*' . trans('app.default_language'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_default_language'), false); ?>"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		<?php if($can_update): ?>
									        <?php echo Form::select('default_language', $languages , $system->default_language, ['class' => 'form-control select2-normal', 'required']); ?>

									  		<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->default_language, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

								<div class="form-group">
							        <?php echo Form::label('currency_id', '*' . trans('app.form.system_currency'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_currency'), false); ?>"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		<?php if($can_update): ?>
									        <?php echo Form::select('currency_id', $currencies , $system->currency_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.system_currency'), 'required']); ?>

									  		<div class="help-block with-errors"></div>
										<?php else: ?>
											<span><?php echo e($system->timezone->text, false); ?></span>
										<?php endif; ?>
								  	</div>
								</div>

						  		<?php if($can_update): ?>
									<div class="form-group">
										<label for="exampleInputFile" class="with-help col-sm-3 control-label"> <?php echo e(trans('app.form.logo'), false); ?></label>
								      	<div class="col-md-6 nopadding">
											<input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.logo'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
									  		<div class="help-block with-errors"><?php echo e(trans('help.brand_logo_size'), false); ?></div>
								    	</div>
									    <div class="col-md-2 nopadding-left">
										  	<div class="fileUpload btn btn-primary btn-block btn-flat">
										      <span><?php echo e(trans('app.form.upload'), false); ?></span>
											    <input type="file" name="logo" id="uploadBtn" class="upload" />
									      	</div>
									    </div>
									</div>

									<div class="form-group">
										<label for="exampleInputFile" class="with-help col-sm-3 control-label"> <?php echo e(trans('app.form.icon'), false); ?></label>
								      	<div class="col-md-6 nopadding">
											<input id="uploadFile1" placeholder="<?php echo e(trans('app.placeholder.icon'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
									  		<div class="help-block with-errors"><?php echo e(trans('help.brand_icon_size'), false); ?></div>
								    	</div>
									    <div class="col-md-2 nopadding-left">
										  	<div class="fileUpload btn btn-primary btn-block btn-flat">
										      <span><?php echo e(trans('app.form.upload'), false); ?></span>
											    <input type="file" name="icon" id="uploadBtn1" class="upload" />
									      	</div>
									    </div>
									</div>
								<?php endif; ?>

								<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>

						  		<?php if($can_update): ?>
									<div class="col-md-offset-3">
							            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']); ?>

							        </div>
						  		<?php endif; ?>
					    	</div>

					        <div class="col-sm-3 nopadding-left">
						    	<?php if($can_update): ?>
									<div class="form-group text-center">
										<?php echo Form::label('maintenance_mode', trans('app.form.maintenance_mode'), ['class' => 'control-label with-help']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_maintenance_mode_handle'), false); ?>"></i>

									  	<div class="handle">
											<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.maintenanceMode.toggle'), false); ?>" type="button" class="toggle-confirm btn btn-lg btn-secondary btn-toggle <?php echo e($system->maintenance_mode == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($system->maintenance_mode == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
												<div class="btn-handle"></div>
											</a>
									  	</div>
									</div>
						        <?php endif; ?>

								<div class="text-center">
									<div class="form-group">
										<?php echo Form::label('address', trans('app.address'), ['class' => 'control-label with-help']); ?>

									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.system_physical_address'), false); ?>"></i>
									</div>

									<?php if($system->primaryAddress): ?>

										<?php echo $system->primaryAddress->toHtml(); ?>


										<a href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $system->primaryAddress->id), false); ?>"  class="btn btn-default ajax-modal-btn"><i class="fa fa-map-marker"></i> <?php echo e(trans('app.update_address'), false); ?></a>
									<?php else: ?>
										<a href="javascript:void(0)" data-link="<?php echo e(route('address.create', ['system', $system->id]), false); ?>"  class="btn btn-default ajax-modal-btn"><i class="fa fa-plus-square-o"></i> <?php echo e(trans('app.add_address'), false); ?></a>
									<?php endif; ?>

							        <div class="spacer30"></div>
								</div>

							  	<?php if( Storage::exists('icon.png') ): ?>
									<div class="form-group text-center">
										<label class="with-help control-label"> <?php echo e(trans('app.icon'), false); ?>: </label>
										<img src="<?php echo e(get_storage_file_url('icon.png', Null), false); ?>" class="brand-icon" alt="<?php echo e(trans('app.icon'), false); ?>">
									</div>
							  	<?php endif; ?>

							  	<?php if( Storage::exists('logo.png') ): ?>
									<div class="form-group text-center">
										<label class="with-help control-label"> <?php echo e(trans('app.logo'), false); ?>: </label>
										<img src="<?php echo e(get_storage_file_url('logo.png', Null), false); ?>" class="brand-logo" style="max-width: 90%" alt="<?php echo e(trans('app.logo'), false); ?>">
									</div>
							  	<?php endif; ?>
							</div>
				        <?php echo Form::close(); ?>

			    	</div>
			    </div><!-- /.tab-pane -->

			    <div class="tab-pane" id="envioronment_config_tab">
		    		<div class="spacer30"></div>
		            <?php if(Auth::guard('web')->user()->isSuperAdmin()): ?>
				    	<div class="row">
					    	<div class="col-sm-4 text-center">
					    		<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.modifyEnvFile'), false); ?>" class="ajax-modal-btn btn btn-default btn-lg "><?php echo e(trans('app.modify_environment_file'), false); ?></a>
					    		<div class="spacer10"></div>
					    		<p class="text-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('messages.modify_environment_file'); ?></p>
					    	</div><!-- /.col-sm-4 -->

					    	<div class="col-sm-4 text-center">
					    		<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.system.importDemoContents'), false); ?>" class="ajax-modal-btn btn btn-default btn-lg "><?php echo e(trans('app.import_demo_contents'), false); ?></a>
					    		<div class="spacer10"></div>
					    		<p class="text-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('messages.import_demo_contents'); ?></p>
					    	</div><!-- /.col-sm-4 -->

					    	<div class="col-sm-4 text-center">
					            <?php if( config('app.demo') !== true ): ?>
						    		<a href="<?php echo e(route('admin.setting.system.backup'), false); ?>" class="btn btn-default btn-lg confirm"><?php echo e(trans('app.take_a_backup'), false); ?></a>
					            <?php else: ?>
					            	<button class="btn btn-default btn-lg disabled"><?php echo e(trans('app.take_a_backup'), false); ?></button>

                    				<p class="text-warning"><?php echo e(trans('messages.demo_restriction'), false); ?></p>
					            <?php endif; ?>
					    		<div class="spacer10"></div>
					    		<p class="text-info"><i class="fa fa-info-circle"></i> <?php echo trans('messages.take_a_backup'); ?></p>
					    	</div><!-- /.col-sm-4 -->
				    	</div><!-- /.row -->

			            <?php if (! ( config('app.demo') == true )): ?>
					    	<hr class="style3" />
				    		<div class="spacer30"></div>

					    	<div class="row">
						    	<div class="col-sm-5 text-justify col-sm-offset-1">
						    		<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.license.uninstall'), false); ?>" class="ajax-modal-btn btn btn-danger btn-lg "><?php echo e(trans('app.uninstall_app_license'), false); ?></a>
						    		<div class="spacer10"></div>
						    		<p class="text-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('messages.uninstall_app_license'); ?></p>
						    	</div><!-- /.col-sm-9 -->
						    	<div class="col-sm-5 text-justify">
						    		<a href="<?php echo e(route('admin.setting.license.update'), false); ?>" class="btn btn-default btn-lg confirm"><?php echo e(trans('app.update_app_license'), false); ?></a>
						    		<div class="spacer10"></div>
						    		<p class="text-info"><i class="fa fa-info-circle"></i> <?php echo trans('messages.update_app_license'); ?></p>
						    	</div><!-- /.col-sm-3 -->
					    	</div><!-- /.row -->
			            <?php endif; ?>
			    	<?php endif; ?>
		    		<div class="spacer50"></div>
			    </div><!-- /.tab-pane -->
			</div><!-- /.tab-content -->
	    </div> <!-- /.nav-tabs-custom -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/system/general.blade.php ENDPATH**/ ?>