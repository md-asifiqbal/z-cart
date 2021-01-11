<?php $__env->startSection('content'); ?>
    <!-- HEADER SECTION -->
    <?php echo $__env->make('headers.dispute_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- CONTENT SECTION -->
	<?php echo $__env->make('contents.dispute_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- MODALS -->
	<?php echo $__env->renderWhen( ! $order->dispute, 'modals.dispute', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php if($order->dispute): ?>
        <?php if($order->dispute->isClosed()): ?>
    	    <?php echo $__env->make('modals.dispute_appeal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
    	    <?php echo $__env->make('modals.dispute_response', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/dispute.blade.php ENDPATH**/ ?>