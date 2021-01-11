<div class="modal-dialog modal-md">
    <div class="modal-content">
    	<?php echo Form::open(['route' => 'admin.support.message.store', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.form.form'), false); ?>

        </div>
        <div class="modal-body">

            <?php if(isset($order)): ?>
                <?php echo Form::hidden('order_id', $order->id); ?>

                <?php echo Form::hidden('customer_id', $order->customer_id); ?>

                <h4> <?php echo e(trans('app.to'), false); ?>: <?php echo e($order->customer_id ? $order->customer->email : $order->email, false); ?></h4>
                <div class="spacer10"></div>
            <?php else: ?>
                <?php echo $__env->make('admin.partials._search_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($type) && $type == 'template'): ?>
              <?php echo $__env->make('admin.partials._email_template_id_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
              <?php echo $__env->make('admin.partials._compose_a_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php echo $__env->make('admin.partials._attachment_upload_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.form.save_as_draft'), ['name' => 'draft', 'class' => 'btn btn-flat btn-default']); ?>

            <?php echo Form::submit(trans('app.form.send'), ['name' => 'sned', 'class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->

<?php /**PATH /home/amraibest.com/public_html/resources/views/admin/message/_create.blade.php ENDPATH**/ ?>