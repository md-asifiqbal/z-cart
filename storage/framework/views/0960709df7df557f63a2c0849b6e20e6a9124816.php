<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.welcome.templateTitle'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('installer_messages.welcome.title'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <p class="text-center">
      <?php echo e(trans('installer_messages.welcome.message'), false); ?>

    </p>
    <p class="text-center">
      <a href="<?php echo e(route('Installer.requirements'), false); ?>" class="button">
        <?php echo e(trans('installer_messages.welcome.next'), false); ?>

        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
      </a>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/installer/welcome.blade.php ENDPATH**/ ?>