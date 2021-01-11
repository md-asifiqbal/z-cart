<div class="row">
  <div class="col-sm-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']); ?>

      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-sm-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('full_name', trans('app.form.full_name').'*', ['class' => 'with-help']); ?>

      <?php echo Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.full_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('iso_code', trans('app.iso_code').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.country_iso_code'), false); ?>"></i>
      <?php echo Form::text('iso_code', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.iso_code'), isset($country) ? 'disabled' : 'required']); ?>

      <div class="help-block with-errors"><small>https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes</small></div>
    </div>
  </div>

  <div class="col-sm-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('calling_code', trans('app.calling_code'), ['class' => 'with-help']); ?>

      <?php echo Form::text('calling_code', null, ['class' => 'form-control', 'placeholder' => trans('app.calling_code')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('citizenship', trans('app.citizenship'), ['class' => 'with-help']); ?>

      <?php echo Form::text('citizenship', null, ['class' => 'form-control', 'placeholder' => trans('app.citizenship')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-sm-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('capital', trans('app.capital'), ['class' => 'with-help']); ?>

      <?php echo Form::text('capital', null, ['class' => 'form-control', 'placeholder' => trans('app.capital')]); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('timezone', trans('app.form.timezone').'*', ['class' => 'with-help']); ?>

      <?php echo Form::select('timezone_id', $timezones, Null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-sm-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('currency', trans('app.currency').'*', ['class' => 'with-help']); ?>

      <?php echo Form::select('currency_id', $currencies, Null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <div class="input-group">
        <?php echo e(Form::hidden('eea', 0), false); ?>

        <?php echo Form::checkbox('eea', null, null, ['id' => 'eea', 'class' => 'icheckbox_line']); ?>

        <?php echo Form::label('eea', trans('app.eea')); ?>

        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.eea'), false); ?>"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <div class="input-group">
        <?php echo e(Form::hidden('active', 0), false); ?>

        <?php echo Form::checkbox('active', null, isset($country) ? null : 1, ['id' => 'active', 'class' => 'icheckbox_line']); ?>

        <?php echo Form::label('active', trans('app.active')); ?>

        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.country_active'), false); ?>"></i>
        </span>
      </div>
    </div>
  </div>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/country/_form.blade.php ENDPATH**/ ?>