<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.name') . '*'); ?>

      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.warehouse_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('active', trans('app.form.status').'*'); ?>

      <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('email', trans('app.form.email_address') ); ?>

      <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('incharge', trans('app.form.incharge')); ?>

      <?php echo Form::select('incharge', $staffs , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.incharge')]); ?>

    </div>
  </div>
</div>

<?php if (! (isset($warehouse))): ?>
  <?php echo $__env->make('address._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div class="form-group">
  <?php echo Form::label('description', trans('app.form.description')); ?>

  <?php echo Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.description')]); ?>

</div>

<div class="form-group">
	<label for="exampleInputFile"><?php echo e(trans('app.form.logo'), false); ?></label>
  <?php if(isset($warehouse) && $warehouse->image): ?>
  <label>
    <img src="<?php echo e(get_storage_file_url($warehouse->image->path, 'small'), false); ?>" alt="<?php echo e(trans('app.image'), false); ?>">
    <span style="margin-left: 10px;">
      <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

    </span>
  </label>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-9 nopadding-right">
			<input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.logo'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
    </div>
    <div class="col-md-3 nopadding-left">
			<div class="fileUpload btn btn-primary btn-block btn-flat">
			    <span><?php echo e(trans('app.form.upload'), false); ?></span>
			    <input type="file" name="image" id="uploadBtn" class="upload" />
			</div>
    </div>
  </div>
</div>
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/warehouse/_form.blade.php ENDPATH**/ ?>