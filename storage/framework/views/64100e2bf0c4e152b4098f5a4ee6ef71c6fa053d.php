<div class="row">
  <div class="col-md-8">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(isset($inventory) ? trans('app.update_inventory') : trans('app.add_inventory'), false); ?></h3>
      </div> <!-- /.box-header -->
      <div class="box-body">
        <?php echo $__env->make('admin.partials._product_widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php
          if( isset($inventory) ) {
            $product = $inventory->product;
          }

          $requires_shipping = $product->requires_shipping || (isset($inventory) && $inventory->product->requires_shipping);

          $title_classes = isset($inventory) ? 'form-control' : 'form-control makeSlug';
        ?>

        <?php echo e(Form::hidden('product_id', $product->id), false); ?>

        <?php echo e(Form::hidden('brand', $product->brand), false); ?>


        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <?php echo Form::label('title', trans('app.form.title').'*'); ?>

              <?php echo Form::text('title', null, ['class' => $title_classes, 'placeholder' => trans('app.placeholder.title'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
          </div>

          <div class="col-md-7 nopadding-right">
            <div class="form-group">
              <?php echo Form::label('sku', trans('app.form.sku').'*', ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.sku'), false); ?>"></i>
              <?php echo Form::text('sku', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.sku'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
          </div>

          <div class="col-md-3 nopadding">
            <div class="form-group">
              <?php echo Form::label('condition', trans('app.form.condition').'*', ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.seller_product_condition'), false); ?>"></i>
              <?php echo Form::select('condition', ['New' => trans('app.new'), 'Used' => trans('app.used'), 'Refurbished' => trans('app.refurbished')], isset($inventory) ? null : 'New', ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
          </div>

          <div class="col-md-2 nopadding-left">
            <div class="form-group">
              <?php echo Form::label('active', trans('app.form.status').'*', ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.seller_inventory_status'), false); ?>"></i>
              <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], isset($inventory) ? null : 1, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>

        <?php echo $__env->make('admin.inventory._common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <fieldset>
          <legend><?php echo e(trans('app.form.images'), false); ?></legend>
          <div class="form-group">
            <div class="file-loading">
              <input id="dropzone-input" name="images[]" type="file" accept="image/*" multiple>
            </div>
            <span class="small"><i class="fa fa-info-circle"></i> <?php echo e(trans('help.multi_img_upload_instruction', ['size' => getAllowedMaxImgSize(), 'number' => getMaxNumberOfImgsForInventory()]), false); ?></span>
          </div>
        </fieldset>

        <fieldset>
          <legend><?php echo e(trans('app.inventory_rules'), false); ?></legend>
          <?php if($requires_shipping): ?>
            <div class="row">
              <div class="col-md-6 nopadding-right">
                <div class="form-group">
                  <?php echo Form::label('stock_quantity', trans('app.form.stock_quantity').'*', ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.stock_quantity'), false); ?>"></i>
                  <?php echo Form::number('stock_quantity', isset($inventory) ? null : 1, ['min' => 0, 'class' => 'form-control', 'placeholder' => trans('app.placeholder.stock_quantity'), 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="col-md-6 nopadding-left">
                <div class="form-group">
                  <?php echo Form::label('min_order_quantity', trans('app.form.min_order_quantity'), ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.min_order_quantity'), false); ?>"></i>
                  <?php echo Form::number('min_order_quantity', isset($inventory) ? null : 1, ['min' => 1, 'class' => 'form-control', 'placeholder' => trans('app.placeholder.min_order_quantity')]); ?>

                </div>
              </div>
            </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-md-6 nopadding-right">
              <div class="form-group">
                <?php echo Form::label('sale_price', trans('app.form.sale_price').'*', ['class' => 'with-help']); ?>

                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.sale_price'), false); ?>"></i>
                <div class="input-group">
                  <span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
                  <input name="sale_price" value="<?php echo e(isset($inventory) ? $inventory->sale_price : Null, false); ?>" type="number" min="<?php echo e($product->min_price, false); ?>" <?php echo e($product->max_price ? ' max="'. $product->max_price .'"' : '', false); ?> step="any" placeholder="<?php echo e(trans('app.placeholder.sale_price'), false); ?>" class="form-control" required="required">
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-6 nopadding-left">
              <div class="form-group">
                <?php echo Form::label('offer_price', trans('app.form.offer_price'), ['class' => 'with-help']); ?>

                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.offer_price'), false); ?>"></i>
                <div class="input-group">
                  <span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
                  <?php echo Form::number('offer_price', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.offer_price')]); ?>

                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 nopadding-right">
              <div class="form-group">
                <?php echo Form::label('offer_start', trans('app.form.offer_start'), ['class' => 'with-help']); ?>

                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.offer_start'), false); ?>"></i>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <?php echo Form::text('offer_start', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.offer_start')]); ?>

                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>

            <div class="col-md-6 nopadding-left">
              <div class="form-group">
                <?php echo Form::label('offer_end', trans('app.form.offer_end'), ['class' => 'with-help']); ?>

                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.offer_end'), false); ?>"></i>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <?php echo Form::text('offer_end', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.offer_end')]); ?>

                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <?php echo Form::label('linked_items[]', trans('app.form.linked_items'), ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.inventory_linked_items'), false); ?>"></i>
            <?php echo Form::select('linked_items[]', $inventories , isset($inventory) ? unserialize($inventory->linked_items) : Null, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']); ?>

            <div class="help-block with-errors"></div>
          </div>
        </fieldset>

        <p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>

        <?php if(isset($inventory)): ?>
          <a href="<?php echo e(route('admin.stock.inventory.index'), false); ?>" class="btn btn-default btn-flat"><?php echo e(trans('app.form.cancel_update'), false); ?></a>
        <?php endif; ?>

        <?php echo Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-lg btn-new pull-right']); ?>

      </div>
    </div>
  </div><!-- /.col-md-8 -->

  <div class="col-md-4 nopadding-left">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('app.additional_info'), false); ?></h3>
      </div> <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <?php echo Form::label('available_from', trans('app.form.available_from'), ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.available_from'), false); ?>"></i>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <?php echo Form::text('available_from', null, ['class' => 'datetimepicker form-control', 'placeholder' => trans('app.placeholder.available_from')]); ?>

          </div>
        </div>

        <?php if($requires_shipping): ?>
          <fieldset>
            <legend><?php echo e(trans('app.shipping'), false); ?></legend>
            <div class="form-group">
              <div class="input-group">
                <?php echo e(Form::hidden('free_shipping', 0), false); ?>

                <?php echo Form::checkbox('free_shipping', null, null, ['id' => 'free_shipping', 'class' => 'icheckbox_line']); ?>

                <?php echo Form::label('free_shipping', trans('app.form.free_shipping')); ?>

                <span class="input-group-addon" id="">
                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.free_shipping'), false); ?>"></i>
                </span>
              </div>
            </div>

            <div class="form-group">
              <?php echo Form::label('warehouse_id', trans('app.form.warehouse'), ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.select_warehouse'), false); ?>"></i>
              <?php echo Form::select('warehouse_id', $warehouses, isset($inventory) ? null : config('shop_settings.default_warehouse_id'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]); ?>

            </div>

            <div class="form-group">
              <?php echo Form::label('shipping_weight', trans('app.form.shipping_weight'), ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shipping_weight'), false); ?>"></i>
              <div class="input-group">
                <?php echo Form::number('shipping_weight', null, ['class' => 'form-control', 'step' => 'any', 'min' => 0, 'placeholder' => trans('app.placeholder.shipping_weight')]); ?>

                <span class="input-group-addon"><?php echo e(config('system_settings.weight_unit') ?: 'gm', false); ?></span>
              </div>
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <?php echo Form::label('packaging_list[]', trans('app.form.packagings'), ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.select_packagings'), false); ?>"></i>
              <?php echo Form::select('packaging_list[]', $packagings , isset($inventory) ? null : config('shop_settings.default_packaging_ids'), ['class' => 'form-control select2-normal', 'multiple' => 'multiple']); ?>

            </div>
          </fieldset>
        <?php endif; ?>

        <?php if(count($attributes)): ?>
          <fieldset class="collapsible">
            <legend><?php echo e(trans('app.attributes'), false); ?></legend>
            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="form-group">
                <?php echo Form::label($attribute->name, $attribute->name); ?>


                <select class = "form-control select2" id="<?php echo e($attribute->name, false); ?>" name="variants[<?php echo e($attribute->id, false); ?>]" placeholder = <?php echo e(trans('app.placeholder.select'), false); ?>>

                  <option value=""><?php echo e(trans('app.placeholder.select'), false); ?></option>

                  <?php $__currentLoopData = $attribute->attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($attributeValue->id, false); ?>"
                      <?php if(isset($inventory) && count($inventory->attributes)): ?>
                        <?php echo e(in_array($attributeValue->id, $inventory->attributeValues->pluck('id')->toArray()) ? 'selected' : '', false); ?>

                      <?php endif; ?>
                    >
                      <?php echo e($attributeValue->value, false); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </fieldset>
        <?php endif; ?>

        <fieldset>
          <legend><?php echo e(trans('app.reporting'), false); ?></legend>
          <div class="form-group">
            <?php echo Form::label('purchase_price', trans('app.form.purchase_price'), ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.purchase_price'), false); ?>"></i>
            <div class="input-group">
              <span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
              <?php echo Form::number('purchase_price', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.purchase_price')]); ?>

            </div>
          </div>
          <?php if($requires_shipping): ?>
            <div class="form-group">
              <?php echo Form::label('supplier_id', trans('app.form.supplier'), ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.select_supplier'), false); ?>"></i>
              <?php echo Form::select('supplier_id', $suppliers, isset($inventory) ? null : config('shop_settings.default_supplier_id'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]); ?>

            </div>
          <?php endif; ?>
        </fieldset>

        <fieldset>
          <legend><?php echo e(trans('app.seo'), false); ?></legend>
          <div class="form-group">
            <?php echo Form::label('slug', trans('app.form.slug').'*', ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.slug'), false); ?>"></i>
            <?php echo Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => 'SEO Friendly URL', 'required']); ?>

            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <?php echo Form::label('tag_list[]', trans('app.form.tags'), ['class' => 'with-help']); ?>

            <?php echo Form::select('tag_list[]', $tags, null, ['class' => 'form-control select2-tag', 'multiple' => 'multiple']); ?>

            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <?php echo Form::label('meta_title', trans('app.form.meta_title'), ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.meta_title'), false); ?>"></i>
            <?php echo Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.meta_title')]); ?>

            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <?php echo Form::label('meta_description', trans('app.form.meta_description'), ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.meta_description'), false); ?>"></i>
            <?php echo Form::text('meta_description', null, ['class' => 'form-control', 'maxlength' => config('seo.meta.description_character_limit', '160'), 'placeholder' => trans('app.placeholder.meta_description')]); ?>

            <div class="help-block with-errors"><small><i class="fa fa-info-circle"></i> <?php echo e(trans('help.max_chat_allowed', ['size' => config('seo.meta.description_character_limit', '160')]), false); ?></small></div>
          </div>
        </fieldset>
      </div>
    </div>
  </div><!-- /.col-md-4 -->
</div><!-- /.row --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/inventory/_form.blade.php ENDPATH**/ ?>