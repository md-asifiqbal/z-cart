<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <?php echo Form::model($shop, ['method' => 'PUT', 'route' => ['admin.vendor.shop.update', $shop->id], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <?php echo e(trans('app.verification'), false); ?>

            </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="input-group">
                    <?php echo e(Form::hidden('id_verified', 0), false); ?>

                    <?php echo Form::checkbox('id_verified', null, $shop->id_verified, ['id' => 'id_verified', 'class' => 'icheckbox_line']); ?>

                    <?php echo Form::label('id_verified', trans('app.id_verified')); ?>

                    <span class="input-group-addon" id="">
                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.mark_id_verified'), false); ?>"></i>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <?php echo e(Form::hidden('address_verified', 0), false); ?>

                    <?php echo Form::checkbox('address_verified', null, $shop->address_verified, ['id' => 'address_verified', 'class' => 'icheckbox_line']); ?>

                    <?php echo Form::label('address_verified', trans('app.address_verified')); ?>

                    <span class="input-group-addon" id="">
                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.mark_address_verified'), false); ?>"></i>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <?php echo e(Form::hidden('phone_verified', 0), false); ?>

                    <?php echo Form::checkbox('phone_verified', null, $shop->phone_verified, ['id' => 'phone_verified', 'class' => 'icheckbox_line']); ?>

                    <?php echo Form::label('phone_verified', trans('app.phone_verified')); ?>

                    <span class="input-group-addon" id="">
                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.mark_phone_verified'), false); ?>"></i>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <?php echo e(Form::hidden('active', 0), false); ?>

                    <?php echo Form::checkbox('active', null, $shop->active, ['id' => 'active', 'class' => 'icheckbox_line']); ?>

                    <?php echo Form::label('active', trans('app.active')); ?>

                    <span class="input-group-addon" id="">
                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.shop_status'), false); ?>"></i>
                    </span>
                  </div>
                </div>
            </div>

            <div class="form-group">
              <label>
                <span style="margin-left: 10px;">
                  <?php echo e(Form::hidden('remove_from_pending_verification_list', Null), false); ?>

                  <?php echo Form::checkbox('remove_from_pending_verification_list', 1, 1, ['class' => 'icheck']); ?> <?php echo e(trans('app.remove_from_pending_verification_list'), false); ?>

                </span>
              </label>
            </div>

            <div class="modal-footer">
                <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

            </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/shop/_verify.blade.php ENDPATH**/ ?>