<div class="form-group">
  <?php echo Form::label('attribute_id', trans('app.form.attribute').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.parent_attribute'), false); ?>"></i>
  <?php echo Form::select('attribute_id', $attributeList , isset($attribute) ? $attribute->id : null, ['class' => 'form-control select2-attribute_value-attribute', 'placeholder' => trans('app.placeholder.attribute'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<div class="row">
  <div class="col-md-8 nopadding-right">
	<div class="form-group">
	  	<?php echo Form::label('value', trans('app.form.attribute_value').'*'); ?>

		<div class="input-group">
			<?php echo Form::text('value', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.attribute_value'), 'required']); ?>

		    <span class="input-group-addon" id="basic-addon1">
		      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.attribute_value'), false); ?>"></i>
		    </span>
		 </div>
	  	<div class="help-block with-errors"></div>
	</div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('order', trans('app.form.list_order')); ?>

      <div class="input-group">
        <?php echo Form::number('order', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.list_order')]); ?>

        <span class="input-group-addon" id="basic-addon1">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.list_order'), false); ?>"></i>
        </span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div id="color-option" class="
	<?php echo e((
			(!isset($attribute->attribute_type_id)) ||
			($attribute->attribute_type_id != 1)
		)
		? 'hidden' : 'show', false); ?>">

	<div class="form-group">
	  <?php echo Form::label('color', trans('app.form.color_attribute')); ?>

		<div class="input-group my-colorpicker2 colorpicker-element">
		  	<?php echo Form::text('color', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.color')]); ?>

			<div class="input-group-addon">
				<i style="background-color: rgb(135, 60, 60);"></i>
			</div>
		</div>
	</div>

	<div class="form-group">
	  <label for="exampleInputFile"> <?php echo e(trans('app.form.pattern'), false); ?></label>
	  <?php if(isset($attributeValue) && Storage::exists(optional($attributeValue->image)->path)): ?>
	  <label>
      	<img src="<?php echo e(get_storage_file_url(optional($attributeValue->image)->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.image'), false); ?>">
	    <span style="margin-left: 10px;">
	      <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_pattern'), false); ?>

	    </span>
	  </label>
	  <?php endif; ?>
	  <div class="row">
	      <div class="col-md-9 nopadding-right">
	       <input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
	      </div>
	      <div class="col-md-3 nopadding-left">
	      <div class="fileUpload btn btn-primary btn-block btn-flat">
	          <span><?php echo e(trans('app.form.upload'), false); ?> </span>
	          <input type="file" name="image" id="uploadBtn" class="upload" />
	      </div>
	      </div>
	    </div>
	</div>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/attribute-value/_form.blade.php ENDPATH**/ ?>