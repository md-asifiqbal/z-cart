<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('title', trans('app.form.page_title').'*'); ?>

      <?php echo Form::text('title', null, ['class' => isset($page) ? 'form-control' : 'form-control makeSlug', 'placeholder' => trans('app.placeholder.page_title'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('position', trans('app.form.view_area').'*'); ?>

      <?php echo Form::select('position', $positions, Null, ['class' => 'form-control select2-normal', 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<?php if (! (isset($page))): ?>
  <div class="form-group">
    <?php echo Form::label('slug', trans('app.form.slug').'*'); ?>

    <?php echo Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.placeholder.slug'), 'required']); ?>

    <div class="help-block with-errors"></div>
  </div>
<?php endif; ?>

<div class="form-group">
  <?php echo Form::label('content', trans('app.form.content').'*'); ?>

  <?php echo Form::textarea('content', null, ['class' => 'form-control summernote-long', 'placeholder' => trans('app.placeholder.content'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<?php if (! (isset($page) && in_array($page->id, config('system.freeze.pages')))): ?>
  <div class="row">
    <div class="col-md-6 nopadding-right">
      <div class="form-group">
        <?php echo Form::label('published_at', trans('app.form.publish_at')); ?>

        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <?php echo Form::text('published_at', isset($page) ? $page->published_at : null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.publish_at')]); ?>

        </div>
        <div class="help-block with-errors"><?php echo e(trans('help.leave_empty_to_save_as_draft'), false); ?></div>
      </div>
    </div>
    <div class="col-md-6 nopadding-left">
      <div class="form-group">
        <?php echo Form::label('visibility', trans('app.form.visibility').'*'); ?>

        <?php echo Form::select('visibility', ['1' => trans('app.public'), '2' => trans('app.merchant')], null, ['class' => 'form-control select2-normal', 'required']); ?>

        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="form-group">
  <label for="exampleInputFile"> <?php echo e(trans('app.featured_image'), false); ?></label>
  <?php if(isset($page) && Storage::exists(optional($page->image)->path)): ?>
    <img src="<?php echo e(get_storage_file_url(optional($page->image)->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.featured_image'), false); ?>">
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
</div>
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/page/_form.blade.php ENDPATH**/ ?>