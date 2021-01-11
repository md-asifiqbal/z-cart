<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('title', trans('app.form.title'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.banner_title'), false); ?>"></i>
      <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.title')]); ?>

      <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
      <?php echo Form::label('description', trans('app.form.description'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.banner_description'), false); ?>"></i>
      <?php echo Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.banner_description')]); ?>

      <div class="help-block with-errors"></div>
    </div>

    <div class="row">
      <div class="col-md-6 nopadding-right">
        <div class="form-group">
          <?php echo Form::label('link', trans('app.form.link'), ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.banner_link'), false); ?>"></i>
          <?php echo Form::text('link', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.link')]); ?>

          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-6 nopadding-left">
        <div class="form-group">
          <?php echo Form::label('link_label', trans('app.form.link_label'), ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.link_label'), false); ?>"></i>
          <?php echo Form::text('link_label', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.link_label')]); ?>

          <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 nopadding-right">
        <div class="form-group">
          <?php echo Form::label('group_id', trans('app.form.group').'*', ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.banner_group'), false); ?>"></i>
          <?php echo Form::select('group_id', $groups, null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.group')]); ?>

          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-4 nopadding-left nopadding-right">
        <div class="form-group">
          <?php echo Form::label('columns', trans('app.form.columns'), ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.bs_columns'), false); ?>"></i>
          <?php echo Form::select('columns', ['4' => 4, '6' => 6, '8' => 8, '12' => 12], isset($banner) ? null : 12, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.columns')]); ?>

          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-4 nopadding-left">
        <div class="form-group">
          <?php echo Form::label('order', trans('app.form.position'), ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.banner_order'), false); ?>"></i>
          <?php echo Form::number('order' , null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.position')]); ?>

          <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleInputFile" class="with-help"> <?php echo e(trans('app.banner_image'), false); ?></label>
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.banner_image'), false); ?>"></i>
      <?php if(isset($banner) && Storage::exists(optional($banner->featuredImage)->path)): ?>
        <img src="<?php echo e(get_storage_file_url(optional($banner->featuredImage)->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.banner_image'), false); ?>">
        <span style="margin-left: 10px;">
          <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

        </span>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-9 nopadding-right">
          <input id="uploadFile" placeholder="<?php echo e(trans('app.banner_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
        </div>
        <div class="col-md-3 nopadding-left">
          <div class="fileUpload btn btn-primary btn-block btn-flat">
            <span><?php echo e(trans('app.form.upload'), false); ?></span>
            <input type="file" name="image" id="uploadBtn" class="upload" />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('bg_color', trans('app.background'), ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.banner_background'), false); ?>"></i>
          <div class="input-group my-colorpicker2 colorpicker-element">
              <?php echo Form::text('bg_color', isset($banner) ? Null : '#ab7553', ['class' => 'form-control', 'placeholder' => trans('app.placeholder.color')]); ?>

            <div class="input-group-addon">
              <i style="background-color: rgb(171, 117, 83);"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 nopadding-left">
        <?php if(isset($banner) && Storage::exists(optional($banner->images->first())->path)): ?>
          <img src="<?php echo e(get_storage_file_url(optional($banner->images->first())->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.banner_image'), false); ?>">
          <span style="margin-left: 10px;">
            <?php echo Form::checkbox('delete_bg_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

          </span>
        <?php endif; ?>
        <div class="form-group">
          <label>&nbsp;</label>
          <span class="spacer10"></span>
          <span>OR</span>
          <input type="file" name="bg_image"  class="indent10" style="display: inline-block;" />
          <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>

    <p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
  </div> <!--/.col-md-9 -->
  <div class="col-md-4 nopadding-left">
    <img src="<?php echo e(asset('images/placeholders/banner_layout.jpg'), false); ?>" width="100%">
  </div> <!--/.col-md-3 -->
</div> <!--/.row -->
<?php /**PATH /home/amraibes/public_html/resources/views/admin/banner/_form.blade.php ENDPATH**/ ?>