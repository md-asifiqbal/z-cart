<?php if($coupons->count() > 0): ?>
	<table class="table" id="buyer-order-table">
	  	<thead>
			<tr>
				<th><?php echo e(trans('theme.value'), false); ?></th>
				<th><?php echo e(trans('theme.store'), false); ?></th>
				<th><?php echo e(trans('theme.coupon_code'), false); ?></th>
				<th width="30%"><?php echo e(trans('theme.validity'), false); ?></th>
			</tr>
	  	</thead>
	  	<tbody>
			<?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td class="text-center">
						<?php
							$value = $coupon->type == 'amount' ? get_formated_currency($coupon->value, true, 2) : get_formated_decimal($coupon->value) . '%';
						?>

						<div class="customer-coupon-lists <?php echo e($coupon->ending_time < \Carbon\Carbon::now() ? 'customer-coupons-expired' : '', false); ?>">
							<div class="coupon-item">
								<span class="customer-coupons-limit">
									<?php if($coupon->min_order_amount): ?>
										<?php echo e(trans('theme.when_min_order_value', ['value' => get_formated_currency($coupon->min_order_amount, true, 2)]), false); ?>

									<?php endif; ?>
								</span>
								<span class="customer-coupon-value"><?php echo e(trans('theme.coupon_off', ['value' => $value]), false); ?></span>
							</div>
						</div>
					</td>
					<td class="vertical-center">
						<a href="<?php echo e(route('show.store', $coupon->shop->slug), false); ?>" target="_blank"><?php echo e($coupon->shop->name, false); ?></a>
						<small><i class="fa fa-external-link text-muted"></i></small>
					</td>
					<td class="text-center vertical-center"><?php echo e($coupon->code, false); ?></td>
					<td class="vertical-center"> <?php echo $coupon->validityText(); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<div class="sep"></div>
<?php else: ?>
  <div class="clearfix space50"></div>
  <p class="lead text-center space50">
    <?php echo app('translator')->getFromJson('theme.nothing_found'); ?>
  </p>
<?php endif; ?>

<div class="row pagenav-wrapper">
    <?php echo e($coupons->links('layouts.pagination'), false); ?>

</div><!-- /.row .pagenav-wrapper -->
<div class="clearfix space20"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/coupons.blade.php ENDPATH**/ ?>