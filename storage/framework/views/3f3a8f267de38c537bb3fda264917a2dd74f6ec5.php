<div class="product-info-price">
    <span class="old-price" style="display: <?php echo e($item->hasOffer() ? '' : 'none', false); ?>"><?php echo get_formated_price($item->sale_price, config('system_settings.decimals', 2)); ?></span>
    <span class="product-info-price-new"><?php echo get_formated_price($item->currnt_sale_price(), config('system_settings.decimals', 2)); ?></span>
    <ul class="product-info-feature-labels hidden">

        <?php $__currentLoopData = $item->getLabels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo $label; ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</ul>
</div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/layouts/pricing.blade.php ENDPATH**/ ?>