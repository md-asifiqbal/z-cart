<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <?php echo Form::model($shop, ['method' => 'PUT', 'route' => ['admin.vendor.shop.update', $shop->id], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.form.form'), false); ?>

        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-8 nopadding-right">
                <div class="form-group">
                  <?php echo Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_name'), false); ?>"></i>
                  <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shop_name'), 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-4 nopadding-left">
                <div class="form-group">
                  <?php echo Form::label('active', trans('app.form.status'), ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_status'), false); ?>"></i>
                  <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status')]); ?>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 nopadding-right">
                <div class="form-group">
                  <?php echo Form::label('legal_name', trans('app.form.legal_name'). '*', ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_legal_name'), false); ?>"></i>
                  <?php echo Form::text('legal_name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shop_legal_name'), 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6 nopadding-left">
                <div class="form-group">
                  <?php echo Form::label('timezone_id', trans('app.form.timezone'), ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_timezone'), false); ?>"></i>
                  <?php echo Form::select('timezone_id', $timezones , isset($shop) ? Null : config('system_settings.timezone_id'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.timezone')]); ?>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 nopadding-right">
                <div class="form-group">
                  <?php echo Form::label('email', trans('app.form.email_address'). '*', ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_email'), false); ?>"></i>
                  <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="col-md-6 nopadding-left">
                <div class="form-group">
                  <?php echo Form::label('external_url', trans('app.form.external_url'), ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_external_url'), false); ?>"></i>
                  <?php echo Form::text('external_url', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.external_url')]); ?>

                </div>
              </div>
            </div>

            <div class="form-group">
              <?php echo Form::label('description', trans('app.form.description'), ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shop_description'), false); ?>"></i>
              <?php echo Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.description')]); ?>

            </div>

            <div class="row">
              <div class="col-md-6 nopadding-right">
                <div class="form-group">
                  <?php echo Form::label('exampleInputFile', trans('app.form.logo'), ['class' => 'with-help']); ?>

                  <?php if(isset($shop) && Storage::exists(optional($shop->logo)->path)): ?>
                  <label>
                    <img src="<?php echo e(get_storage_file_url($shop->logo->path, 'small'), false); ?>" alt="<?php echo e(trans('app.logo'), false); ?>">
                    <span style="margin-left: 10px;">
                      <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_logo'), false); ?>

                    </span>
                  </label>
                  <?php endif; ?>
                  <div class="row">
                    <div class="col-md-9 nopadding-right">
                      <input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.logo'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
                        <div class="help-block with-errors"><?php echo e(trans('help.logo_img_size'), false); ?></div>
                    </div>
                    <div class="col-md-3 nopadding-left">
                      <div class="fileUpload btn btn-primary btn-block btn-flat">
                          <span><?php echo e(trans('app.form.upload'), false); ?></span>
                          <input type="file" name="image" id="uploadBtn" class="upload" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 nopadding-left">
                <div class="form-group">
                  <?php echo Form::label('exampleInputFile', trans('app.form.cover_img'), ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.cover_img', ['page' => trans('app.shop')]), false); ?>"></i>
                  <?php if(isset($shop) && Storage::exists(optional($shop->featuredImage)->path)): ?>
                    <label>
                      <img src="<?php echo e(get_storage_file_url(optional($shop->featuredImage)->path, 'small'), false); ?>" width="" alt="<?php echo e(trans('app.cover_image'), false); ?>">
                      <span style="margin-left: 10px;">
                        <?php echo Form::checkbox('delete_cover_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

                      </span>
                    </label>
                  <?php endif; ?>
                  <div class="row">
                      <div class="col-md-9 nopadding-right">
                        <input id="uploadFile1" placeholder="<?php echo e(trans('app.placeholder.cover_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
                        <div class="help-block with-errors"><?php echo e(trans('help.cover_img_size'), false); ?></div>
                      </div>
                      <div class="col-md-3 nopadding-left">
                        <div class="fileUpload btn btn-primary btn-block btn-flat">
                            <span><?php echo e(trans('app.form.upload'), false); ?> </span>
                            <input type="file" name="cover_image" id="uploadBtn1" class="upload" />
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/shop/_edit.blade.php ENDPATH**/ ?>