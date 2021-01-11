<!-- Ship to selection Modal-->
<div class="modal auth-modal fade" id="shipToModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
        <div class="modal-header">
            <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
            <?php echo e(trans('theme.choose_your_location'), false); ?>

        </div>
        <div class="modal-body">
            <?php echo Form::open(['route' => ['register'], 'data-toggle' => 'validator', 'id' => 'shipToForm']); ?>


                <?php echo e(Form::hidden('cart', Null, ['id' => 'cartinfo']), false); ?> 

                

                

                <div class="row select-box-wrapper">
                    <div class="form-group col-md-12">
                        <label for="dispute_type_id"><?php echo e(trans('theme.country'), false); ?>:</label>
                        <select name="ship_to" id="shipTo_country" required="required">
                            <?php $__currentLoopData = $business_areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id, false); ?>"><?php echo e($country->name, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row select-box-wrapper hidden" id="state_id_select_wrapper">
                    <div class="form-group col-md-12">
                        <label for="state_id"><?php echo e(trans('theme.placeholder.state'), false); ?>:</label>
                        <select name="state_id" id="shipTo_state" class="selectBoxIt"></select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <p class="space20 small"><i class="fa fa-info-circle"></i> <?php echo trans('theme.delivery_locations_info'); ?></p>

                <div class="col-xs-5 pull-right">
                    <input class="btn btn-block btn-lg flat btn-primary" type="submit" value="<?php echo e(trans('theme.button.submit'), false); ?>">
                </div>

            <?php echo Form::close(); ?>

        </div><!-- /.modal-body -->
        <div class="modal-footer">
        </div>
    </div><!-- /.modal-content -->
</div><!-- /#disputeOpenModal --><?php /**PATH /home/amraibes/public_html/public/themes/default/views/modals/ship_to.blade.php ENDPATH**/ ?>