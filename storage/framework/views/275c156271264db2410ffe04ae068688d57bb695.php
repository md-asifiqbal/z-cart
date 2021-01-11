<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.verify.verify_purchase'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <i class="fa fa-code fa-fw" aria-hidden="true"></i> <?php echo e(trans('installer_messages.verify.verify_purchase'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <?php if(session()->has('failed')): ?>
        <div class="alert alert-danger">
            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e(session()->get('failed'), false); ?>

        </div>
    <?php endif; ?>

    
    <form method="post" action="<?php echo e(route('Installer.verify'), false); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="email_address"> <?php echo e(trans('installer_messages.verify.form.email_address_label'), false); ?> </label>
            <input type="text" name="email_address" id="email_address" value="<?php echo e(old('email_address'), false); ?>" placeholder="<?php echo e(trans('installer_messages.verify.form.email_address_placeholder'), false); ?>" required />
        </div>

        <div class="form-group">
            <label for="purchase_code"> <?php echo e(trans('installer_messages.verify.form.purchase_code_label'), false); ?> </label>
            <input type="text" name="purchase_code" id="purchase_code" value="<?php echo e(old('purchase_code'), false); ?>" placeholder="<?php echo e(trans('installer_messages.verify.form.purchase_code_placeholder'), false); ?>" required />
        </div>

        <div class="form-group">
            <label for="root_url"> <?php echo e(trans('installer_messages.verify.form.root_url_label'), false); ?> </label>
            <input type="text" name="root_url" id="root_url" value="<?php echo e(rtrim(config('app.url'), '/'), false); ?>" placeholder="<?php echo e(trans('installer_messages.verify.form.root_url_placeholder'), false); ?>" required />
        </div>

        <div class="buttons">
            <button class="button" type="submit">
                <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                <?php echo trans('installer_messages.verify.submit'); ?>

                <i class="fa fa-angle-double-right fa-fw" aria-hidden="true"></i>
            </button>

            
        </div>
    </form>

    <?php if( isset($environment['errors'])): ?>

        <div class="alert alert-danger">
            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e(trans('installer_messages.environment.classic.required'), false); ?>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/installer/activate.blade.php ENDPATH**/ ?>