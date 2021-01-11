<?php if((isset($addressable_type) && $addressable_type == 'App\Customer') || (isset($address) && $address->address_type != 'Primary')): ?>
    <div class="form-group">
        <?php echo Form::label('address_title', trans('app.form.address_title')); ?>

        <?php echo Form::text('address_title', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.address_title')]); ?>

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('address_type', trans('app.form.address_type')); ?>

            <?php $__currentLoopData = $address_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <label class="radio-inline col-md-3 nopadding">
                <?php echo Form::radio('address_type', $address_type, null, ['class' => 'icheck', 'required']); ?> <?php echo e($address_type, false); ?>

              </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>
    <br/>
<?php endif; ?>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('address_line_1', trans('app.form.address_line_1')); ?>

      <?php echo Form::text('address_line_1', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.address_line_1')]); ?>

    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('address_line_2', trans('app.form.address_line_2')); ?>

      <?php echo Form::text('address_line_2', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.address_line_2')]); ?>

    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('city', trans('app.form.city')); ?>

      <?php echo Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.city')]); ?>

    </div>
  </div>
  <div class="col-md-4 sm-padding">
    <div class="form-group">
      <?php echo Form::label('zip_code', trans('app.form.zip_code')); ?>

      <?php echo Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.zip_code')]); ?>

    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('phone', trans('app.form.phone')); ?>

      <?php echo Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.phone_number')]); ?>

    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('country_id', trans('app.form.country')); ?>

      <?php echo Form::select('country_id', $countries , isset($address) ? $address->country_id : config('system_settings.address_default_country'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.country')]); ?>

    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('state_id', trans('app.form.state')); ?>

      <?php echo Form::select('state_id', $states , isset($address) ? $address->sate_id : config('system_settings.address_default_state'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.state')]); ?>

    </div>
  </div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/address/_form.blade.php ENDPATH**/ ?>