<div class="modal-dialog modal-md">
    <div class="modal-content">
        <?php echo Form::model($paymentMethod, ['method' => 'PUT', 'route' => ['admin.setting.manualPaymentMethod.update', $paymentMethod->code], 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.form.config') . ' ' . $paymentMethod->name, false); ?>

        </div>
        <div class="modal-body">
            <div class="form-group">
              <?php echo Form::label('additional_details', trans('app.form.additional_details') . '*', ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.config_additional_details'), false); ?>"></i>
              <?php echo Form::textarea('additional_details', $paymentMethod->pivot->additional_details, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.additional_details'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <?php echo Form::label('payment_instructions', trans('app.form.payment_instructions') . '*', ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.config_payment_instructions'), false); ?>"></i>
              <?php echo Form::textarea('payment_instructions', $paymentMethod->pivot->payment_instructions, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.payment_instructions'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/config/payment-method/manual.blade.php ENDPATH**/ ?>