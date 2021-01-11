<div class="owl-carousel big-carousel carousel-img-only">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-widget">
            <img class="product-img" src="<?php echo e(get_inventory_img_src($item, 'medium'), false); ?>" data-name="product_image" alt="<?php echo $item->title; ?>" title="<?php echo $item->title; ?>" />
            <a class="product-link itemQuickView" href="<?php echo e(route('quickView.product', $item->slug), false); ?>"></a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/sliders/carousel_thumbs.blade.php ENDPATH**/ ?>