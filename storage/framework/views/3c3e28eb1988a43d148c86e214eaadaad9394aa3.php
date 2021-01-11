<div class="modal-dialog modal-md">
    <div class="modal-content">
    	<?php echo Form::open(['route' => 'admin.setting.system.saveEnvFile', 'class' => 'ajax-form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.form.form'), false); ?>

        </div>
        <div class="modal-body">
            <?php if( config('app.demo') == true ): ?>
                <div class="alert alert-warning">
                    <?php echo e(trans('messages.demo_restriction'), false); ?>

                </div>
            <?php else: ?>
                <p class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('messages.modify_environment_file'); ?></p>

                <div class="form-group">
                    <?php echo Form::label('env', trans('app.form.env_contents')); ?>

                    <textarea class="form-control" name="env" rows="9" style="background-color: #2b303b; color: #c0c5ce"><?php echo e($envContents, false); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 nopadding-right">
                        <div class="form-group">
                            <?php echo Form::label('do_action', trans('app.form.type_environment')); ?>

                            <?php echo Form::text('do_action', null, ['class' => 'form-control', 'required']); ?>

                            <div class="help-block with-errors"><?php echo trans('help.type_environment'); ?></div>
                        </div>
                    </div>

                    <div class="col-md-6 nopadding-left">
                        <div class="form-group">
                            <?php echo Form::label('password', trans('app.form.confirm_acc_password')); ?>

                            <?php echo Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('app.placeholder.password'), 'data-minlength' => '6', 'required']); ?>

                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div><!-- / .row -->
            <?php endif; ?>
        </div>
        <div class="modal-footer">
            <?php if (! ( config('app.demo') == true )): ?>
                <?php echo Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-new confirm']); ?>

            <?php endif; ?>
        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/system/modify_env_file.blade.php ENDPATH**/ ?>