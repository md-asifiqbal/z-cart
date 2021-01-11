<div class="form-group">
  <?php echo Form::label('email_template_id', trans('app.form.email_template').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.order_status_email_template'), false); ?>"></i>
  <?php echo Form::select('email_template_id', $email_templates , null, ['class' => 'form-control select2', 'id' => 'email_template', 'placeholder' => trans('app.placeholder.email_template'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/_email_template_id_field.blade.php ENDPATH**/ ?>