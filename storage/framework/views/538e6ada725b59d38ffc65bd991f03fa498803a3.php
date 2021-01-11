<div class="row">
    <div class="col-md-9 nopadding-right">
        <input id="uploadFile" placeholder="<?php echo e(trans('app.placeholder.attachments'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
    </div>
    <div class="col-md-3 nopadding-left">
        <div class="fileUpload btn btn-primary btn-block btn-flat">
          	<span><?php echo e(trans('app.form.upload'), false); ?></span>
            <input type="file" name="attachments[]" id="uploadBtn" class="upload" multiple />
      	</div>
    </div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_attachment_upload_field.blade.php ENDPATH**/ ?>