<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.email_template_name'), false); ?>"></i>
      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.template_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-3 nopadding">
    <div class="form-group">
      <?php echo Form::label('type', trans('app.form.email_template_type').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.email_template_type'), false); ?>"></i>
      <?php echo Form::select('type', ['HTML' => trans('app.html'), 'Text' => trans('app.text')], null, ['class' => 'form-control select2-normal', 'id' => 'send_email', 'placeholder' => trans('app.placeholder.template_type'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-3 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('template_for', trans('app.form.template_for').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.template_use_for'), false); ?>"></i>
      <?php echo Form::select('template_for', ['Platform' => trans('app.platform'), 'Merchant' => trans('app.merchant')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.template_type'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('sender_email', trans('app.form.template_sender_email').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.template_sender_email'), false); ?>"></i>
      <?php echo Form::email('sender_email', isset($template->sender_email) ? $template->sender_email : config('shop_settings.default_sender_email_address'), ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('sender_name', trans('app.form.template_sender_name').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.template_sender_name'), false); ?>"></i>
      <?php echo Form::text('sender_name', isset($template->sender_name) ? $template->sender_name : config('shop_settings.default_email_sender_name'), ['class' => 'form-control', 'placeholder' => trans('app.placeholder.template_sender_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
<div class="form-group">
  <?php echo Form::label('subject', trans('app.form.subject').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.email_template_subject'), false); ?>"></i>
  <?php echo Form::text('subject', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.template_subject'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <?php echo Form::label('body', trans('app.form.template_body').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.email_template_body'), false); ?>"></i>
  <?php echo Form::textarea('body', null, ['class' => 'form-control summernote-long', 'placeholder' => trans('app.placeholder.template_body'), 'required']); ?>

</div>

<div class="box collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-code"></i> <?php echo e(trans('app.short_codes'), false); ?></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div> <!-- /.box-header -->
  <div class="box-body">
    <?php echo $__env->make('admin.email-template._short_codes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/email-template/_form.blade.php ENDPATH**/ ?>