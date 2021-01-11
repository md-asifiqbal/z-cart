<div class="owl-carousel product-carousel">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-widget">
            <img class="product-img" src="<?php echo e(get_inventory_img_src($item, 'medium'), false); ?>" data-name="product_image" alt="<?php echo $item->title; ?>" title="<?php echo $item->title; ?>" />
            <a class="product-link" href="<?php echo e(route('show.product', $item->slug), false); ?>"></a>
            <div class="product-info">
                <h5 class="product-info-title"><?php echo $item->title; ?></h5>

                <?php echo $__env->make('layouts.pricing', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/sliders/carousel_without_feedback.blade.php ENDPATH**/ ?>