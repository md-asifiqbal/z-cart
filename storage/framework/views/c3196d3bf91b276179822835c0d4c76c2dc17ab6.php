<div class="modal-dialog modal-md">
    <div class="modal-content">
    	<?php echo Form::open(['route' => 'admin.shipping.shippingZone.store', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.form.form'), false); ?>

        </div>
        <div class="modal-body">
	        <?php echo $__env->make('admin.shipping_zone._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/shipping_zone/_create.blade.php ENDPATH**/ ?>