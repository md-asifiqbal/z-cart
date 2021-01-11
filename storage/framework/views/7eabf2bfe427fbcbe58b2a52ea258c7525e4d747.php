<?php $__env->startSection('content'); ?>
    <!-- PAGE COVER IMAGE -->
    <?php echo $__env->make('banners.page_cover', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- CONTENT SECTION -->
	<div class="clearfix space20"></div>
	<section>
		<div class="container">
			<div class="row">
				<?php echo $page->content; ?>

		    </div><!-- /.row -->
	  	</div><!-- /.container -->
	</section>

	<!-- For contact page only -->
	<?php if(\App\Page::PAGE_CONTACT_US == $page->slug): ?>
		<?php echo $__env->make('layouts.contact_us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>

    <!-- BROWSING ITEMS -->
    <?php echo $__env->make('sliders.browsing_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/page.blade.php ENDPATH**/ ?>