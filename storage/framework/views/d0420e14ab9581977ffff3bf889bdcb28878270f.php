<div class="modal-dialog modal-md">
    <div class="modal-content">
        <?php echo Form::open(['route' => 'admin.appearance.update.featuredCategories', 'method' => 'PUT', 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.form.featured_categories'), false); ?>

        </div>
        <div class="modal-body">
            <div class="form-group">
              <?php echo Form::label('featured_categories[]', trans('app.form.categories').'*'); ?>

              <?php echo Form::select('featured_categories[]', $categories , array_keys($featured_categories), ['class' => 'form-control select2-normal', 'multiple' => 'multiple', 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/theme/_edit_featured_categories.blade.php ENDPATH**/ ?>