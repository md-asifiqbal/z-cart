<div class="form-group">
  <?php echo Form::label('title', trans('app.form.blog_title').'*'); ?>

  <?php echo Form::text('title', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.title'), 'required']); ?>

</div>
<div class="form-group">
  <?php echo Form::label('slug', trans('app.form.slug').'*'); ?>

  <?php echo Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.placeholder.slug'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <?php echo Form::label('excerpt', trans('app.form.excerpt').'*'); ?>

  <?php echo Form::textarea('excerpt', null, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.excerpt'), 'rows' => '3', 'required']); ?>

  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <?php echo Form::label('content', trans('app.form.content').'*'); ?>

  <?php echo Form::textarea('content', null, ['class' => 'form-control summernote-long', 'placeholder' => trans('app.placeholder.content'), 'required']); ?>

</div>
<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('published_at', trans('app.form.publish_at')); ?>

      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <?php echo Form::text('published_at', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.publish_at')]); ?>

      </div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('status', trans('app.form.status').'*'); ?>

      <?php echo Form::select('status', ['1' => trans('app.publish'), '0' => trans('app.draft')], null, ['class' => 'form-control select2-normal', 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
<div class="form-group">
    <?php echo Form::label('tag_list[]', trans('app.form.tags')); ?>

    <?php echo Form::select('tag_list[]', $tags, null, ['class' => 'form-control select2-tag', 'multiple' => 'multiple']); ?>

</div>
<div class="form-group">
  <label for="exampleInputFile"> <?php echo e(trans('app.featured_image'), false); ?></label>
  <?php if(isset($blog) && Storage::exists(optional($blog->image)->path)): ?>
    <img src="<?php echo e(get_storage_file_url(optional($blog->image)->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.featured_image'), false); ?>">
    <span style="margin-left: 10px;">
      <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

    </span>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-9 nopadding-right">
      <input id="uploadFile" placeholder="<?php echo e(trans('app.featured_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
    </div>
    <div class="col-md-3 nopadding-left">
      <div class="fileUpload btn btn-primary btn-block btn-flat">
        <span><?php echo e(trans('app.form.upload'), false); ?></span>
        <input type="file" name="image" id="uploadBtn" class="upload" />
      </div>
    </div>
  </div>
  <div class="help-block with-errors"><?php echo e(trans('help.blog_feature_img_hint'), false); ?></div>
</div>
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/blog/_form.blade.php ENDPATH**/ ?>