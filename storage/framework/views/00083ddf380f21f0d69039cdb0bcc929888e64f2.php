<div class="row">
  <div class="col-md-8">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(isset($product) ? trans('app.update_product') : trans('app.add_product'), false); ?></h3>
          <div class="box-tools pull-right">
            <?php if(!isset($product)): ?>
              <a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.product.upload'), false); ?>" class="ajax-modal-btn btn btn-default btn-flat"><?php echo e(trans('app.bulk_import'), false); ?></a>
            <?php endif; ?>
          </div>
      </div> <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-9 nopadding-right">
            <div class="form-group">
              <?php echo Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.product_name'), false); ?>"></i>
              <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.title'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="col-md-3 nopadding-left">
            <div class="form-group">
              <?php echo Form::label('active', trans('app.form.status').'*', ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.product_active'), false); ?>"></i>
              <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], !isset($product) ? 1 : null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 nopadding-right">
            <div class="form-group">
              <?php echo Form::label('mpn', trans('app.form.mpn'), ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.mpn'), false); ?>"></i>
              <?php echo Form::text('mpn', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.mpn')]); ?>

            </div>
          </div>
          <div class="col-md-4 nopadding">
            <div class="form-group">
              <?php echo Form::label('gtin', trans('app.form.gtin'), ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.gtin'), false); ?>"></i>
              <?php echo Form::text('gtin', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.gtin')]); ?>

            </div>
          </div>
          <div class="col-md-4 nopadding-left">
            <div class="form-group">
              <?php echo Form::label('gtin_type', trans('app.form.gtin_type'), ['class' => 'with-help']); ?>

              <?php echo Form::select('gtin_type', $gtin_types , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.gtin_type')]); ?>

            </div>
          </div>
        </div>

        <div class="form-group">
          <?php echo Form::label('description', trans('app.form.description').'*', ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.product_description'), false); ?>"></i>
          <?php echo Form::textarea('description', null, ['class' => 'form-control summernote', 'rows' => '4', 'placeholder' => trans('app.placeholder.description'), 'required']); ?>

          <div class="help-block with-errors"><?php echo $errors->first('description', ':message'); ?></div>
        </div>

        <div class="form-group">
          <?php echo Form::label('tag_list[]', trans('app.form.tags'), ['class' => 'with-help']); ?>

          <?php echo Form::select('tag_list[]', $tags, null, ['class' => 'form-control select2-tag', 'multiple' => 'multiple']); ?>

        </div>

        <fieldset>
          <legend>
            <?php echo e(trans('app.form.images'), false); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.product_images'), false); ?>"></i>
          </legend>
          <div class="form-group">
            <div class="file-loading">
              <input id="dropzone-input" name="images[]" type="file" accept="image/*" multiple>
            </div>
            <span class="small"><i class="fa fa-info-circle"></i> <?php echo e(trans('help.multi_img_upload_instruction', ['size' => getAllowedMaxImgSize(), 'number' => getMaxNumberOfImgsForInventory()]), false); ?></span>
          </div>
        </fieldset>

        <p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>

        <div class="box-tools pull-right">
          <?php echo Form::submit( isset($product) ? trans('app.form.update') : trans('app.form.save'), ['class' => 'btn btn-flat btn-lg btn-primary']); ?>

        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4 nopadding-left">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('app.organization'), false); ?></h3>
      </div> <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <?php echo Form::label('category_list[]', trans('app.form.categories').'*'); ?>

          <?php echo Form::select('category_list[]', $categories , Null, ['class' => 'form-control select2-normal', 'multiple' => 'multiple', 'required']); ?>

          <div class="help-block with-errors"></div>
        </div>

        <fieldset>
          <legend><?php echo e(trans('app.catalog_rules'), false); ?></legend>
          <div class="form-group">
            <div class="input-group">
              <?php echo e(Form::hidden('has_variant', 0), false); ?>

              <?php echo Form::checkbox('has_variant', null, !isset($product) ? 1 : null, ['id' => 'has_variant', 'class' => 'icheckbox_line']); ?>

              <?php echo Form::label('has_variant', trans('app.form.has_variant')); ?>

              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.has_variant'), false); ?>"></i>
              </span>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <?php echo e(Form::hidden('requires_shipping', 0), false); ?>

              <?php echo Form::checkbox('requires_shipping', null, !isset($product) ? 1 : null, ['id' => 'requires_shipping', 'class' => 'icheckbox_line']); ?>

              <?php echo Form::label('requires_shipping', trans('app.form.requires_shipping')); ?>

              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.requires_shipping'), false); ?>"></i>
              </span>
            </div>
          </div>

          

          <?php if(auth()->user()->isFromplatform()): ?>
            <div class="row">
              <div class="col-md-6 nopadding-right">
                <div class="form-group">
                  <?php echo Form::label('min_price', trans('app.form.catalog_min_price'), ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.catalog_min_price'), false); ?>"></i>
                    <div class="input-group">
                      <span class="input-group-addon"><?php echo e(get_currency_symbol(), false); ?></span>
                      <?php echo Form::number('min_price' , null, ['class' => 'form-control', 'step' => 'any', 'min' => '0','placeholder' => trans('app.placeholder.catalog_min_price')]); ?>

                    </div>
                    <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6 nopadding-left">
                <div class="form-group">
                  <?php echo Form::label('max_price', trans('app.form.catalog_max_price'), ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.catalog_max_price'), false); ?>"></i>
                  <div class="input-group">
                    <span class="input-group-addon"><?php echo e(get_currency_symbol(), false); ?></span>
                    <?php echo Form::number('max_price' , null, ['class' => 'form-control', 'step' => 'any', 'min' => '0', 'placeholder' => trans('app.placeholder.catalog_max_price')]); ?>

                  </div>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </fieldset>

        <fieldset>
          <legend>
            <?php echo e(trans('app.featured_image'), false); ?>

            <i class="fa fa-question-circle small" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.product_featured_image'), false); ?>"></i>
          </legend>
          <?php if(isset($product) && $product->featuredImage): ?>
            <img src="<?php echo e(get_storage_file_url($product->featuredImage->path, 'small'), false); ?>" alt="<?php echo e(trans('app.featured_image'), false); ?>">
            <label>
              <span style="margin-left: 10px;">
                <?php echo Form::checkbox('delete_image', 1, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.delete_image'), false); ?>

              </span>
            </label>
          <?php endif; ?>

          <div class="row">
            <div class="col-md-9 nopadding-right">
               <input id="uploadFile" placeholder="<?php echo e(trans('app.featured_image'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
              </div>
              <div class="col-md-3 nopadding-left">
                <div class="fileUpload btn btn-primary btn-block btn-flat">
                    <span><?php echo e(trans('app.form.upload'), false); ?> </span>
                    <input type="file" name="image" id="uploadBtn" class="upload" />
                </div>
              </div>
          </div>
        </fieldset>

        <fieldset>
          <legend><?php echo e(trans('app.branding'), false); ?></legend>
          <div class="form-group">
              <?php echo Form::label('origin_country', trans('app.form.origin'), ['class' => 'with-help']); ?>

              <?php echo Form::select('origin_country', $countries , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.origin')]); ?>

              <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <?php echo Form::label('brand', trans('app.form.brand'), ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.brand'), false); ?>"></i>
            <?php echo Form::text('brand', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.brand')]); ?>

          </div>

          <div class="form-group">
            <?php echo Form::label('model_number', trans('app.form.model_number'), ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.model_number'), false); ?>"></i>
            <?php echo Form::text('model_number', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.model_number')]); ?>

          </div>

          <div class="form-group">
            <?php echo Form::label('manufacturer_id', trans('app.form.manufacturer'), ['class' => 'with-help']); ?>

            <?php echo Form::select('manufacturer_id', $manufacturers , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.manufacturer')]); ?>

            <div class="help-block with-errors"></div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/product/_form.blade.php ENDPATH**/ ?>