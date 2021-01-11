<div class="owl-carousel product-carousel">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-widget">
            <img class="product-img" src="<?php echo e(get_inventory_img_src($item, 'medium'), false); ?>" data-name="product_image" alt="<?php echo e($item->title, false); ?>" title="<?php echo e($item->title, false); ?>" style="height:200px;"/>
            <a class="product-link" href="<?php echo e(route('show.product', $item->slug), false); ?>"></a>
            <div class="product-info text-center">
                <?php echo $__env->make('layouts.ratings', ['ratings' => $item->feedbacks->avg('rating')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <h5 class="product-info-title"><?php echo $item->title; ?></h5>

                <?php echo $__env->make('layouts.pricing', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<style>
.owl-item {
    margin-right: 5px !important;

}
</style><?php /**PATH /home/amraibes/public_html/public/themes/default/views/sliders/carousel_with_feedback.blade.php ENDPATH**/ ?>