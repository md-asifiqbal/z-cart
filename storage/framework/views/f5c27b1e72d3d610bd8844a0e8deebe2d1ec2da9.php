<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('title', trans('app.form.title'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.slider_title'), false); ?>"></i>
      <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.title')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('title_color', trans('app.form.text_color'), ['class' => 'with-help']); ?>

      <div class="input-group my-colorpicker2 colorpicker-element">
          <?php echo Form::text('title_color', isset($slider) ? Null : '#333333', ['class' => 'form-control', 'placeholder' => trans('app.placeholder.color')]); ?>

        <div class="input-group-addon">
          <i style="background-color: rgb(51, 51, 51);"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('sub_title', trans('app.form.sub_title'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.slider_sub_title'), false); ?>"></i>
      <?php echo Form::text('sub_title', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.sub_title')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('sub_title_color', trans('app.form.text_color'), ['class' => 'with-help']); ?>

      <div class="input-group my-colorpicker2 colorpicker-element">
          <?php echo Form::text('sub_title_color', isset($slider) ? Null : '#b5b5b5', ['class' => 'form-control', 'placeholder' => trans('app.placeholder.color')]); ?>

        <div class="input-group-addon">
          <i style="background-color: rgb(181, 181, 181);"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('link', trans('app.form.link'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.slider_link'), false); ?>"></i>
      <?php echo Form::text('link', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.link')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('order', trans('app.form.position'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.slider_order'), false); ?>"></i>
      <?php echo Form::number('order' , null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.position')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputFile" class="with-help"> <?php echo e(trans('app.slider_image') . '*', false); ?></label>
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.slider_image'), false); ?>"></i>
      <?php if(isset($slider) && Storage::exists(optional($slider->featuredImage)->path)): ?>
        <div>
          <img src="<?php echo e(get_storage_file_url(optional($slider->featuredImage)->path, 'medium'), false); ?>" width="50%" alt="<?php echo e(trans('app.slider_image'), false); ?>">
          <span class="indent10">
            <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

          </span>
        </div><div class="spacer5"></div>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-9 nopadding-right">
          <input id="uploadFile" placeholder="<?php echo e(trans('app.slider_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
        </div>
        <div class="col-md-3 nopadding-left">
          <div class="fileUpload btn btn-primary btn-block btn-flat">
            <span><?php echo e(trans('app.form.select'), false); ?></span>
            <input type="file" name="image" id="uploadBtn" class="upload" <?php echo e(isset($slider) ? '' : 'required', false); ?> />
          </div>
        </div>
      </div>
      <div class="help-block with-errors"><?php echo e(trans('help.slider_img_hint'), false); ?></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <label for="thumb" class="with-help"> <?php echo e(trans('app.mobile_slider'), false); ?></label>
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.mobile_slider_image'), false); ?>"></i>
      <?php if(isset($slider) && Storage::exists(optional($slider->mobile)->path)): ?>
        <div>
          <img src="<?php echo e(get_storage_file_url(optional($slider->mobile)->path, 'medium'), false); ?>" width="50%" alt="<?php echo e(trans('app.slider_image'), false); ?>">
          <span class="indent10">
            <?php echo Form::checkbox('delete_thumb_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

          </span>
        </div><div class="spacer5"></div>
      <?php endif; ?>
      <span class="spacer5"></span>
      <input type="file" name="thumb" style="display: inline-block;" />
      <div class="help-block with-errors"><?php echo e(trans('help.mobile_app_slider_hits'), false); ?></div>
    </div>
  </div>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/slider/_form.blade.php ENDPATH**/ ?>