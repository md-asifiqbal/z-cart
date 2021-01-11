<?php $__env->startSection('content'); ?>
    <div class="box login-box-body">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('theme.register'), false); ?></h3>
        </div> <!-- /.box-header -->
        <div class="box-body">
            <?php echo Form::open(['route' => 'customer.register', 'id' => 'form', 'data-toggle' => 'validator']); ?>

                <div class="form-group has-feedback">
                    <?php echo Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => trans('theme.placeholder.full_name'), 'required']); ?>

                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <?php echo Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => trans('theme.placeholder.valid_email'), 'required']); ?>

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <?php echo Form::password('password', ['class' => 'form-control input-lg', 'id' => 'password', 'placeholder' => trans('theme.placeholder.password'), 'data-minlength' => '6', 'required']); ?>

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <?php echo Form::password('password_confirmation', ['class' => 'form-control input-lg', 'placeholder' => trans('theme.placeholder.confirm_password'), 'data-match' => '#password', 'required']); ?>

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <?php if(config('system_settings.ask_customer_for_email_subscription')): ?>
                    <div class="form-group">
                        <label>
                            <?php echo Form::checkbox('subscribe', null, null, ['class' => 'icheck']); ?> <?php echo trans('theme.input_label.subscribe_to_the_newsletter'); ?>

                        </label>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-7">
                        <div class="form-group">
                            <label>
                                <?php echo Form::checkbox('agree', null, null, ['class' => 'icheck', 'required']); ?> <?php echo trans('theme.input_label.i_agree_with_terms', ['url' => route('page.open', \App\Page::PAGE_TNC_FOR_CUSTOMER)]); ?>

                            </label>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <?php echo Form::submit(trans('theme.register'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']); ?>

                    </div>
                </div>
            <?php echo Form::close(); ?>


            <div class="social-auth-links text-center">
                <a href="<?php echo e(route('customer.login.social', 'facebook'), false); ?>" class="btn btn-block btn-social btn-facebook btn-lg btn-flat"><i class="fa fa-facebook"></i> <?php echo e(trans('theme.button.login_with_fb'), false); ?></a>
                <a href="<?php echo e(route('customer.login.social', 'google'), false); ?>" class="btn btn-block btn-social btn-google btn-lg btn-flat"><i class="fa fa-google"></i> <?php echo e(trans('theme.button.login_with_g'), false); ?></a>
            </div>

            <a href="<?php echo e(route('customer.login'), false); ?>" class="btn btn-link"><?php echo e(trans('theme.have_an_account'), false); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/auth/register.blade.php ENDPATH**/ ?>