<div class="clearfix">
	<?php
		$pImg = get_product_img_src($item, 'full');
	?>
	<a href="<?php echo e($pImg, false); ?>" id="<?php echo e($zoomID ?? 'jqzoom', false); ?>" data-rel="gal-1">
		<img class="product-img" data-name="product_image" src="<?php echo e($pImg, false); ?>" alt="<?php echo e($item->title, false); ?>" title="<?php echo e($item->title, false); ?>" />
	</a>
</div>

<ul class="jqzoom-thumbs">
	<?php
		$item_images = $item->images->count() ? $item->images : $item->product->images;

		if(isset($variants)){
			// Remove images of current items from the variants imgs
			$other_images = $variants->pluck('images')->flatten(1)->filter(function ($value, $key) use ($item) {
							    return $value->imageable_id != $item->id;
							});
			$item_images = $item_images->concat($other_images);
		}
	?>

	<?php $__currentLoopData = $item_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if(!$img->path) continue; ?>

		<?php
			$sImg = get_storage_file_url($img->path, 'full');
		?>

		<li>
			<a class="<?php echo e($img->path == optional($item->image)->path ? 'zoomThumbActive' : '', false); ?>" href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: '<?php echo e($sImg, false); ?>', largeimage: '<?php echo e($sImg, false); ?>'}">
				<img src="<?php echo e(get_storage_file_url($img->path, 'mini'), false); ?>" alt="Thumb" title="<?php echo e($item->title, false); ?>" />
			</a>
		</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul> <!-- /.jqzoom-thumbs --><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/layouts/jqzoom.blade.php ENDPATH**/ ?>