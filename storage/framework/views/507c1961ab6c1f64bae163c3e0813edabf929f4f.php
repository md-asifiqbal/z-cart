<div class="form-group">
  <?php echo Form::label('category_sub_group_id', trans('app.form.category_sub_group').'*'); ?>

  <?php echo Form::select('category_sub_group_id', $catList , null, ['class' => 'form-control select2-categories', 'placeholder' => trans('app.placeholder.category_sub_group'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<div class="form-group">
  <?php echo Form::label('name', trans('app.form.category_name').'*'); ?>

  <?php echo Form::text('name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.category_name'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<div class="form-group">
  <?php echo Form::label('slug', trans('app.form.slug').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.slug'), false); ?>"></i>
  <?php echo Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.placeholder.slug'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('active', trans('app.form.status').'*', ['class' => 'with-help']); ?>

      <?php echo Form::select('active', ['1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('order', trans('app.form.position'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.display_order'), false); ?>"></i>
      <?php echo Form::number('order' , null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.position')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('description', trans('app.form.description') . trans('app.form.optional'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.category_desc'), false); ?>"></i>
  <?php echo Form::textarea('description', null, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.category_description'), 'rows' => '1']); ?>

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
  <?php echo Form::label('exampleInputFile', trans('app.form.cover_img'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.cover_img', ['page' => trans('app.category')]), false); ?>"></i>
  <?php if(isset($category) && Storage::exists(optional($category->image)->path)): ?>
    <img src="<?php echo e(get_storage_file_url(optional($category->image)->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.cover_image'), false); ?>">
    <span style="margin-left: 10px;">
      <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

    </span>
  <?php endif; ?>
	<div class="row">
      <div class="col-md-9 nopadding-right">
        <input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.category_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
        <div class="help-block with-errors"><?php echo e(trans('help.cover_img_size'), false); ?></div>
      </div>
      <div class="col-md-3 nopadding-left">
  			<div class="fileUpload btn btn-primary btn-block btn-flat">
  			    <span><?php echo e(trans('app.form.upload'), false); ?> </span>
  			    <input type="file" name="image" id="uploadBtn" class="upload" />
  			</div>
      </div>
    </div>
</div>
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/category/_form.blade.php ENDPATH**/ ?>