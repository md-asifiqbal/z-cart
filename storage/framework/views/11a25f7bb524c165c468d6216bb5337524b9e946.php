<div class="form-group">
  <?php echo Form::label('reply', trans('app.form.message').'*'); ?>

  <?php echo Form::textarea('reply', Null, ['class' => 'form-control summernote', 'rows' => '2', 'placeholder' => trans('app.placeholder.reply'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<?php echo $__env->make('admin.partials._attachment_upload_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_reply.blade.php ENDPATH**/ ?>