<div id="ei-slider" class="ei-slider">
    <ul class="ei-slider-large">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e($slider['link'], false); ?>">
                    <img src="<?php echo e(get_storage_file_url($slider['featured_image']['path'], 'main_slider'), false); ?>" alt="<?php echo e($slider['title'] ?? 'Slider Image ' . $loop->count, false); ?>">
                </a>
                <div class="ei-title">
                    <h2 style="color: <?php echo e($slider['title_color'], false); ?>"><?php echo e($slider['title'], false); ?></h2>
                    <h3 style="color: <?php echo e($slider['sub_title_color'], false); ?>"><?php echo e($slider['sub_title'], false); ?></h3>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul><!-- ei-slider-large -->

    <ul class="ei-slider-thumbs">
        <li class="ei-slider-element">Current</li>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="#">Slide <?php echo e($loop->count, false); ?></a>
                <img src="<?php echo e(isset($slider['images'][0]['path']) ?
                    get_storage_file_url($slider['images'][0]['path'], 'slider_thumb') :
                    get_storage_file_url($slider['featured_image']['path'], 'slider_thumb'), false); ?>" alt="thumbnail <?php echo e($loop->count, false); ?>"
                />
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div><!-- /.ei-slider--><?php /**PATH /home/amraibes/public_html/public/themes/default/views/sliders/main.blade.php ENDPATH**/ ?>