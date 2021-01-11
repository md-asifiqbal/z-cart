<section class="category-banner-img-wrapper">
	<div class="banner banner-o-hid" style="background-color: #333; background-image:url( <?php echo e(get_cover_img_src($category, 'category'), false); ?> );">
		<div class="banner-caption">
			<h5 class="banner-title"><?php echo e($category->name, false); ?></h5>
			<p class="banner-desc"><?php echo $category->description; ?></p>
		</div>
	</div>
</section><?php /**PATH /home/amraibes/public_html/public/themes/default/views/banners/category_cover.blade.php ENDPATH**/ ?>