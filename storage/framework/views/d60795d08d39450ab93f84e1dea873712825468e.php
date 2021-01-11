<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.category_name').'*', ['class' => 'with-help']); ?>

      <?php echo Form::text('name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.category_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('order', trans('app.form.position'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.display_order'), false); ?>"></i>
      <?php echo Form::text('order', isset($categoryGroup) ? null : 99, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.position')]); ?>

      
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('description', trans('app.form.description'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.cat_grp_desc'), false); ?>"></i>
  <?php echo Form::textarea('description', null, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.description'), 'rows' => '2']); ?>

</div>

<div class="row">
	<div class="col-md-6 nopadding-right">
		<div class="form-group">
		  	<?php echo Form::label('icon', trans('app.form.icon')); ?>

			<div class="input-group">
				<?php echo Form::text('icon', isset($categoryGroup) ? null : 'fa-cube', ['class' => 'form-control iconpicker-input', 'placeholder' => trans('app.placeholder.icon'), 'data-placement' => 'bottomRight']); ?>

                <span class="input-group-addon"><i class="fa fa-cube"></i></span>
            </div>
		  <div class="help-block with-errors"></div>
		</div>
	</div>
	<div class="col-md-6 nopadding-left">
		<div class="form-group">
		  <?php echo Form::label('active', trans('app.form.status').'*'); ?>

		  <?php echo Form::select('active', ['1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

		  <div class="help-block with-errors"></div>
		</div>
	</div>
</div>

<div class="form-group">
  <?php echo Form::label('slug', trans('app.form.slug').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.slug'), false); ?>"></i>
  <?php echo Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.placeholder.slug'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<div class="form-group">
  <?php echo Form::label('meta_title', trans('app.form.meta_title'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.meta_title'), false); ?>"></i>
  <?php echo Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.meta_title')]); ?>

</div>

<div class="form-group">
  <?php echo Form::label('meta_description', trans('app.form.meta_description'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.meta_description'), false); ?>"></i>
  <?php echo Form::textarea('meta_description', null, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.meta_description'), 'rows' => '1']); ?>

</div>

<div class="form-group">
  <?php echo Form::label('exampleInputFile', trans('app.background_image'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.cat_grp_img'), false); ?>"></i>
  <?php if(isset($categoryGroup) && Storage::exists(optional($categoryGroup->images->first())->path)): ?>
    <label>
      <img src="<?php echo e(get_storage_file_url(optional($categoryGroup->images->first())->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.background_image'), false); ?>">
      <span style="margin-left: 10px;">
        <?php echo Form::checkbox('delete_bg_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

      </span>
    </label>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-9 nopadding-right">
      <input id="uploadFile" placeholder="<?php echo e(trans('app.background_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
    </div>
    <div class="col-md-3 nopadding-left">
      <div class="fileUpload btn btn-primary btn-block btn-flat">
          <span><?php echo e(trans('app.form.upload'), false); ?></span>
          <input type="file" name="bg_image" id="uploadBtn" class="upload" />
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('uploadFile1', trans('app.cover_image'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.cover_img',['page' => trans('app.categories')]), false); ?>"></i>
  <?php if(isset($categoryGroup) && Storage::exists(optional($categoryGroup->featuredImage)->path)): ?>
    <label>
      <img src="<?php echo e(get_storage_file_url(optional($categoryGroup->featuredImage)->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.cover_image'), false); ?>">
      <span style="margin-left: 10px;">
        <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

      </span>
    </label>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-9 nopadding-right">
      <input id="uploadFile1" placeholder="<?php echo e(trans('app.cover_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
      <div class="help-block with-errors"><?php echo e(trans('help.cover_img_size'), false); ?></div>
    </div>
    <div class="col-md-3 nopadding-left">
      <div class="fileUpload btn btn-primary btn-block btn-flat">
          <span><?php echo e(trans('app.form.upload'), false); ?></span>
          <input type="file" name="image" id="uploadBtn1" class="upload" />
      </div>
    </div>
  </div>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/category/_formGrp.blade.php ENDPATH**/ ?>