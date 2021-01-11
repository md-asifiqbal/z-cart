<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.environment.classic.templateTitle'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <i class="fa fa-code fa-fw" aria-hidden="true"></i> <?php echo e(trans('installer_messages.environment.classic.title'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <div class="alert alert-warning"><i class="fa fa-info-circle"></i> <?php echo trans('installer_messages.environment.classic.backup'); ?></div>
    <form method="post" action="<?php echo e(route('Installer.environmentSaveClassic'), false); ?>">
        <?php echo csrf_field(); ?>


        <textarea class="textarea" name="envConfig" style="background-color: #2b303b; color: #c0c5ce"><?php echo e($envConfig, false); ?></textarea>

        <div class="buttons buttons--right">
            <button class="button button--light" type="submit" onclick="btnBusy(event)">
            	<i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i>
             	<?php echo trans('installer_messages.environment.classic.save'); ?>

            </button>
        </div>
    </form>

    <?php if( ! isset($environment['errors'])): ?>
        <div class="buttons">
            <a class="button" href="<?php echo e(route('Installer.activate'), false); ?>" onclick="changeText()">
                <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                <?php echo trans('installer_messages.verify.verify_purchase'); ?>

                <i class="fa fa-angle-double-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">
            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e(trans('installer_messages.environment.classic.required'), false); ?>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/installer/environment-classic.blade.php ENDPATH**/ ?>