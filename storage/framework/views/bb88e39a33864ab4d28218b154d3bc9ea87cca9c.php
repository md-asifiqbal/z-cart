<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $product)): ?>
	<a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.product.show', $product->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i></a>&nbsp;
<?php endif; ?>

<?php if (! ($product->inventories_count > 0 && ! Auth::user()->isFromPlatform())): ?>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $product)): ?>
		<a href="<?php echo e(route('admin.catalog.product.edit', $product->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
	<?php endif; ?>

	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $product)): ?>
		<?php echo Form::open(['route' => ['admin.catalog.product.trash', $product->id], 'method' => 'delete', 'class' => 'data-form']); ?>

			<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

		<?php echo Form::close(); ?>

	<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/actions/product/options.blade.php ENDPATH**/ ?>