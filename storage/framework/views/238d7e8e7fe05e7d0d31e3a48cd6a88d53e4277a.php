<?php
	$can_update = Gate::allows('update', $shop->config) ?: Null;
?>

<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">
			<?php echo e(trans('app.general_settings'), false); ?>

	      </h3>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	    	<div class="row">
		        <?php echo Form::model($shop, ['method' => 'PUT', 'route' => ['admin.setting.basic.config.update', $shop->id], 'files' => true, 'id' => 'form', 'class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>

			    	<div class="col-sm-9">
						<div class="form-group">
							<?php echo Form::label('name', '*' . trans('app.shop_name') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

					        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_name'), false); ?>"></i>
						  	<div class="col-sm-8 nopadding-left">
						  		<?php if($can_update): ?>
						  			<?php echo Form::text('name', $shop->name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shop_name'), 'required']); ?>

							  		<div class="help-block with-errors"></div>
								<?php else: ?>
									<span class="lead"><?php echo e($shop->name, false); ?></span>
								<?php endif; ?>
						  	</div>
						</div>

						<div class="form-group">
							<?php if($shop->slug): ?>
								<?php echo Form::label('slug', trans('app.shop_url') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

					        	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_url'), false); ?>"></i>
							  	<div class="col-sm-8 nopadding-left">
									<span> <?php echo e(get_shop_url($shop->id), false); ?> </span>
								</div>
							<?php elseif($can_update): ?>
								<?php echo Form::label('slug', '*' . trans('app.form.slug') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

					        	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_slug'), false); ?>"></i>
							  	<div class="col-sm-8 nopadding-left">
						  			<?php echo Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.placeholder.slug'), 'required']); ?>

							  		<div class="help-block with-errors"></div>
								</div>
							<?php endif; ?>
						</div>

						<div class="form-group">
							<?php echo Form::label('legal_name', '*' . trans('app.shop_legal_name') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

					        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_legal_name'), false); ?>"></i>
						  	<div class="col-sm-8 nopadding-left">
						  		<?php if($can_update): ?>
						  			<?php echo Form::text('legal_name', $shop->legal_name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shop_name'), 'required']); ?>

							  		<div class="help-block with-errors"></div>
								<?php else: ?>
									<span><?php echo e($shop->legal_name, false); ?></span>
								<?php endif; ?>
						  	</div>
						</div>

						<div class="form-group">
							<?php echo Form::label('email', '*' . trans('app.form.email_address'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

					        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_email'), false); ?>"></i>
						  	<div class="col-sm-8 nopadding-left">
						  		<?php if($can_update): ?>
									<?php echo Form::email('email', $shop->email, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']); ?>

							  		<div class="help-block with-errors"></div>
								<?php else: ?>
									<span><?php echo e($shop->email, false); ?></span>
								<?php endif; ?>
						  	</div>
						</div>

						<div class="form-group">
						    <?php echo Form::label('external_url', trans('app.form.external_url') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

					        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_external_url'), false); ?>"></i>
						  	<div class="col-sm-8 nopadding-left">
						  		<?php if($can_update): ?>
							    	<?php echo Form::text('external_url', $shop->external_url, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.external_url')]); ?>

								<?php else: ?>
									<span><?php echo e($shop->external_url, false); ?></span>
								<?php endif; ?>
						  	</div>
						</div>

						<div class="form-group">
					        <?php echo Form::label('timezone_id', '*' . trans('app.form.timezone'). ':', ['class' => 'with-help col-sm-3 control-label']); ?>

						  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_timezone'), false); ?>"></i>
						  	<div class="col-sm-8 nopadding-left">
						  		<?php if($can_update): ?>
							        <?php echo Form::select('timezone_id', $timezones , $shop->timezone_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.timezone'), 'required']); ?>

							  		<div class="help-block with-errors"></div>
								<?php else: ?>
									<span><?php echo e($shop->timezone->text, false); ?></span>
								<?php endif; ?>
						  	</div>
						</div>

						<div class="form-group">
							<?php echo Form::label('description', trans('app.form.description') . ':', ['class' => 'with-help col-sm-3 control-label']); ?>

						  	<div class="col-sm-8 nopadding-left">
						  		<?php if($can_update): ?>
									<?php echo Form::textarea('description', $shop->description, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.description'), 'rows' => '3']); ?>

								<?php else: ?>
									<span><?php echo e($shop->description, false); ?></span>
								<?php endif; ?>
							</div>
						</div>

				  		<?php if($can_update): ?>
							<div class="form-group">
								<label for="exampleInputFile" class="with-help col-sm-3 control-label"> <?php echo e(trans('app.form.logo'), false); ?></label>
						      	<div class="col-md-6 nopadding">
									<input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.logo'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
			                        <div class="help-block with-errors"><?php echo e(trans('help.logo_img_size'), false); ?></div>
						    	</div>
							    <div class="col-md-2 nopadding-left">
								  	<div class="fileUpload btn btn-primary btn-block btn-flat">
								      <span><?php echo e(trans('app.form.upload'), false); ?></span>
									    <input type="file" name="image" id="uploadBtn" class="upload" />
							      	</div>
							    </div>
							</div>

			                <div class="form-group">
			                  	<?php echo Form::label('exampleInputFile', trans('app.form.cover_img'), ['class' => 'with-help col-sm-3 control-label']); ?>

			                  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.cover_img', ['page' => trans('app.shop')]), false); ?>"></i>
						      	<div class="col-md-6 nopadding">
			                        <input id="uploadFile1" placeholder="<?php echo e(trans('app.placeholder.cover_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
			                        <div class="help-block with-errors"><?php echo e(trans('help.cover_img_size'), false); ?></div>
			                    </div>
			                    <div class="col-md-2 nopadding-left">
			                        <div class="fileUpload btn btn-primary btn-block btn-flat">
			                            <span><?php echo e(trans('app.form.upload'), false); ?> </span>
			                            <input type="file" name="cover_image" id="uploadBtn1" class="upload" />
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

			        <div class="col-sm-3">
				    	<?php if($can_update): ?>
							<div class="form-group text-center">
								<?php echo Form::label('maintenance_mode', trans('app.form.maintenance_mode'), ['class' => 'control-label with-help']); ?>

							  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_maintenance_mode_handle'), false); ?>"></i>
							  	<div class="handle">
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.config.maintenanceMode.toggle', $shop), false); ?>" type="button" class="toggle-confirm btn btn-lg btn-secondary btn-toggle <?php echo e($shop->config->maintenance_mode == 1 ? 'active' : '', false); ?>" data-toggle="button" aria-pressed="<?php echo e($shop->config->maintenance_mode == 1 ? 'true' : 'false', false); ?>" autocomplete="off">
										<div class="btn-handle"></div>
									</a>
							  	</div>
							</div>
				        <?php endif; ?>

						<div class="text-center">
							<div class="form-group">
								<?php echo Form::label('shop_address', trans('app.shop_address'), ['class' => 'control-label with-help']); ?>

							  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_address'), false); ?>"></i>
							</div>

							<?php if($shop->primaryAddress): ?>

								<?php echo $shop->primaryAddress->toHtml(); ?>


								<a href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $shop->primaryAddress->id), false); ?>"  class="btn btn-default ajax-modal-btn"><i class="fa fa-map-marker"></i> <?php echo e(trans('app.update_address'), false); ?></a>
							<?php else: ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('address.create', ['shop', $shop->id]), false); ?>"  class="btn btn-default ajax-modal-btn"><i class="fa fa-plus-square-o"></i> <?php echo e(trans('app.add_address'), false); ?></a>
							<?php endif; ?>

					        <div class="spacer30"></div>
						</div>

						<?php if(isset($shop) && $shop->logo): ?>
							<div class="form-group text-center">
								<label class="with-help control-label"> <?php echo e(trans('app.logo'), false); ?></label>
								<img src="<?php echo e(get_storage_file_url(optional($shop->logo)->path, 'medium'), false); ?>" alt="<?php echo e(trans('app.logo'), false); ?>">
						        <div class="spacer10"></div>
								<label>
							    	<?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_logo'), false); ?>

								</label>
							</div>
					  	<?php endif; ?>

						<?php if(isset($shop) && $shop->featuredImage): ?>
							<div class="form-group text-center">
								<label class="with-help control-label"> <?php echo e(trans('app.cover_image'), false); ?></label>
		                      	<img src="<?php echo e(get_storage_file_url(optional($shop->featuredImage)->path, 'medium'), false); ?>" width="" alt="<?php echo e(trans('app.cover_image'), false); ?>">
			                    <label>
						        <div class="spacer10"></div>
								<label>
		                        	<?php echo Form::checkbox('delete_cover_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

			                    </label>
			                </div>
					  	<?php endif; ?>

					</div>
		        <?php echo Form::close(); ?>

	    	</div>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/config/general.blade.php ENDPATH**/ ?>