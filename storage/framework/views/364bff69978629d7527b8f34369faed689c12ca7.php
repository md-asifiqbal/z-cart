<td>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Product::class)): ?>
		<?php if (! ($product->inventories_count > 0 && ! Auth::user()->isFromPlatform())): ?>
			<input id="<?php echo e($product->id, false); ?>" type="checkbox" class="massCheck">
		<?php endif; ?>
	<?php endif; ?>
</td><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/actions/product/checkbox.blade.php ENDPATH**/ ?>