<?php if (! (empty($recently_viewed_items))): ?>
	<section class="bg-light">
	  <div class="container full-width">
	    <div class="section-title">
	      <h4 class="small"><?php echo trans('theme.section_headings.recently_viewed'); ?></h4>
	    </div>
	    <div class="section-content">

	      <?php echo $__env->make('sliders.carousel_thumbs_small', ['products' => $recently_viewed_items], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	    </div>
	  </div><!-- /.container -->
	</section>
<?php endif; ?><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/sliders/browsing_items.blade.php ENDPATH**/ ?>