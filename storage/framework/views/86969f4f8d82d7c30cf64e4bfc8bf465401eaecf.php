<?php if(isset($banners['best_deals'])): ?>
	<section>
	  <div class="container">
	    <div class="section-title"></div>
		<div class="row featured">
	        <?php $__currentLoopData = $banners['best_deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	          <?php echo $__env->make('layouts.banner', $banner, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </div><!-- /.row -->
	  </div><!-- /.container -->
	</section>
<?php endif; ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/banners/best_deals.blade.php ENDPATH**/ ?>