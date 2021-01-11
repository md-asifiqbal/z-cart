<?php $__env->startSection('content'); ?>
    <!-- CATEGORY COVER IMAGE -->
    <?php echo $__env->make('banners.category_cover', ['category' => $categoryGroup], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- HEADER SECTION -->
    <?php echo $__env->make('headers.category_group_page', ['category' => $categoryGroup], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- CONTENT SECTION -->
    <?php echo $__env->make('contents.category_page', ['category' => $categoryGroup], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- BROWSING ITEMS -->
    <?php echo $__env->make('sliders.browsing_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- bottom Banner -->
    <?php echo $__env->make('banners.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/category_group.blade.php ENDPATH**/ ?>