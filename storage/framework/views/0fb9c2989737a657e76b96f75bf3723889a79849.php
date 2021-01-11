<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <?php echo Form::model($shipping_zone, ['method' => 'PUT', 'route' => ['admin.shipping.shippingZone.updateStates', $shipping_zone->id, $country], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.states'), false); ?>

        </div>
        <div class="modal-body">
            <div class="form-group">
              <div class="input-group input-group-lg">
                <span class="input-group-addon no-border"> <i class="fa fa-search text-muted"></i> </span>
                <?php echo Form::text('', null, ['id' => 'search_this', 'class' => 'form-control no-border', 'placeholder' => trans('app.placeholder.search')]); ?>

                <span class="input-group-addon no-border"> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('help.shipping_zone_select_states'), false); ?>"></i> </span>
              </div>
            </div>

            <table class="table table-striped" id="search_table">
                <tbody>
                    <?php $__currentLoopData = get_business_area_of($country); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo Form::checkbox('states[]', $state->id, in_array($state->id, $shipping_zone->state_ids), ['id' => $state->id, 'class' => 'icheckbox_line', (! $state->in_active_business_area) ? 'disabled' : '']); ?>

                                <?php echo Form::label($state->name, $state->name, ['class' => 'indent5']); ?>


                                <?php if (! ($state->in_active_business_area)): ?>
                                    <i class="fa fa-question-circle pull-right" style="margin-top: -23px; margin-right: 10px; position:relative; z-index: 999" data-toggle="tooltip" title="<?php echo e(trans('help.not_in_business_area'), false); ?>"></i>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/shipping_zone/_states.blade.php ENDPATH**/ ?>