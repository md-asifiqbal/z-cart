<?php
  $basedOn = isset($shipping_rate) ? $shipping_rate->based_on : $basedOn;
?>

<div class="form-group">
  <?php echo Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.shipping_rate_name'), false); ?>"></i>
  <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.name'), 'required']); ?>

  <div class="help-block with-errors"><?php echo e(trans('help.customer_will_see_this'), false); ?></div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('carrier_id', trans('app.form.carrier'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.shipping_zone_carrier'), false); ?>"></i>
      <?php echo Form::select('carrier_id', $carriers, null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.carrier')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('delivery_takes', trans('app.form.delivery_takes').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.shipping_rate_delivery_takes'), false); ?>"></i>
      <?php echo Form::text('delivery_takes', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.delivery_takes'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('minimum', trans('app.form.shipping_range_minimum', ['basedOn' => $basedOn]) . '*'); ?>

      <div class="input-group">
        <?php if('price' == $basedOn): ?>
          <span class="input-group-addon">
            <?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?>

          </span>
        <?php endif; ?>
        <?php echo Form::number('minimum', isset($shipping_rate) ? Null : 0.0, ['class' => 'form-control', 'step' => 'any', 'min' => '0', 'placeholder' => trans('app.placeholder.minimum'), 'required']); ?>

        <?php if('weight' == $basedOn): ?>
          <span class="input-group-addon">
            <?php echo e(config('system_settings.weight_unit') ?: 'g', false); ?>

          </span>
        <?php endif; ?>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('maximum', trans('app.form.shipping_range_maximum', ['basedOn' => $basedOn]) . '*'); ?>

      <div class="input-group">
        <?php if('price' == $basedOn): ?>
          <span class="input-group-addon">
              <?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?>

          </span>
        <?php endif; ?>
        <?php echo Form::number('maximum' , (isset($shipping_rate) || 'price' == $basedOn) ? Null : 100, ['class' => 'form-control', 'step' => 'any', 'min' => '0', 'placeholder' => trans('app.placeholder.and_up'), 'price' == $basedOn ? '' : 'required']); ?>

        <?php if('weight' == $basedOn): ?>
          <span class="input-group-addon">
              <?php echo e(config('system_settings.weight_unit') ?: 'g', false); ?>

          </span>
        <?php endif; ?>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('rate', trans('app.form.shipping_rate') . '*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.shipping_rate'), false); ?>"></i>
      <div class="input-group">
          <span class="input-group-addon">
              <?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?>

          </span>
          <?php echo Form::number('rate' , isset($shipping_rate) ? $shipping_rate->rate : Null, ['id' => 'shipping_rate_amount', 'class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_rate_amount'), (isset($shipping_rate) && $shipping_rate->rate == 0) ? 'disabled' : 'required']); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <label class="with-help">&nbsp;</label>
      <?php echo Form::checkbox('free_shipping', 1, (isset($shipping_rate) && $shipping_rate->rate == 0) ? 1 : Null, ['id' => 'free_shipping_checkbox', 'class' => 'icheckbox_line']); ?>

      <?php echo Form::label('free_shipping', strtoupper(trans('app.free_shipping')), ['class' => 'indent5']); ?>

    </div>
  </div>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/shipping_rate/_form.blade.php ENDPATH**/ ?>