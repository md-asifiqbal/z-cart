<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <?php echo Form::model($order, ['method' => 'PUT', 'route' => ['admin.order.order.updateOrderStatus', $order->id], 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.update'), false); ?>

        </div>
        <div class="modal-body">
			<div class="form-group">
			  <?php echo Form::label('order_status_id', trans('app.form.order_status') . '*', ['class' => 'with-help']); ?>

			  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.update_order_status'), false); ?>"></i>
			  <?php echo Form::select('order_status_id', $order_statuses, $order->order_status_id, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.carrier'), 'required']); ?>

			  <div class="help-block with-errors"></div>
			</div>

            <small>
              <?php echo Form::checkbox('notify_customer', 1, null, ['class' => 'icheck', 'checked']); ?>

              <?php echo Form::label('notify_customer', strtoupper(trans('app.notify_customer')), ['class' => 'indent5']); ?>

              <i class="fa fa-question-circle indent5" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.notify_customer'), false); ?>"></i>
			</small>
			<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.form.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/order/_edit.blade.php ENDPATH**/ ?>