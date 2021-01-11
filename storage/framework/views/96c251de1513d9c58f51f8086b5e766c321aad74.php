<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <?php echo Form::model($shop, ['method' => 'PUT', 'route' => ['admin.vendor.subscription.updateTrial', $shop], 'id' => 'change-password-form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.form.form'), false); ?>

        </div>
        <div class="modal-body">
            <div class="form-group">
                <?php echo Form::label('trial_ends_at', trans('app.trial_ends_at')); ?>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <?php echo Form::text('trial_ends_at', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.trial_ends_at')]); ?>

                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <?php echo e(Form::hidden('hide_trial_notice', 0), false); ?>

                <?php echo Form::checkbox('hide_trial_notice', null, null, ['id' => 'hide_trial_notice', 'class' => 'icheckbox_line']); ?>

                <?php echo Form::label('hide_trial_notice', trans('app.hide_trial_notice')); ?>

                <span class="input-group-addon" id="">
                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.hide_trial_notice_on_vendor_panel'), false); ?>"></i>
                </span>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/shop/_edit_trial.blade.php ENDPATH**/ ?>