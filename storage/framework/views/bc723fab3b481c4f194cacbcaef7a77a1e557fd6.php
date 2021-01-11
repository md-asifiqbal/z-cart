<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('language', trans('app.language').'*', ['class' => 'with-help']); ?>

      <?php echo Form::text('language', null, ['class' => 'form-control', 'placeholder' => trans('app.language'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('order', trans('app.form.position'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.language_order'), false); ?>"></i>
      <?php echo Form::number('order' , null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.position')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('code', trans('app.code').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.locale_code'), false); ?>"></i>
      <?php echo Form::text('code', null, ['class' => 'form-control', 'placeholder' => trans('app.code'), 'required']); ?>

      <div class="help-block with-errors"><?php echo trans('help.locale_code_exmaple'); ?></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('php_locale_code', trans('app.php_locale_code').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.php_locale_code'), false); ?>"></i>
      <?php echo Form::text('php_locale_code', null, ['class' => 'form-control', 'placeholder' => trans('app.php_locale_code'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <div class="input-group">
        <?php echo e(Form::hidden('rtl', 0), false); ?>

        <?php echo Form::checkbox('rtl', null, null, ['id' => 'rtl', 'class' => 'icheckbox_line']); ?>

        <?php echo Form::label('rtl', trans('app.rtl')); ?>

        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.rtl'), false); ?>"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <div class="input-group">
        <?php echo e(Form::hidden('active', 0), false); ?>

        <?php echo Form::checkbox('active', null, null, ['id' => 'active', 'class' => 'icheckbox_line']); ?>

        <?php echo Form::label('active', trans('app.active')); ?>

        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.locale_active'), false); ?>"></i>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="alert alert-info">
    <?php echo e(trans('help.new_language_info'), false); ?>

</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/language/_form.blade.php ENDPATH**/ ?>