
 <?php if(isset($inventory)): ?>
   <?php
    $product = $inventory->product;
   ?>
<?php endif; ?>

<?php echo e(Form::hidden('product', $product), false); ?>


<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <?php echo Form::label('title', trans('app.form.title').'*'); ?>

      <?php echo Form::text('title', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.title'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('warehouse_id', trans('app.form.warehouse'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.select_warehouse'), false); ?>"></i>
      <?php echo Form::select('warehouse_id', $warehouses, null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]); ?>

    </div>
  </div>
  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('supplier_id', trans('app.form.supplier'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.select_supplier'), false); ?>"></i>
      <?php echo Form::select('supplier_id', $suppliers, null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]); ?>

    </div>
  </div>
  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('available_from', trans('app.form.available_from'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.available_from'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <?php echo Form::text('available_from', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.available_from')]); ?>

      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('active', trans('app.form.status').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.seller_inventory_status'), false); ?>"></i>
      <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], 1, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<?php if($product->requires_shipping): ?>
  <div class="row">
    <div class="col-lg-3 col-md-6 nopadding-right">
      <div class="form-group">
        <?php echo Form::label('min_order_quantity', trans('app.form.min_order_quantity'), ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.min_order_quantity'), false); ?>"></i>
        <?php echo Form::number('min_order_quantity', isset($inventory) ? null : 1, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.min_order_quantity')]); ?>

      </div>
    </div>
    <div class="col-lg-3 col-md-6 nopadding-left">
      <div class="form-group">
        <?php echo Form::label('shipping_weight', trans('app.form.shipping_weight'), ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shipping_weight'), false); ?>"></i>
        <div class="input-group">
          <?php echo Form::number('shipping_weight', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_weight')]); ?>

          <span class="input-group-addon"><?php echo e(config('system_settings.weight_unit') ?: 'gm', false); ?></span>
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 nopadding-right">
      <div class="form-group">
        <label class="with-help">&nbsp;</label>
        <div class="input-group">
          <?php echo e(Form::hidden('free_shipping', 0), false); ?>

          <?php echo Form::checkbox('free_shipping', null, null, ['id' => 'free_shipping', 'class' => 'icheckbox_line']); ?>

          <?php echo Form::label('free_shipping', trans('app.form.free_shipping')); ?>

          <span class="input-group-addon" id="">
            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.free_shipping'), false); ?>"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 nopadding-left">
      <div class="form-group">
        <?php echo Form::label('packaging_list[]', trans('app.form.packaging'), ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.select_packagings'), false); ?>"></i>
        <?php echo Form::select('packaging_list[]', $packagings , isset($inventory) ? null : config('shop_settings.default_packaging_ids'), ['class' => 'form-control select2-normal', 'multiple' => 'multiple']); ?>

      </div>
    </div>
  </div>
<?php endif; ?>

<fieldset>
  <legend><?php echo e(trans('app.variants'), false); ?></legend>
  <table class="table table-default" id="variantsTable">
    <thead>
      <tr>
        <th><?php echo e(trans('app.sl_number'), false); ?></th>
        <th><?php echo e(trans('app.form.variants'), false); ?>

          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.variants'), false); ?>"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><?php echo e(trans('app.form.image'), false); ?>

          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.variant_image'), false); ?>"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><?php echo e(trans('app.form.sku'), false); ?>

          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.sku'), false); ?>"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><?php echo e(trans('app.form.condition'), false); ?>

          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.seller_product_condition'), false); ?>"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><?php echo e(trans('app.form.stock_quantity'), false); ?>

          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.stock_quantity'), false); ?>"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><?php echo e(trans('app.form.purchase_price'), false); ?>

          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.purchase_price'), false); ?>"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><?php echo e(trans('app.form.sale_price'), false); ?>

          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.sale_price'), false); ?>"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><?php echo e(trans('app.form.offer_price'), false); ?>

          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.offer_price'), false); ?>"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><i class="fa fa-trash-o"></i></th>
      </tr>
    </thead>
    <tbody style="zoom: 0.80;">
      <?php
        $i = 0;
      ?>
      <?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><div class="form-group"><?php echo e($i + 1, false); ?></div></td>
          <td>
            <div class="form-group">
            <?php $__currentLoopData = $combination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrId => $attrValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e(Form::hidden('variants['. $i .']['. $attrId .']', key($attrValue)), false); ?>

              <?php echo e($attributes[$attrId] .' : '. current($attrValue), false); ?>

              <?php echo e(($attrValue !== end($combination))?'; ':'', false); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </td>
          <td>
            <div class="form-group">
              <label class="img-btn-sm">
                <?php echo e(Form::file('image['. $i .']'), false); ?>

                <span><?php echo e(trans('app.placeholder.image'), false); ?></span>
              </label>
            </div>
          </td>
          <td>
            <div class="form-group">
              <?php echo Form::text('sku['. $i .']', null, ['class' => 'form-control sku', 'placeholder' => trans('app.placeholder.sku'), 'required']); ?>

            </div>
          </td>
          <td>
            <div class="form-group">
              <?php echo Form::select('condition['. $i .']', ['New' => trans('app.new'), 'Used' => trans('app.used'), 'Refurbished' => trans('app.refurbished')], null, ['class' => 'form-control condition', 'required']); ?>

            </div>
          </td>
          <td>
            <div class="form-group">
              <?php echo Form::number('stock_quantity['. $i .']', null, ['class' => 'form-control quantity', 'placeholder' => trans('app.placeholder.stock_quantity'), 'required']); ?>

            </div>
          </td>
          <td>
            <div class="form-group">
              <?php echo Form::number('purchase_price['. $i .']', null, ['class' => 'form-control purchasePrice', 'step' => 'any', 'placeholder' => trans('app.placeholder.purchase_price')]); ?>

            </div>
          </td>
          <td>
            <div class="form-group">
              <?php echo Form::number('sale_price['. $i .']', null, ['class' => 'form-control salePrice', 'step' => 'any', 'placeholder' => trans('app.placeholder.sale_price'), 'required']); ?>

            </div>
          </td>
          <td>
            <div class="form-group">
              <?php echo Form::number('offer_price['. $i .']', null, ['class' => 'form-control offerPrice', 'step' => 'any', 'placeholder' => trans('app.placeholder.offer_price')]); ?>

            </div>
          </td>
          <td>
            <div class="form-group text-muted">
              <i class="fa fa-close deleteThisRow" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.delete_this_combination'), false); ?>"></i>
            </div>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</fieldset>

<fieldset id="offerDates" hidden>
  <legend><?php echo e(trans('app.offer_dates'), false); ?></legend>
  <div class="row">
    <div class="col-lg-3 col-md-6 nopadding-right">
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
    <div class="col-lg-3 col-md-6 nopadding-left">
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
</fieldset>

<div class="spacer30"></div>

<?php echo $__env->make('admin.inventory._common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="form-group">
  <?php echo Form::label('linked_items[]', trans('app.form.linked_items'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.inventory_linked_items'), false); ?>"></i>
  <?php echo Form::select('linked_items[]', $inventories , Null, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']); ?>

  <div class="help-block with-errors"></div>
</div>

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

  </div>

  <div class="form-group">
    <?php echo Form::label('meta_title', trans('app.form.meta_title'), ['class' => 'with-help']); ?>

    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.meta_title'), false); ?>"></i>
    <?php echo Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.meta_title')]); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('meta_description', trans('app.form.meta_description'), ['class' => 'with-help']); ?>

    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.meta_description'), false); ?>"></i>
    <?php echo Form::text('meta_description', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.meta_description')]); ?>

  </div>
</fieldset>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/inventory/_formWithVariant.blade.php ENDPATH**/ ?>