<div class="modal-dialog modal-md">
    <div class="modal-content">
        <?php echo Form::model($message, ['method' => 'POST', 'route' => ['admin.support.message.storeReply', $message->id], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.reply'), false); ?>

        </div>
        <div class="modal-body">
            <div class="form-group">
              <?php echo Form::label('email', trans('app.reply_to')); ?>

              <?php echo Form::text('email', $message->email ?? optional($message->customer)->email, ['class' => 'form-control', 'placeholder' => trans('app.reply_to'), 'disabled']); ?>

              <div class="help-block with-errors"></div>
            </div>

            <?php if($template): ?>
                <?php echo $__env->make('admin.partials._email_template_id_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.partials._attachment_upload_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('admin.partials._reply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.reply'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/message/_reply.blade.php ENDPATH**/ ?>