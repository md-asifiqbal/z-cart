<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.shipping_carrier_name').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shipping_carrier_name'), false); ?>"></i>
      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.carrier_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('active', trans('app.form.status').'*', ['class' => 'with-help']); ?>

      <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('tracking_url', trans('app.form.shipping_tracking_url'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shipping_tracking_url'), false); ?>"></i>
  <?php echo Form::text('tracking_url', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shipping_tracking_url')]); ?>

  <div class="help-block with-errors"><?php echo e(trans('help.shipping_tracking_url_example'), false); ?></div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('phone', trans('app.form.phone')); ?>

      <?php echo Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.phone_number')]); ?>

    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('email', trans('app.form.email_address')); ?>

      <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
	<label for="exampleInputFile"><?php echo e(trans('app.form.logo'), false); ?></label>
  <?php if(isset($carrier) && $carrier->image): ?>
    <label>
      <img src="<?php echo e(get_storage_file_url($carrier->image->path, 'small'), false); ?>" alt="<?php echo e(trans('app.logo'), false); ?>">
      <span style="margin-left: 10px;">
        <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_logo'), false); ?>

      </span>
    </label>
  <?php endif; ?>
	<div class="row">
    <div class="col-md-9 nopadding-right">
			<input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.logo'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
      <div class="help-block with-errors"><?php echo e(trans('help.customer_will_see_this'), false); ?></div>
    </div>
    <div class="col-md-3 nopadding-left">
			<div class="fileUpload btn btn-primary btn-block btn-flat">
			    <span><?php echo e(trans('app.form.upload'), false); ?></span>
			    <input type="file" name="image" id="uploadBtn" class="upload" />
			</div>
    </div>
  </div>
</div>
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/carrier/_form.blade.php ENDPATH**/ ?>