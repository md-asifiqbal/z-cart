<?php $__env->startSection('content'); ?>
    <!-- SHOP COVER IMAGE -->
    <?php echo $__env->make('banners.shop_cover', ['shop' => $shop], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- CONTENT SECTION -->
    <?php echo $__env->make('contents.shop_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- BROWSING ITEMS -->
    <?php echo $__env->make('sliders.browsing_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- MODALS -->
    <?php echo $__env->make('modals.shopReviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if(is_chat_enabled($shop)): ?>
	    <?php echo $__env->make('scripts.chatbox', ['shop' => $shop, 'agent' => $shop->owner, 'agent_status' => trans('theme.online')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/shop.blade.php ENDPATH**/ ?>