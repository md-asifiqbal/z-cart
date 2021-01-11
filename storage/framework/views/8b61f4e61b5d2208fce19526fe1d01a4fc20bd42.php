<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.environment.classic.templateTitle'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <i class="fa fa-code fa-fw" aria-hidden="true"></i> <?php echo e(trans('installer_messages.environment.classic.title'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <?php if($license_notifications_array['notification_case'] == "notification_license_ok"): ?>
        <div class="alert alert-warning"><i class="fa fa-info-circle"></i> <?php echo e(trans('installer_messages.verified'), false); ?></div>

        <div class="buttons">
            <a class="button" href="<?php echo e(route('Installer.database'), false); ?>" onclick="changeText()">
                <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                <?php echo trans('installer_messages.finish'); ?>

                <i class="fa fa-angle-double-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">
            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e(trans('installer_messages.verification_failed'), false); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/installer/install.blade.php ENDPATH**/ ?>