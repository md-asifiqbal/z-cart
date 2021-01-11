

<?php $__env->startSection('content'); ?>
<div class="box login-box-body">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo e(trans('theme.password_reset'), false); ?></h3>
    </div> <!-- /.box-header -->
    <div class="box-body">
      <div class="alert">
        <p class="alert-success">
          OTP send to your mobile or email.
        </p>
      </div>

        <?php echo Form::open(['url' => 'customer/password/reset/custom', 'id' => 'form', 'data-toggle' => 'validator','method'=>'post']); ?>

            <?php echo Form::hidden('email', $email); ?>

            <div class="form-group has-feedback">
                <?php echo Form::text('otp', null, ['class' => 'form-control input-lg', 'placeholder' => 'OTP', 'required']); ?>

                <span class="glyphicon glyphicon-mobile form-control-feedback"></span>
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

            <?php echo Form::submit(trans('theme.password_reset'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']); ?>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/auth/passwords/reset.blade.php ENDPATH**/ ?>