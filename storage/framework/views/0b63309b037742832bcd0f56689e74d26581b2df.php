<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.packaging_name').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.packaging_name'), false); ?>"></i>
      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.packaging_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('active', trans('app.form.status').'*',  ['class' => 'with-help']); ?>

      <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], isset($packaging) ? null : 1, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-4 col-xs-12 nopadding-right">
    <div class="form-group">
        <?php echo Form::label('width', trans('app.form.width').'*', ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.width'), false); ?>"></i>
        <div class="input-group">
          <?php echo Form::number('width', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.width'), 'required']); ?>

          <span class="input-group-addon"><?php echo e(config('system_settings.length_unit') ?: 'cm', false); ?></span>
        </div>
        <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-sm-4 col-xs-12 nopadding">
    <div class="form-group">
      <?php echo Form::label('height', trans('app.form.height').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.height'), false); ?>"></i>
      <div class="input-group">
        <?php echo Form::number('height', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.height'), 'required']); ?>

        <span class="input-group-addon"><?php echo e(config('system_settings.length_unit') ?: 'cm', false); ?></span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-sm-4 col-xs-12 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('depth', trans('app.form.depth').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.depth'), false); ?>"></i>
      <div class="input-group">
        <?php echo Form::number('depth', isset($packaging) ? null : 0, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.depth'), 'required']); ?>

        <span class="input-group-addon"><?php echo e(config('system_settings.length_unit') ?: 'cm', false); ?></span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('cost', trans('app.form.cost'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.packaging_cost'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
        <?php echo Form::number('cost', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.packaging_cost')]); ?>

      </div>
    </div>
  </div>

  <div class="col-sm-6 nopadding-left">
    <label class="with-help">&nbsp;</label>
    <div class="form-group">
      <div class="input-group">
        <?php echo e(Form::hidden('default', 0), false); ?>

        <?php echo Form::checkbox('default', null, null, ['id' => 'default', 'class' => 'icheckbox_line']); ?>

        <?php echo Form::label('default', trans('app.form.set_as_default_packaging')); ?>

        <span class="input-group-addon" id="basic-addon1">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.set_as_default_packaging'), false); ?>"></i>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('exampleInputFile', trans('app.form.image')); ?>

  <?php if(isset($packaging) && $packaging->image): ?>
  <label>
    <img src="<?php echo e(get_storage_file_url($packaging->image->path, 'small'), false); ?>" alt="<?php echo e(trans('app.image'), false); ?>">
    <span style="margin-left: 10px;">
      <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

    </span>
  </label>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-9 nopadding-right">
      <input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
    </div>
    <div class="col-md-3 nopadding-left">
      <div class="fileUpload btn btn-primary btn-block btn-flat">
          <span><?php echo e(trans('app.form.upload'), false); ?></span>
          <input type="file" name="image" id="uploadBtn" class="upload" />
      </div>
    </div>
  </div>
</div>
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/packaging/_form.blade.php ENDPATH**/ ?>