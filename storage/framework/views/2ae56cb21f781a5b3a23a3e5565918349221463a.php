<div role="tabpanel">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#account-info-tab" aria-controls="account-info-tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo app('translator')->getFromJson('theme.basic_info'); ?></a>
    </li>
    <li role="presentation" class="">
      <a href="#password-tab" aria-controls="password-tab" role="tab" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->getFromJson('theme.change_password'); ?></a>
    </li>
    <li role="presentation" class="">
      <a href="#address-tab" aria-controls="address-tab" role="tab" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->getFromJson('theme.addresses'); ?></a>
    </li>
  </ul><!-- /.nav-tab -->

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="account-info-tab">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <?php echo Form::model($account, ['method' => 'PUT', 'route' => 'account.update', 'class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>

              <div class="form-group">
                <?php echo Form::label('name', trans('theme.full_name').'*', ['class' => 'col-sm-4 control-label']); ?>

                <div class="col-sm-8">
                  <?php echo Form::text('name', null, ['id' => 'name', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.full_name'), 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="form-group">
                <?php echo Form::label('nice_name', trans('theme.nice_name'), ['class' => 'col-sm-4 control-label']); ?>

                <div class="col-sm-8">
                  <?php echo Form::text('nice_name', null, ['id' => 'nice_name', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.nice_name')]); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="form-group">
                <?php echo Form::label('email', trans('theme.email').'*', ['class' => 'col-sm-4 control-label']); ?>

                <div class="col-sm-8">
                  <?php echo Form::email('email', null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.email'), 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="form-group">
                <?php echo Form::label('dob', trans('theme.dob'), ['class' => 'col-sm-4 control-label']); ?>

                <div class="col-sm-8">
                  <div class="input-group">
                    <?php echo Form::text('dob', null, ['class' => 'form-control flat datepicker', 'placeholder' => trans('theme.placeholder.dob')]); ?>

                    <span class="input-group-addon flat"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <?php echo Form::label('description', trans('theme.bio'), ['class' => 'col-sm-4 control-label']); ?>

                <div class="col-sm-8">
                  <?php echo Form::textarea('description', null, ['class' => 'form-control flat', 'rows' => '4', 'placeholder' => trans('theme.placeholder.bio')]); ?>

                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-4">
                  <small class="help-block text-muted pull-right">* <?php echo e(trans('theme.help.required_fields'), false); ?></small>
                </div>
                <div class="col-sm-8">
                  <?php echo Form::submit(trans('theme.button.update'), ['class' => 'btn btn-primary flat']); ?>

                </div>
              </div>
            <?php echo Form::close(); ?>

          </div><!-- /.row -->
        </div><!-- /.col-md-8 -->

        <div class="col-md-4">
            <div class="text-center">
              <div class="form-group">
                <?php if($account->image): ?>
                  <?php echo Form::model($account, ['method' => 'DELETE', 'route' => 'my.avatar.remove', 'class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>

                      <button class="btn btn-xs btn-default confirm pull-right flat" data-confirm="<?php echo app('translator')->getFromJson('theme.confirm_action.delete'); ?>" type="submit" data-toggle="tooltip" data-title="<?php echo e(trans('theme.button.delete'), false); ?>" data-placement="left"><i class="fa fa-trash-o"></i></button>
                  <?php echo Form::close(); ?>

                <?php endif; ?>

                <?php echo Form::label('avatar', trans('theme.avatar')); ?>

                <img src="<?php echo e(get_storage_file_url(optional($account->image)->path, 'medium'), false); ?>" class="thumbnail center-block" alt="<?php echo e(trans('theme.avatar'), false); ?>"/>
              </div>

              <?php echo Form::open(['route' => 'my.avatar.save', 'files' => true, 'data-toggle' => 'validator']); ?>

                  <div class="form-group">
                    <?php echo Form::file('avatar',['class' => '', 'required']); ?>

                    <div class="help-block with-errors"></div>
                  </div>
                  <button type="submit" class="btn btn-default btn-sm flat"><?php echo e(trans('theme.button.change_avatar'), false); ?></button>
              <?php echo Form::close(); ?>

            </div>
        </div><!-- /col-md-4 -->
      </div>
    </div><!-- /#account-info-tab -->

    <div role="tabpanel" class="tab-pane fade" id="password-tab">
      <div class="row">
        <div class="col-md-8 col-sm-offset-1">
          <div class="row">
            <?php echo Form::model($account, ['method' => 'PUT', 'route' => 'my.password.update', 'class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>

              <?php if($account->password): ?>
                <div class="form-group">
                  <?php echo Form::label('current_password', trans('theme.current_password').'*', ['class' => 'col-sm-4 control-label']); ?>

                  <div class="col-sm-8">
                    <?php echo Form::password('current_password', ['class' => 'form-control flat', 'id' => 'current_password', 'placeholder' => trans('theme.placeholder.current_password'), 'data-minlength' => '6', 'required']); ?>

                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <?php echo Form::label('password', trans('theme.new_password').'*', ['class' => 'col-sm-4 control-label']); ?>

                <div class="col-md-8">
                  <?php echo Form::password('password', ['class' => 'form-control flat', 'id' => 'password', 'placeholder' => trans('theme.placeholder.password'), 'data-minlength' => '6', 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="form-group">
                <?php echo Form::label('password_confirmation', trans('theme.confirm_password').'*', ['class' => 'col-sm-4 control-label']); ?>

                <div class="col-md-8">
                  <?php echo Form::password('password_confirmation', ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.confirm_password'), 'data-match' => '#password', 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-4">
                  <small class="help-block text-muted pull-right">* <?php echo e(trans('theme.help.required_fields'), false); ?></small>
                </div>
                <div class="col-sm-8">
                  <?php echo Form::submit(trans('theme.button.update'), ['class' => 'btn btn-primary flat']); ?>

                </div>
              </div>
            <?php echo Form::close(); ?>

          </div>
        </div><!-- /col-md-8 -->
        <div class="col-md-3"></div>
      </div>
    </div><!-- /#password-tab -->

    <div role="tabpanel" class="tab-pane fade" id="address-tab">
      <div class="row">
        <div class="col-md-8 col-sm-offset-2 space30">
            <?php $__empty_1 = true; $__currentLoopData = $account->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <?php echo $address->toHtml(); ?>

              <div class="btn-group pull-right space20" role="group" aria-label="..." style="margin-top: -100px;">
                  <a href="<?php echo e(route('my.address.delete', $address->id), false); ?>" class="confirm btn btn-default btn-xs flat pull-right" data-confirm="<?php echo app('translator')->getFromJson('theme.confirm_action.delete'); ?>">
                    <i class="fa fa-trash-o"></i> <?php echo app('translator')->getFromJson('theme.button.delete'); ?>
                  </a>

                  <a href="<?php echo e(route('my.address.edit', $address), false); ?>" class="modalAction btn btn-default btn-xs flat pull-right" >
                    <i class="fa fa-edit"></i> <?php echo app('translator')->getFromJson('theme.edit'); ?>
                  </a>
              </div>
              <hr/>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <div class="clearfix space50"></div>
              <p class="lead text-center space50">
                <?php echo app('translator')->getFromJson('theme.nothing_found'); ?>
              </p>
            <?php endif; ?>
        </div>

        <div class="col-sm-12 text-center">
          <a href="<?php echo e(route('my.address.create'), false); ?>" class="modalAction btn btn-black flat">
            <i class="fa fa-address-card-o"></i> <?php echo app('translator')->getFromJson('theme.button.add_new_address'); ?>
          </a>
        </div>
      </div>
    </div><!-- /#address-tab -->
  </div><!-- /.tab-content -->
</div><!-- /.tabpanel -->

<div class="clearfix space50"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/account.blade.php ENDPATH**/ ?>