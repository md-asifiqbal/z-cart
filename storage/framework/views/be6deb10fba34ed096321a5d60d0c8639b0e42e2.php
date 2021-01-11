

<?php $__env->startSection('content'); ?>
  <?php if(session('status')): ?>
    <div class="alert alert-success">
      <?php echo e(session('status'), false); ?>

    </div>
  <?php endif; ?>

  <div class="box login-box-body">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo e(trans('theme.password_reset'), false); ?>cc</h3>
    </div> <!-- /.box-header -->
    <div class="box-body">
      <?php echo Form::open(['route' => 'customer.password.email']); ?>

        <div class="form-group has-feedback">
          <?php echo Form::email('email', null, ['type'=>'text','class' => 'form-control input-lg', 'placeholder' =>'Email or Mobile No', 'required']); ?>

          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <div class="help-block with-errors"></div>
        </div>

        <?php echo Form::submit(trans('theme.button.send_password_link'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']); ?>

      <?php echo Form::close(); ?>

      <a href="<?php echo e(route('customer.login'), false); ?>" class="btn btn-link"><?php echo e(trans('theme.button.login'), false); ?></a>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/auth/passwords/email.blade.php ENDPATH**/ ?>