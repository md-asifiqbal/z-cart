<div class="modal-dialog modal-md">
    <div class="modal-content">
        <?php echo Form::model($language, ['method' => 'PUT', 'route' => ['admin.setting.language.update', $language], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.form.form'), false); ?>

        </div>
        <div class="modal-body">
            <?php echo $__env->make('admin.language._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/language/_edit.blade.php ENDPATH**/ ?>