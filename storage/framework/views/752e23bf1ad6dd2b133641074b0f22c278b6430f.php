<?php if($product->shop && Auth::user()->isFromPlatform()): ?>
	<img src="<?php echo e(get_storage_file_url(optional($product->shop->logo)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
	<p class="indent10">
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $product->shop)): ?>
			<a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.show', $product->shop->id), false); ?>"  class="ajax-modal-btn"><?php echo e($product->shop->name, false); ?></a>
		<?php else: ?>
			<?php echo e($product->shop->name, false); ?>

		<?php endif; ?>
	</p>
<?php endif; ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/actions/product/added_by.blade.php ENDPATH**/ ?>