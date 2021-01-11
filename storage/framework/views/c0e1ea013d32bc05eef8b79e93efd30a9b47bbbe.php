<div class="box collapsed-box">
	<div class="box-header with-bcart">
		<h3 class="box-title"><i class="fa fa-cubes"></i> </h3>
		<div class="box-tools pull-right">
			<a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.bulk'), false); ?>" class="ajax-modal-btn btn btn-default btn-flat"><?php echo e(trans('app.bulk_import'), false); ?></a>
			<button type="button" class="btn btn-new btn-flat" data-widget="collapse"><i class="fa fa-plus"></i> <?php echo e(trans('app.add_inventory'), false); ?></button>
		</div>
	</div> <!-- /.box-header -->

	<div class="box-body">
        <?php if(Auth::user()->shop->canAddMoreInventory()): ?>
	        <div class="form-group">
	          <div class="input-group input-group-lg">
	            <span class="input-group-addon"> <i class="fa fa-search text-muted"></i> </span>
	            <?php echo Form::text('searchProduct', null, ['id' => 'searchProduct', 'class' => 'form-control', 'placeholder' => trans('app.placeholder.search_product')]); ?>

	          </div>
	        </div>
	        <div id="productFounds"></div>
        <?php else: ?>
        	<?php echo $__env->make('admin.partials._max_inventory_limit_notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	<?php endif; ?>
	</div> <!-- /.box-body -->
</div> <!-- /.box --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/inventory/_add.blade.php ENDPATH**/ ?>