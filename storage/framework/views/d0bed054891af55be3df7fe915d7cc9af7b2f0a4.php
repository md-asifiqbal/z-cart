<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.name') . '*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.coupon_name'), false); ?>"></i>
      <?php echo Form::text('name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('active', trans('app.form.status') . '*', ['class' => 'with-help']); ?>

      <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('code', trans('app.form.code') . '*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.coupon_code'), false); ?>"></i>
      <div class="input-group code-field">
        <?php echo Form::text('code', null, ['class' => 'form-control code', 'placeholder' => trans('app.placeholder.code'), isset($coupon) ? 'disabled' : 'required']); ?>

        <span class="input-group-btn">
          <button id="coupon" class="btn btn-lg btn-default generate-code" type="button" <?php echo e(isset($coupon) ? 'disabled' : '', false); ?>><i class="fa fa-rocket"></i> Generate</button>
        </span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('value', trans('app.form.coupon_value') . '*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.coupon_value'), false); ?>"></i>
      <div class="input-group">
        <?php echo Form::number('value' , null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.coupon_value'), 'required']); ?>

        <?php echo Form::select('type', ['amount' => config('system_settings.currency_symbol') ?: '$', 'percent' => trans('app.percent')], null, ['class' => 'selectpicker']); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('quantity', trans('app.form.coupon_quantity') . '*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.coupon_quantity'), false); ?>"></i>
      <?php echo Form::number('quantity' , null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.quantity'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-md-4 nopadding">
    <div class="form-group">
      <?php echo Form::label('min_order_amount', trans('app.form.coupon_min_order_amount'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.coupon_min_order_amount'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
        <?php echo Form::number('min_order_amount' , null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.coupon_min_order_amount')]); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('quantity_per_customer', trans('app.form.coupon_quantity_per_customer'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.coupon_quantity_per_customer'), false); ?>"></i>
      <?php echo Form::number('quantity_per_customer' , !isset($coupon) ? 1 : null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.coupon_quantity_per_customer')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('description', trans('app.form.description')); ?>

  <?php echo Form::textarea('description', null, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.description')]); ?>

</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <div class="input-group">
        <?php echo Form::checkbox('for_limited_shipping_zones', null, (isset($coupon) && $coupon->forLimitedZone()), ['id' => 'for_limited_shipping_zones', 'class' => 'icheckbox_line']); ?>

        <?php echo Form::label('for_limited_shipping_zones', trans('app.form.limited_to_shipping_zone')); ?>

        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.coupon_limited_to_shipping_zones'), false); ?>"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <div class="input-group">
        <?php echo Form::checkbox('for_limited_customer', null, (isset($coupon) && $coupon->forLimitedCustomer()), ['id' => 'for_limited_customer', 'class' => 'icheckbox_line']); ?>

        <?php echo Form::label('for_limited_customer', trans('app.form.limited_to_customer')); ?>

        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.coupon_limited_to_customers'), false); ?>"></i>
        </span>
      </div>
    </div>
  </div>
</div>

<div id="zones_field" class="<?php echo e((isset($coupon) && $coupon->forLimitedZone()) ? 'show' : 'hidden', false); ?>">
    <div class="form-group">
      <?php echo Form::label('zone_list[]', trans('app.form.shipping_zones').'*', ['class' => 'with-help']); ?>

      <?php echo Form::select('zone_list[]', $shipping_zones , Null, ['id' => 'zone_list_field', 'class' => 'form-control select2-normal', 'multiple' => 'multiple']); ?>

      <div class="help-block with-errors"></div>
    </div>
</div>

<div id="customers_field" class="<?php echo e((isset($coupon) && $coupon->forLimitedCustomer()) ? 'show' : 'hidden', false); ?>">

  <?php echo $__env->make('admin.partials._search_customer_multiple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('starting_time', trans('app.form.starting_time') . '*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.starting_time'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <?php echo Form::text('starting_time', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.starting_time'), 'required']); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('ending_time', trans('app.form.ending_time') . '*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.ending_time'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <?php echo Form::text('ending_time', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.ending_time'), 'required']); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>


<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/coupon/_form.blade.php ENDPATH**/ ?>