<?php if(isset($banners['bottom'])): ?>
	<section>
	  <div class="container full-width">
    	  <div class="space20"></div>
	      <div class="row">
	        <?php $__currentLoopData = $banners['bottom']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	          <?php echo $__env->make('layouts.banner', $banner, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </div><!-- /.row -->
	  </div><!-- /.container -->
	</section>
<?php endif; ?><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/banners/bottom.blade.php ENDPATH**/ ?>