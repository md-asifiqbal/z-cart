<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <?php echo Form::model($order, ['method' => 'PUT', 'route' => ['admin.order.order.saveAdminNote', $order->id], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.update'), false); ?>

        </div>
        <div class="modal-body">
			<div class="form-group">
                <?php echo Form::label('admin_note', trans('app.form.admin_note'), ['class' => 'with-help']); ?>

                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.admin_note'), false); ?>"></i>
                <?php echo Form::textarea('admin_note', (isset($order->admin_note)) ? $order->admin_note : null, ['class' => 'form-control summernote-without-toolbar', 'rows' => '2', 'placeholder' => trans('app.placeholder.admin_note')]); ?>

			</div>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.form.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/order/_edit_admin_note.blade.php ENDPATH**/ ?>