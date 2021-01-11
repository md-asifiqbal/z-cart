<div class="modal-dialog modal-md">
    <div class="modal-content">
    	<?php echo Form::open(['route' => 'admin.catalog.product.upload', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.form.upload_csv'), false); ?>

        </div>
        <div class="modal-body">
            <ul>
                <li><?php echo trans('help.upload_rows', ['rows' => get_csv_import_limit()]); ?></li>
                <li><?php echo trans('help.download_template', ['url' => route('admin.catalog.product.downloadTemplate')]); ?></li>
                <li><?php echo trans('help.download_category_slugs', ['url' => route('admin.catalog.product.downloadCategorySlugs')]); ?></li>
                <li><?php echo trans('help.first_row_as_header'); ?></li>
                <li><?php echo trans('help.user_category_slug'); ?></li>
                <li><?php echo trans('help.required_fields_csv', ['fields' => implode(',', config('system.import_required.product', []))]); ?></li>
                <li><?php echo trans('help.invalid_rows_will_ignored'); ?></li>
            </ul>
            <span class="spacer20"></span>
            <div class="row">
                <div class="col-md-9 nopadding-right">
                    <input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.select_csv_file'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
                </div>
                <div class="col-md-3 nopadding-left">
                    <div class="fileUpload btn btn-primary btn-block btn-flat">
                      <span><?php echo e(trans('app.form.select'), false); ?> CSV</span>
                      <input type="file" name="products" id="uploadBtn" class="upload" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.form.upload'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->
<?php /**PATH /home/amraibest.com/public_html/resources/views/admin/product/_upload_form.blade.php ENDPATH**/ ?>