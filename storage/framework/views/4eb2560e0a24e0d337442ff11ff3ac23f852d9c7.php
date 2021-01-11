<?php $__env->startSection('content'); ?>
    <!-- HEADER SECTION -->
    <?php echo $__env->make('headers.search_results', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- CONTENT SECTION -->
    <?php echo $__env->make('contents.search_results', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- BROWSING ITEMS -->
    <?php echo $__env->make('sliders.browsing_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/search_results.blade.php ENDPATH**/ ?>