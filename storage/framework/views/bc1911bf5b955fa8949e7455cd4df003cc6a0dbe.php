<div class="modal-dialog modal-md">
    <div class="modal-content">
    	<?php echo Form::open(['route' => 'admin.support.refund.initiate', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.form.form'), false); ?>

        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8 nopadding-right">
                    <div class="form-group">
                        <?php if(isset($order)): ?>
                          <?php echo Form::hidden('order_id', $order->id); ?>

                          <?php echo Form::label('', trans('app.form.order_number').'*', ['class' => 'with-help']); ?>

                          <?php echo Form::text('', $order->order_number, ['class' => 'form-control', 'disabled']); ?>

                        <?php else: ?>
                          <?php echo Form::label('order_id', trans('app.form.select_refund_order').'*', ['class' => 'with-help']); ?>

                          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.refund_select_order'), false); ?>"></i>
                          <?php echo Form::select('order_id', $orders , Null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

                          <div class="help-block with-errors"></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4 nopadding-left">
                    <div class="form-group">
                      <?php echo Form::label('status', trans('app.form.status').'*', ['class' => 'with-help']); ?>

                      <?php echo Form::select('status', $statuses , 1, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

                      <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <?php if(is_int($order) && $order->refunds->count()): ?>
              <fieldset class="collapsible collapsed">
                <legend><?php echo e(trans('app.previous_refunds'), false); ?> </legend>
                <table class="table table-border">
                  <tbody>
                    <?php $__currentLoopData = $order->refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($refund->created_at->diffForHumans(), false); ?></td>
                        <td><?php echo e(get_formated_currency($refund->amount), false); ?></td>
                        <td><?php echo $refund->statusName(); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </fieldset>
              <div class="spacer30"></div>
            <?php endif; ?>

            <div class="form-group">
                <?php echo Form::label('amount', trans('app.form.refund_amount') . '*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?>

                    </span>
                    <?php echo Form::number('amount' , null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.refund_amount'), 'required']); ?>

                </div>
                <div class="help-block with-errors">
                  <?php if(isset($order)): ?>
                    <?php
                      $refunded_amt = $order->refundedSum();
                    ?>

                    <?php if($refunded_amt > 0): ?>
                      <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><i class="fa fa-warning"></i> <?php echo e(trans('app.alert'), false); ?>!</h4>
                        <?php echo trans('help.order_refunded', ['amount' => get_formated_currency($refunded_amt), 'total' => get_formated_currency($order->grand_total)]); ?>

                      </div>
                    <?php else: ?>
                      <?php echo trans('help.customer_paid', ['amount' => get_formated_currency($order->grand_total)]); ?>

                    <?php endif; ?>
                  <?php endif; ?>
                </div>
            </div>

            <div class="row">
              <div class="col-md-6 nopadding-right">
                <div class="form-group">
                  <div class="input-group">
                    <?php echo e(Form::hidden('return_goods', 0), false); ?>

                    <?php echo Form::checkbox('return_goods', null, null, ['class' => 'icheckbox_line']); ?>

                    <?php echo Form::label('return_goods', trans('app.form.return_goods')); ?>

                    <span class="input-group-addon" id="">
                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.refund_return_goods'), false); ?>"></i>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-6 nopadding-left">
                <div class="form-group">
                  <div class="input-group">
                    <?php echo e(Form::hidden('order_fulfilled', 0), false); ?>

                    <?php if(isset($order)): ?>
                      <?php echo Form::checkbox('order_fulfilled', null, $order->isFulfilled() ? 1 : Null, ['class' => 'icheckbox_line']); ?>

                    <?php else: ?>
                      <?php echo Form::checkbox('order_fulfilled', null, Null, ['class' => 'icheckbox_line']); ?>

                    <?php endif; ?>
                    <?php echo Form::label('order_fulfilled', trans('app.form.order_fulfilled')); ?>

                    <span class="input-group-addon" id="">
                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.refund_order_fulfilled'), false); ?>"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <?php echo Form::label('description', trans('app.form.description')); ?>

              <?php echo Form::textarea('description', null, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.description')]); ?>

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
            <?php echo Form::submit(trans('app.form.initiate'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/refund/_initiate.blade.php ENDPATH**/ ?>