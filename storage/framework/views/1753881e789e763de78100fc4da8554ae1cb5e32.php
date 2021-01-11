<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.permissions.templateTitle'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <i class="fa fa-key fa-fw" aria-hidden="true"></i>
    <?php echo e(trans('installer_messages.permissions.title'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <ul class="list">
        <?php $__currentLoopData = $permissions['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list__item list__item--permissions <?php echo e($permission['isSet'] ? 'success' : 'error', false); ?>">
            <?php echo e($permission['folder'], false); ?>

            <span>
                <i class="fa fa-fw fa-<?php echo e($permission['isSet'] ? 'check-circle-o' : 'exclamation-circle', false); ?>"></i>
                <?php echo e($permission['permission'], false); ?>

            </span>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php if( ! isset($permissions['errors'])): ?>
        <div class="buttons">
            <a href="<?php echo e(route('Installer.environmentClassic'), false); ?>" class="button">
                <?php echo e(trans('installer_messages.permissions.next'), false); ?>

                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">
            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e(trans('installer_messages.permissions.required'), false); ?>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/installer/permissions.blade.php ENDPATH**/ ?>