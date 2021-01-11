
<?php $__env->startSection('content'); ?>

<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
        <div class="modal-header">
            <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
            <?php echo e(trans('theme.button.add_new_address'), false); ?>

        </div>
        <div class="modal-body">
            <?php echo Form::open(['route' => 'my.address.save', 'data-toggle' => 'validator']); ?>

                <?php if(isset($address_types)): ?>
                    <div class="form-group">
                      <?php echo Form::select('address_type', $address_types, null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.address_type'), 'required']); ?>

                      <div class="help-block with-errors"></div>
                    </div>
                <?php endif; ?>

                <?php echo $__env->make('forms.address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <button type="submit" class='btn btn-default btn-sm flat pull-right'><i class="fa fa-save"></i> <?php echo e(trans('theme.button.save'), false); ?></button>
            <?php echo Form::close(); ?>

            <small class="help-block text-muted">* <?php echo e(trans('theme.help.required_fields'), false); ?></small>
        </div><!-- /.modal-body -->
        <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/modals/_create_address.blade.php ENDPATH**/ ?>