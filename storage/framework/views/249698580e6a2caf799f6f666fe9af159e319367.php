<?php
  $user = auth()->user();
  $merchant_user = $user->merchantId();
  $special_role = isset($role) && $role->isSpecial() ? TRUE : FALSE;
?>

<div class="row">
  <div class="col-md-<?php echo e($merchant_user ? '8' : '5', false); ?> nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.role_name'), false); ?>"></i>
      <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.role_name'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>

  <?php if (! ($merchant_user)): ?>
    <div class="col-md-3 nopadding">
      <div class="form-group">
        <?php echo Form::label('public', trans('app.form.role_type').'*', ['class' => 'with-help']); ?>

        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($special_role ? trans('help.cant_edit_special_role') : trans('help.role_type'), false); ?>">
        </i>
        <?php echo e(Form::hidden('public', Null), false); ?>

        <?php echo Form::select('public', ['0' => trans('app.platform'), '1' => trans('app.merchant')], Null, ['id' => $special_role ? '' : 'user-role-status', 'class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), $special_role ? 'disabled' : 'required' ]); ?>

        <div class="help-block with-errors"></div>
      </div>
    </div>
  <?php endif; ?>

  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('level', trans('app.form.role_level'), ['class' => 'with-help']); ?>

      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($user->accessLevel() ? trans('help.role_level') : trans('help.you_cant_set_role_level'), false); ?>"></i>
      <?php if($user->accessLevel()): ?>
        <div class="pull-right"> <i class="fa fa-info"></i> <?php echo e(trans('help.number_between', ['min' => $user->accessLevel(), 'max' => config('system_settings.max_role_level')]), false); ?></div>
      <?php endif; ?>
      <?php echo Form::number('level', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.role_level'), 'min' => $user->accessLevel(), 'max' => config('system_settings.max_role_level'), $user->accessLevel() ? '' : 'disabled']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('description', trans('app.form.description')); ?>

  <?php echo Form::textarea('description', null, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.description')]); ?>

</div>

<div class="form-group">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>
            <?php echo Form::label('modules', trans('app.modules'), ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.permission_modules'), false); ?>"></i>
          </th>
          <th>
            <?php echo Form::label('permissions', trans('app.form.permissions'), ['class' => 'with-help']); ?>

            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.set_role_permissions'), false); ?>"></i>
          </th>
        </tr>
      </thead>
    </table>
    <table class="table table-striped" id="tbl-permissions">
      <tbody>
        <?php
          $role_permissions = isset($role) ? $role->permissions()->pluck('slug')->toArray() : [];
        ?>
        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $access_level = Str::snake($module->access);
            $module_name = Str::snake($module->name);
            $module_enabled = find_string_in_array($role_permissions, $module_name);
          ?>
          <tr class="<?php echo e($access_level . '-module', false); ?>"
            <?php echo e(('common' == $access_level || ('merchant' == $access_level && $merchant_user) ||
                isset($role) &&
                (
                  ($role->public == 1 && 'merchant' == $access_level) ||
                  ($role->id == config('installation.seed.merchant_role_id') && 'merchant' == $access_level) ||
                  ($role->public == 0 && 'platform' == $access_level && $role->id != config('installation.seed.merchant_role_id'))
                )
              ) ? 'show' : 'hidden', false); ?>>
            <td>
              <div class="input-group">
                <?php echo e(Form::hidden($module_name, 0), false); ?>

                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.module.name', ['module' => Str::plural($module->name)]) . ' ' . trans('help.module.access.' . $access_level, ['access' => $access_level]), false); ?>"></i>
                </span>
                <?php echo Form::checkbox($module_name, Null, $module_enabled ? 1 : Null, ['id' => $module_name, 'class' => 'icheckbox_line role-module']); ?>

                <?php echo Form::label($module_name, strtoupper($module->name)); ?>

              </div>
            </td>
            <?php $__currentLoopData = $module->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <td>
                <div class="checkbox">
                    <label class="">
                        <?php echo Form::checkbox("permissions[]", $permission->id, Null, ['class' => $module_name . '-permission icheck', $module_enabled ? '' : 'disabled']); ?> <?php echo e($permission->name, false); ?>

                    </label>
                </div>
              </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/role/_form.blade.php ENDPATH**/ ?>