<?php if(isset($banners['sidebar'])): ?>
	<div class="row sidebar-banner-wrapper">
	    <?php $__currentLoopData = $banners['sidebar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      	<?php echo $__env->make('layouts.banner', $banner, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
<?php endif; ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/banners/sidebar.blade.php ENDPATH**/ ?>