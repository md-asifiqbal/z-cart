<div class="modal fade" id="disputeOpenModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content flat">
            <div class="modal-header">
                <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                <?php echo e(trans('theme.button.open_dispute'), false); ?>

            </div>
            <div class="modal-body">
                <?php echo Form::open(['route' => ['dispute.save', $order], 'data-toggle' => 'validator']); ?>

                <div class="row select-box-wrapper">
                    <div class="form-group col-md-12">
                        <label for="dispute_type_id"><?php echo app('translator')->getFromJson('theme.select_reason'); ?>:<sup>*</sup></label>
                        <select name="dispute_type_id" id="dispute_type_id" class="selectBoxIt" required="required">
                            <option value=""><?php echo app('translator')->getFromJson('theme.select'); ?></option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id, false); ?>"><?php echo e($type, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row space10">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="goods_received"><?php echo app('translator')->getFromJson('theme.goods_received'); ?>?<sup>*</sup></label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-xs-3">
                            <label>
                              <input name="order_received" value="1" class="i-radio-blue" type="radio" required="required"/> <?php echo e(trans('theme.yes'), false); ?>

                            </label>
                        </div>
                        <div class="col-xs-3">
                            <label>
                              <input name="order_received" value="0" class="i-radio-blue" type="radio" required="required"/> <?php echo e(trans('theme.no'), false); ?>

                            </label>
                        </div>
                    </div>
                </div>

                <div class="row select-box-wrapper space10 hidden" id="select_disputed_item">
                    <div class="form-group col-md-12">
                        <label for="product_id"><?php echo app('translator')->getFromJson('theme.select_product'); ?>:*</label>
                        <select name="product_id" id="product_id" class="selectBoxIt">
                            <option value=""><?php echo app('translator')->getFromJson('theme.select'); ?></option>
                            <option value="all"><?php echo app('translator')->getFromJson('theme.all_items'); ?></option>
                            <?php $__currentLoopData = $order->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->product_id, false); ?>">
                                    <?php echo e($item->pivot->item_description, false); ?> (<?php echo app('translator')->getFromJson('theme.unit_price'); ?>: <?php echo e(get_formated_currency($item->pivot->unit_price, true, 2), false); ?>)
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="refund_amount"><?php echo app('translator')->getFromJson('theme.refund_amount'); ?>:*</label>
                    <div class="input-group">
                        <span class="input-group-addon flat"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span>
                        <?php echo Form::number('refund_amount' , 0, ['id' => 'refund_amount', 'class' => 'form-control flat', 'step' => 'any', 'max' => $order->grand_total, 'placeholder' => trans('theme.placeholder.refund_amount'), 'required']); ?>

                    </div>
                    <div class="help-block with-errors">
                        <?php
                          $refunded_amt = $order->refundedSum();
                        ?>

                        <?php if($refunded_amt > 0): ?>
                          <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4><i class="fa fa-warning"></i> <?php echo e(trans('theme.alert'), false); ?>!</h4>
                            <?php echo trans('theme.help.order_refunded', ['amount' => get_formated_currency($refunded_amt, true, 2), 'total' => get_formated_currency($order->grand_total, true, 2)]); ?>

                          </div>
                        <?php else: ?>
                          <small><?php echo trans('theme.help.customer_paid', ['amount' => get_formated_currency($order->grand_total, true, 2)]); ?></small>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description"><?php echo app('translator')->getFromJson('theme.description'); ?>:<sup>*</sup></label>
                    <?php echo Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control flat', 'rows' => 3, 'placeholder' => trans('theme.placeholder.description'), 'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>

                <div class="row">
                    <div class="col-xs-7">
                        <div class="form-group hidden" id="return_goods_checkbox">
                            <label>
                              <input name="return_goods" value="1" class="i-check-blue" id="return_goods" type="checkbox"/> <?php echo e(trans('theme.return_goods'), false); ?>

                            </label>
                        </div>
                        <div class="help-block with-errors small"><span class="text-info hidden" id="return_goods_help_txt"><i class="fa fa-info-circle"></i> <?php echo app('translator')->getFromJson('theme.help.return_goods_help_txt'); ?></span></div>
                    </div>
                    <div class="col-xs-5">
                        <input class="btn btn-block flat btn-primary" type="submit" value="<?php echo e(trans('theme.button.open_dispute'), false); ?>">
                    </div>
                </div>
                <?php echo Form::close(); ?>

                <small class="help-block text-muted">* <?php echo e(trans('theme.help.required_fields'), false); ?></small>
            </div><!-- /.modal-body -->
            <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#disputeOpenModal --><?php /**PATH /home/amraibes/public_html/public/themes/default/views/modals/dispute.blade.php ENDPATH**/ ?>