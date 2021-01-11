<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.final.templateTitle'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <i class="fa fa-flag-checkered fa-fw" aria-hidden="true"></i>
    <?php echo e(trans('installer_messages.final.title'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
	

	

	
	

	
	

	<br/><br/>

    <div class="buttons">
        <a href="<?php echo e(route('Installer.seedDemo'), false); ?>" class="button" onclick="btnBusy(event)" style="background-color: transparent; color: #1d73a2; border: 1px solid #1d73a2;" >
         	<?php echo trans('installer_messages.final.import_demo_data'); ?>

            <i class="fa fa-angle-double-right fa-fw" aria-hidden="true"></i>
        </a>

        <a href="<?php echo e(route('Installer.finish'), false); ?>" class="button"><?php echo e(trans('installer_messages.final.exit'), false); ?></a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/installer/finished.blade.php ENDPATH**/ ?>