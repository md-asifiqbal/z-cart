<section class="store-banner-img-wrapper">
	<div class="banner banner-o-hid" style="background-color: #333; background-image:url( <?php echo e(get_cover_img_src($shop, 'shop'), false); ?> );">
		<div class="banner-caption">
			<img src="<?php echo e(get_storage_file_url(optional($shop->logo)->path, 'thumbnail'), false); ?>" class="img-rounded">
			<h5 class="banner-title">
                <a href="#" data-toggle="modal" data-target="#shopReviewsModal">
	            	<?php echo $shop->getQualifiedName(); ?>

                </a>
			</h5>
            <span class="small">
	            <?php echo $__env->make('layouts.ratings', ['ratings' => $shop->feedbacks->avg('rating'), 'count' => $shop->feedbacks->count(), 'shop' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	        </span>
			<p class="member-since small"><?php echo e(trans('theme.member_since'), false); ?>: <?php echo e($shop->created_at->diffForHumans(), false); ?></p>
		</div>
	</div>
</section><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/banners/shop_cover.blade.php ENDPATH**/ ?>