<div class="form-group">
  <?php echo Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.subscription_name'), false); ?>"></i>
  <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.subscription_name'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<div class="form-group">
  <?php echo Form::label('plan_id', trans('app.form.subscription_plan_id').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.subscription_plan_id'), false); ?>"></i>
  <?php echo Form::text('plan_id', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.subscription_plan_id'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('cost', trans('app.form.cost_per_month').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.subscription_cost'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
        <?php echo Form::number('cost', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.subscription_cost'), 'required']); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <label class="with-help">&nbsp;</label>
    <div class="form-group">
      <div class="input-group">
        <?php echo e(Form::hidden('featured', 0), false); ?>

        <?php echo Form::checkbox('featured', null, null, ['id' => 'featured', 'class' => 'icheckbox_line']); ?>

        <?php echo Form::label('featured', trans('app.form.featured')); ?>

        <span class="input-group-addon" id="basic-addon1">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.featured_subscription'), false); ?>"></i>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('team_size', trans('app.form.team_size').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.team_size'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-users"></i></span>
        <?php echo Form::number('team_size', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.team_size'), 'required']); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('inventory_limit', trans('app.form.inventory_limit').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.inventory_limit'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
        <?php echo Form::number('inventory_limit', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.inventory_limit'), 'required']); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('marketplace_commission', trans('app.form.marketplace_commission').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.marketplace_commission'), false); ?>"></i>
      <div class="input-group">
        <?php echo Form::number('marketplace_commission', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.marketplace_commission'), 'required']); ?>

        <span class="input-group-addon"><?php echo e(trans('app.percent'), false); ?></span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('transaction_fee', trans('app.form.transaction_fee').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.transaction_fee'), false); ?>"></i>
      <div class="input-group">
        <span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
        <?php echo Form::number('transaction_fee', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.transaction_fee'), 'required']); ?>

      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('best_for', trans('app.form.best_for'), ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.subscription_best_for'), false); ?>"></i>
  <?php echo Form::text('best_for', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.subscription_best_for')]); ?>

</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/subscription_plan/_form.blade.php ENDPATH**/ ?>