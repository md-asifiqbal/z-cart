<div class="row">
  	<div class="col-md-3">
		<div class="form-group">
		  	<label><?php echo e(trans('app.form.avatar'), false); ?></label>
			<img src="<?php echo e(get_storage_file_url(optional($profile->image)->path, 'medium'), false); ?>" class="thumbnail" width="100%" alt="<?php echo e(trans('app.avatar'), false); ?>">
		  	<?php if($profile->image): ?>
				<a class="btn btn-xs btn-default confirm ajax-silent" type="submit" href="<?php echo e(route('admin.account.deletePhoto'), false); ?>"><i class="fa fa-trash-o"></i> <?php echo e(trans('app.form.delete_avatar'), false); ?></a>
		  	<?php endif; ?>
		</div>

		<div class="form-group">
    		<?php echo Form::open(['route' => 'admin.account.updatePhoto', 'files' => true, 'data-toggle' => 'validator']); ?>

				<div class="row">
				    <div class="col-md-8 nopadding-right">
			          <input type="file" name="image" required />
				      <div class="help-block with-errors"></div>
			        </div>
				    <div class="col-md-4 nopadding-left">
				        <button type="submit" class="btn btn-info btn-block"><?php echo e(trans('app.form.upload'), false); ?></button>
		    		</div>
				</div>
			<?php echo Form::close(); ?>

	    </div>
  	</div>

  	<div class="col-md-6">
        <?php echo Form::model($profile, ['method' => 'PUT', 'route' => ['admin.account.update'], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>


		    <div class="form-group">
		      <?php echo Form::label('name', trans('app.form.full_name').'*'); ?>

		      <?php echo Form::text('name', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.full_name'), 'required']); ?>

		      <div class="help-block with-errors"></div>
		    </div>
		    <div class="form-group">
		      <?php echo Form::label('nice_name', trans('app.form.nice_name') ); ?>

		      <?php echo Form::text('nice_name', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.nice_name')]); ?>

		    </div>
		    <div class="form-group">
		      <?php echo Form::label('role', trans('app.form.role')); ?>

		      <?php echo Form::text('role', $profile->role->name, ['class' => 'form-control', 'disabled' => 'disabled']); ?>

		    </div>
		    <div class="form-group">
		      <?php echo Form::label('email', trans('app.form.email_address').'*' ); ?>

		      <?php echo Form::email('email', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']); ?>

		      <div class="help-block with-errors"></div>
		    </div>

		    <div class="form-group">
		      <?php echo Form::label('dob', trans('app.form.dob')); ?>

		      <div class="input-group">
		        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		        <?php echo Form::text('dob', Null, ['class' => 'form-control datepicker', 'placeholder' => trans('app.placeholder.dob')]); ?>

		      </div>
		    </div>
		    <div class="form-group">
		      <?php echo Form::label('sex', trans('app.form.sex')); ?>

		      <?php echo Form::select('sex', ['app.male' => trans('app.male'), 'app.female' => trans('app.female'), 'app.other' => trans('app.other')], null, ['class' => 'form-control select2-normal', 'placeholder' =>trans('app.placeholder.sex')]); ?>

		    </div>

			<div class="form-group">
			  <?php echo Form::label('description', trans('app.form.biography')); ?>

			  <?php echo Form::textarea('description', Null, ['class' => 'form-control summernote-without-toolbar', 'rows' => '2', 'placeholder' => trans('app.placeholder.biography')]); ?>

			</div>

            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

        <?php echo Form::close(); ?>

        <div class="spacer30"></div>
  	</div>

  	<div class="col-md-3">
		<div class="form-group">
		  	<label><?php echo e(trans('app.form.address'), false); ?></label>
			<?php if($profile->primaryAddress): ?>

    			<?php echo $profile->primaryAddress->toHtml(); ?>


				<a class="ajax-modal-btn btn btn-default" href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $profile->primaryAddress->id), false); ?>"><i class="fa fa-map-marker"></i> <?php echo e(trans('app.update_address'), false); ?></a>
			<?php else: ?>
				<a class="ajax-modal-btn btn btn-default" href="javascript:void(0)" data-link="<?php echo e(route('address.create', ['user', $profile->id]), false); ?>"><i class="fa fa-plus-square-o"></i> <?php echo e(trans('app.add_address'), false); ?></a>
			<?php endif; ?>
	  	</div>

		<div class="form-group">
			<a class="ajax-modal-btn btn btn-default" href="javascript:void(0)" data-link="<?php echo e(route('admin.account.showChangePasswordForm'), false); ?>"><i class="fa fa-lock"></i> <?php echo e(trans('app.change_password'), false); ?></a>
		</div>

	    <?php if($profile->isFromMerchant()): ?>
		    <hr/>
			<div class="form-group">
			  	<label><?php echo e(trans('app.merchant'), false); ?></label>
			  	<p class="lead"><?php echo e(optional($profile->shop)->name, false); ?></p>

			  	<label><?php echo e(trans('app.form.logo'), false); ?></label>
		        <img src="<?php echo e(get_storage_file_url(optional($profile->shop->image)->path, 'small'), false); ?>" class="thumbnail" alt="<?php echo e(trans('app.logo'), false); ?>">
		  	</div>

		    <hr/>
			<div class="form-group">
			  	<label><?php echo e($profile->shop->getVerificationStatus(), false); ?></label>
			  	<ul class="list-unstyled lead">
			  		<li class="<?php echo e($profile->shop->id_verified ? 'text-success' : 'text-muted', false); ?>">
			  			<i class="fa fa-<?php echo e($profile->shop->id_verified ? 'check' : 'times', false); ?>-circle-o"></i>
			  			<?php echo e(trans('app.id_verified'), false); ?>

			  		</li>
			  		<li class="<?php echo e($profile->shop->phone_verified ? 'text-success' : 'text-muted', false); ?>">
			  			<i class="fa fa-<?php echo e($profile->shop->phone_verified ? 'check' : 'times', false); ?>-circle-o"></i>
			  			<?php echo e(trans('app.phone_verified'), false); ?>

			  		</li>
			  		<li class="<?php echo e($profile->shop->address_verified ? 'text-success' : 'text-muted', false); ?>">
			  			<i class="fa fa-<?php echo e($profile->shop->address_verified ? 'check' : 'times', false); ?>-circle-o"></i>
			  			<?php echo e(trans('app.address_verified'), false); ?>

			  		</li>
			  	</ul>

			  	<span class="spacer30"></span>

	            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $profile->shop->config)): ?>
				  	<a href="<?php echo e(route('admin.setting.verify'), false); ?>" class="btn btn-block btn-flat btn-success"><?php echo e(trans('app.get_verified'), false); ?></a>
        	    <?php endif; ?>
		  </div>
	    <?php endif; ?>
  	</div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/account/_profile.blade.php ENDPATH**/ ?>