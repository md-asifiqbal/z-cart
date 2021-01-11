<?php $__env->startSection('content'); ?>
    <!-- Blog COVER IMAGE -->
    <?php echo $__env->make('banners.blog_cover', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- CONTENT SECTION -->

    <?php echo $__env->renderWhen(isset($blogs), 'contents.blog_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen(isset($blog), 'contents.blog_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/blog.blade.php ENDPATH**/ ?>