<div class="col-md-<?php echo e($banner['columns'], false); ?>">
	<div class="banner banner-o-hid outline-effect animated zoomIn"
		style="background-color: <?php echo e($banner['bg_color'], false); ?>; background-image:url( <?php echo e(isset($banner['images'][0]['path']) && Storage::exists($banner['images'][0]['path']) ? get_storage_file_url($banner['images'][0]['path'], 'full') : '', false); ?> );">

		<a class="banner-link btn btn-link" href="<?php echo e($banner['link'], false); ?>"></a>

		<div class="banner-caption">
			<h5 class="banner-title"><?php echo e($banner['title'], false); ?></h5>
			<p class="banner-desc"><?php echo e($banner['description'], false); ?></p>
			<p class="banner-link-btn"><?php echo $banner['link_label'] ? $banner['link_label'] . ' <i class="fa fa-caret-right"></i>' : ''; ?></p>
		</div>

	    <?php if(Storage::exists($banner['featured_image']['path'])): ?>
		    <img class="banner-img" src="<?php echo e(get_storage_file_url($banner['featured_image']['path'], 'full'), false); ?>" alt="<?php echo e($banner['title'] or 'Banner Image', false); ?>" title="<?php echo e($banner['title'] or 'Banner Image', false); ?>">
    	<?php endif; ?>
	</div>
</div><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/layouts/banner.blade.php ENDPATH**/ ?>