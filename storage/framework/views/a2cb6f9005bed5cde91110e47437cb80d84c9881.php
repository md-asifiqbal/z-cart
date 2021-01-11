<ul class="sidebar-product-list">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <div class="product-widget">
                <div class="product-img-wrap">
                    <img class="product-img" src="<?php echo e(get_inventory_img_src($item, 'small'), false); ?>" data-name="product_image" alt="<?php echo e($item->title, false); ?>" title="<?php echo e($item->title, false); ?>" />
                    <!-- <img class="product-img" src="<?php echo e(get_storage_file_url(optional($item->image)->path, 'small'), false); ?>" data-name="product_image" alt="<?php echo e($item->title, false); ?>" title="<?php echo e($item->title, false); ?>" /> -->
                </div>
                <div class="product-info">
                    <?php echo $__env->make('layouts.ratings', ['ratings' => $item->feedbacks->avg('rating')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <a href="<?php echo e(route('show.product', $item->slug), false); ?>" class="product-info-title"><?php echo e($item->title, false); ?></a>

                    <?php echo $__env->make('layouts.pricing', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/sidebar_product_list.blade.php ENDPATH**/ ?>