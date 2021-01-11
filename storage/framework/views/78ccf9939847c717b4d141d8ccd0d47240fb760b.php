<div class="product-info-rating">
	<?php if($ratings): ?>
		<?php for($i = 0; $i < 5; $i++): ?>
			<?php if( ($ratings - $i) >= 1 ): ?>
				<span class="rated"><i class="fa fa-star fa-fw"></i></span>
			<?php elseif( ($ratings - $i) < 1 && ($ratings - $i) > 0 ): ?>
				<span class="rated"><i class="fa fa-star-half-o fa-fw"></i></span>
			<?php else: ?>
				<span><i class="fa fa-star-o fa-fw"></i></span>
			<?php endif; ?>
		<?php endfor; ?>
	<?php endif; ?>

	<?php if(isset($count) && $count): ?>
		<?php if(isset($shop) && $shop): ?>
	        <a href="javascript:void(0)" data-toggle="modal" data-target="#shopReviewsModal" data-tab="#shop_reviews_tab" class="rating-count shop-rating-count">
	        	(<?php echo e(get_formated_decimal($ratings,true,1), false); ?>) <?php echo e(trans_choice('theme.reviews', $count, ['count' => $count]), false); ?>

			</a>
		<?php elseif(isset($item)): ?>
			<a href="<?php echo e(route('show.product', $item->slug) . '#reviews_tab', false); ?>" class="rating-count product-rating-count">
				(<?php echo e(get_formated_decimal($ratings,true,1), false); ?>) <?php echo e(trans_choice('theme.reviews', $count, ['count' => $count]), false); ?>

			</a>
		<?php endif; ?>
	<?php endif; ?>
</div><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/layouts/ratings.blade.php ENDPATH**/ ?>