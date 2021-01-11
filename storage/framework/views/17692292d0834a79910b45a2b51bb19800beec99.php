<div class="form-group">
  <?php echo Form::label('condition_note', trans('app.form.condition_note'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.seller_condition_note'), false); ?>"></i>
  <?php echo Form::text('condition_note', Null, ['class' => 'form-control input-sm', 'placeholder' => trans('app.placeholder.condition_note')]); ?>

  <div class="help-block with-errors"></div>
</div>

<fieldset>
  <legend><?php echo e(trans('app.form.key_features'), false); ?>

      <button id="AddMoreField" class="btn btn-xs btn-new" data-toggle="tooltip" data-title="<?php echo e(trans('help.add_input_field'), false); ?>"><i class="fa fa-plus"></i></button>
  </legend>
  <div id="DynamicInputsWrapper">
    <?php if(isset($inventory) && $inventory->key_features): ?>
      <?php $__currentLoopData = unserialize($inventory->key_features); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group">
          <div class="input-group">
            <?php echo Form::text('key_features[]', $key_feature, ['class' => 'form-control input-sm', 'placeholder' => trans('app.placeholder.key_feature')]); ?>

            <span class="input-group-addon">
              <i class="fa fa-times removeThisInputBox" data-toggle="tooltip" data-title="<?php echo e(trans('help.remove_input_field'), false); ?>"></i>
            </span>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
      <div class="form-group">
        <div class="input-group">
          <?php echo Form::text('key_features[]', null, ['id' => 'field_1', 'class' => 'form-control input-sm', 'placeholder' => trans('app.placeholder.key_feature')]); ?>

          <span class="input-group-addon">
            <i class="fa fa-times removeThisInputBox" data-toggle="tooltip" data-title="<?php echo e(trans('help.remove_input_field'), false); ?>"></i>
          </span>
        </div>
      </div>
    <?php endif; ?>
  </div>
</fieldset>

<div class="form-group">
  <?php echo Form::label('description', trans('app.form.description'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.seller_description'), false); ?>"></i>
  <?php echo Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.description')]); ?>

</div><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/inventory/_common.blade.php ENDPATH**/ ?>