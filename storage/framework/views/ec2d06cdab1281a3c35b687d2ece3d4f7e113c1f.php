

<?php $__env->startSection('content'); ?>
    <div class="box login-box-body">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('app.form.login'), false); ?></h3>
        </div> <!-- /.box-header -->
        <div class="box-body">
            <?php echo Form::open(['route' => 'login']); ?>

                <div class="form-group has-feedback">
                    <?php echo Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email or Mobile No', 'required']); ?>

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <?php echo Form::password('password', ['class' => 'form-control input-lg', 'id' => 'password', 'placeholder' => trans('app.form.password'), 'data-minlength' => '6', 'required']); ?>

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="row">
                    <div class="col-xs-7">
                        <div class="form-group">
                            <label>
                                <?php echo Form::checkbox('remember', null, null, ['class' => 'icheck']); ?> <?php echo e(trans('app.form.remember_me'), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <?php echo Form::submit(trans('app.form.login'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']); ?>

                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
              <a class="btn btn-link" href="<?php echo e(route('password.request'), false); ?>"><?php echo e(trans('app.form.forgot_password'), false); ?></a>

        <a class="btn btn-link" href="<?php echo e(route('register'), false); ?>" class="text-center"><?php echo e(trans('app.form.register_as_merchant'), false); ?></a>
    </div>

    <?php if(config('app.demo') == TRUE): ?>
        <div class="box login-box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Demo Login::</h3>
            </div> <!-- /.box-header -->
            <div class="box-body">
                <p><strong>ADMIN::</strong> Username: <strong>superadmin@demo.com</strong> | Password: <strong>123456</strong> </p>
                <p><strong>MERCHANT::</strong> Username: <strong>merchant@demo.com</strong> | Password: <strong>123456</strong> </p>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>