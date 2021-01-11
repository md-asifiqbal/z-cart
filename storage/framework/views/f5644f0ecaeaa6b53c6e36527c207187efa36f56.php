<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.requirements.templateTitle'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
    <?php echo e(trans('installer_messages.requirements.title'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <?php $__currentLoopData = $requirements['requirements']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul class="list">
            <li class="list__item list__title <?php echo e($phpSupportInfo['supported'] ? 'success' : 'error', false); ?>">
                <strong><?php echo e(ucfirst($type), false); ?></strong>

                <?php if($type == 'php'): ?>
                    <strong>
                        <small>
                            (minimum <?php echo e($phpSupportInfo['minimum'] . ' and bellow ' . $phpSupportInfo['maximum'], false); ?> required)
                        </small>
                    </strong>

                    <span class="float-right">
                        <strong>
                            <?php echo e($phpSupportInfo['current'], false); ?>

                        </strong>
                        <i class="fa fa-fw fa-<?php echo e($phpSupportInfo['supported'] ? 'check-circle-o' : 'exclamation-circle', false); ?> row-icon" aria-hidden="true"></i>
                    </span>
                <?php endif; ?>

            </li>
            <?php $__currentLoopData = $requirements['requirements'][$type]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extention => $enabled): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list__item <?php echo e($enabled ? 'success' : 'error', false); ?>">
                    <?php echo e($extention, false); ?>

                    <i class="fa fa-fw fa-<?php echo e($enabled ? 'check-circle-o' : 'exclamation-circle', false); ?> row-icon" aria-hidden="true"></i>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if( ! isset($requirements['errors']) && $phpSupportInfo['supported'] ): ?>
        <div class="buttons">
            <a class="button" href="<?php echo e(route('Installer.permissions'), false); ?>">
                <?php echo e(trans('installer_messages.requirements.next'), false); ?>

                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">
            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e(trans('installer_messages.requirements.required'), false); ?>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/installer/requirements.blade.php ENDPATH**/ ?>