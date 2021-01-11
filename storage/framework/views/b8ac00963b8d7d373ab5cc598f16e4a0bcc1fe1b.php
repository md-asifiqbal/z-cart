<?php if(isset($banners['place_one'])): ?>
	<div class="row featured">
        <?php $__currentLoopData = $banners['place_one']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo $__env->make('layouts.banner', $banner, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div><!-- /.row -->
<?php endif; ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/banners/place_one.blade.php ENDPATH**/ ?>