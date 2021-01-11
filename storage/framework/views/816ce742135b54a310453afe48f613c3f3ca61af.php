<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.full_name').'*'); ?>

      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.full_name'), 'required']); ?>

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
      <?php echo Form::label('nice_name', trans('app.form.nice_name') ); ?>

      <?php echo Form::text('nice_name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.nice_name')]); ?>

    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('email', trans('app.form.email_address').'*' ); ?>

      <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<?php if (! (isset($user))): ?>
  <div class="form-group">
    <?php echo Form::label('password', trans('app.form.password').'*'); ?>

    <div class="row">
      <div class="col-md-6 nopadding-right">
        <?php echo Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('app.placeholder.password'), 'data-minlength' => '6', 'required']); ?>

        <div class="help-block with-errors"></div>
      </div>
      <div class="col-md-6 nopadding-left">
        <?php echo Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('app.placeholder.confirm_password'), 'data-match' => '#password', 'required']); ?>

        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="row">
  <div class="col-md-4 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('role_id', trans('app.form.role').'*'); ?>

      <?php echo Form::select('role_id', $roles, null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding">
    <div class="form-group">
      <?php echo Form::label('dob', trans('app.form.dob')); ?>

      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <?php echo Form::text('dob', null, ['class' => 'form-control datepicker', 'placeholder' => trans('app.placeholder.dob')]); ?>

      </div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('sex', trans('app.form.sex')); ?>

      <?php echo Form::select('sex', ['app.male' => trans('app.male'), 'app.female' => trans('app.female'), 'app.other' => trans('app.other')], null, ['class' => 'form-control select2-normal', 'placeholder' =>trans('app.placeholder.sex')]); ?>

    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('description', trans('app.form.biography')); ?>

  <?php echo Form::textarea('description', null, ['class' => 'form-control summernote', 'rows' => '2', 'placeholder' => trans('app.placeholder.biography')]); ?>

</div>

<?php if (! (isset($user))): ?>
  <?php echo $__env->make('address._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div class="form-group">
  <label for="exampleInputFile"><?php echo e(trans('app.form.avatar'), false); ?></label>
  <?php if(isset($user) && $user->image): ?>
    <label>
      <img src="<?php echo e(get_storage_file_url($user->image->path, 'small'), false); ?>" alt="<?php echo e(trans('app.avatar'), false); ?>">
      <span style="margin-left: 10px;">
        <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_avatar'), false); ?>

      </span>
    </label>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-9 nopadding-right">
      <input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.avatar'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
        </div>
      <div class="col-md-3 nopadding-left">
        <div class="fileUpload btn btn-primary btn-block btn-flat">
          <span><?php echo e(trans('app.form.upload'), false); ?></span>
          <input type="file" name="image" id="uploadBtn" class="upload" />
        </div>
      </div>
    </div>
</div>
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/user/_form.blade.php ENDPATH**/ ?>