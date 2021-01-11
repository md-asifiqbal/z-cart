<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.shipping_zone_name'), false); ?>"></i>
      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.name'), 'required']); ?>

      <div class="help-block with-errors"><?php echo e(trans('help.customer_not_see_this'), false); ?></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('active', trans('app.form.status').'*', ['class' => 'with-help']); ?>

      <?php echo Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('country_ids', trans('app.form.country').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.shipping_zone_select_countries'), false); ?>"></i>
      <?php echo Form::select('country_ids[]', $countries , null, ['id' => 'country_ids', 'class' => 'form-control select2-multi', 'multiple' => 'multiple', (isset($shipping_zone) && $shipping_zone->rest_of_the_world) ? 'disabled' : 'required']); ?>

      <div class="help-block with-errors">
        <?php echo Form::checkbox('rest_of_the_world', 1, null, ['id' => 'rest_of_the_world', 'class' => 'icheck']); ?> <?php echo e(trans('app.rest_of_the_world'), false); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.rest_of_the_world'), false); ?>"></i>
      </div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('tax_id', trans('app.form.tax').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.shipping_zone_tax'), false); ?>"></i>
      <?php echo Form::select('tax_id', $taxes, null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.tax'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/shipping_zone/_form.blade.php ENDPATH**/ ?>