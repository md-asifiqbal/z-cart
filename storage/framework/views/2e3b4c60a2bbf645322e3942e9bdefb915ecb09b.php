<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.merchant_full_name').'*'); ?>

      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.merchant_full_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('active', trans('app.form.status').'*'); ?>

      <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], isset($merchant) ? null : 1, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('email', trans('app.form.email_address').'*' ); ?>

      <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php if(!isset($merchant)): ?>
        <?php echo Form::label('password', trans('app.form.temporary_password').'*'); ?>

        <?php echo Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('app.placeholder.temporary_password'), 'data-minlength' => '6', 'required']); ?>

        <div class="help-block with-errors"></div>
      <?php else: ?>
        <?php echo Form::label('nice_name', trans('app.form.nice_name') ); ?>

        <?php echo Form::text('nice_name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.nice_name')]); ?>

      <?php endif; ?>
    </div>
  </div>
</div>

<?php if (! (isset($merchant))): ?>
  <div class="row">
    <div class="col-md-6 nopadding-right">
      <div class="form-group">
        <?php echo Form::label('shop_name', trans('app.form.shop_name').'*', ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_name'), false); ?>"></i>
        <?php echo Form::text('shop_name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.shop_name'), 'required']); ?>

        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-6 nopadding-left">
      <div class="form-group">
        <?php echo Form::label('legal_name', trans('app.form.legal_name'). '*', ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_legal_name'), false); ?>"></i>
        <?php echo Form::text('legal_name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shop_legal_name'), 'required']); ?>

        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 nopadding-right">
      <div class="form-group">
        <?php echo Form::label('slug', trans('app.form.slug').'*', ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_slug'), false); ?>"></i>
        <?php echo Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.slug'), 'required']); ?>

        <div class="help-block with-errors"></div>
      </div>
    </div>

    <div class="col-md-6 nopadding-left">
      <div class="form-group">
        <?php echo Form::label('external_url', trans('app.form.external_url'), ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_external_url'), false); ?>"></i>
        <?php echo Form::text('external_url', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.external_url')]); ?>

      </div>
    </div>
  </div>
<?php endif; ?>

<?php if(isset($merchant)): ?>
  <div class="row">
    <div class="col-md-6 nopadding-right">
      <div class="form-group">
        <?php echo Form::label('dob', trans('app.form.dob')); ?>

        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <?php echo Form::text('dob', null, ['class' => 'form-control datepicker', 'placeholder' => trans('app.placeholder.dob')]); ?>

        </div>
      </div>
    </div>
    <div class="col-md-6 nopadding-left">
      <div class="form-group">
        <?php echo Form::label('sex', trans('app.form.sex')); ?>

        <?php echo Form::select('sex', ['app.male' => trans('app.male'), 'app.female' => trans('app.female'), 'app.other' => trans('app.other')], null, ['class' => 'form-control select2-normal', 'placeholder' =>trans('app.placeholder.sex')]); ?>

      </div>
    </div>
  </div>
<?php endif; ?>

<div class="form-group">
  <?php echo Form::label('description', trans('app.form.description')); ?>

  <?php echo Form::textarea('description', null, ['class' => 'form-control summernote', 'rows' => '2', 'placeholder' => trans('app.placeholder.description')]); ?>

</div>

<div class="form-group">
  <label for="exampleInputFile"><?php echo e(trans('app.form.avatar'), false); ?></label>
  <?php if(isset($merchant) && $merchant->image): ?>
  <label>
    <img src="<?php echo e(get_storage_file_url($merchant->image->path, 'small'), false); ?>" alt="<?php echo e(trans('app.avatar'), false); ?>">
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
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/merchant/_form.blade.php ENDPATH**/ ?>