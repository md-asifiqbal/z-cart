<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <?php echo Form::model($address, ['method' => 'PUT', 'route' => ['address.update', $address->id], 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.form.form'), false); ?>

        </div>
        <div class="modal-body">

            <?php echo Form::hidden('address_type', $address->address_type); ?>

            <?php echo Form::hidden('addressable_id', $address->addressable_id); ?>

            <?php echo Form::hidden('addressable_type', $address->addressable_type); ?>


            <?php echo $__env->make('address._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/address/_edit.blade.php ENDPATH**/ ?>