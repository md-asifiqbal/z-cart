<div class="form-group">
 	<?php echo Form::label('current_password', trans('app.form.current_password').'*' ); ?>

    <?php echo Form::password('current_password', ['class' => 'form-control', 'id' => 'current_password', 'placeholder' => trans('app.placeholder.current_password'), 'data-minlength' => '6', 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<?php echo $__env->make('admin.partials._password_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_change_password.blade.php ENDPATH**/ ?>