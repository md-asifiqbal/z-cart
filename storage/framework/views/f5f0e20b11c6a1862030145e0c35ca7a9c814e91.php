<?php $__env->startSection('content'); ?>
    <!-- HEADER SECTION -->
    <?php echo $__env->make('headers.account_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <?php if(! Auth::guard('customer')->user()->isVerified()): ?>
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong><i class="icon fa fa-info-circle"></i> <?php echo e(trans('theme.notice'), false); ?></strong>
                <?php echo e(trans('messages.email_verification_notice'), false); ?>

                <a href="<?php echo e(route('customer.verify'), false); ?>"> <?php echo e(trans('auth.resend_verification_link'), false); ?></a>
            </div>
        <?php endif; ?>
    </div>

    <!-- CONTENT SECTION -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-2 nopadding">
                    <?php echo $__env->make('nav.account_page_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div><!-- /.col-md-2 -->

                <div class="col-md-10 nopadding-right">
                    <?php echo $__env->make('contents.' . $tab, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div><!-- /.col-md-10 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <!-- BROWSING ITEMS -->
    <?php echo $__env->make('sliders.browsing_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/dashboard.blade.php ENDPATH**/ ?>