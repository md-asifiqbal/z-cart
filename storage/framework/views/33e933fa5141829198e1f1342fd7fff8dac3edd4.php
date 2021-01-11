<div class="form-group">
    <?php echo Form::label('subject', trans('app.form.subject').'*'); ?>

    <?php echo Form::text('subject', isset($message) ? $message->subject : Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.subject'), 'required']); ?>

    <div class="help-block with-errors"></div>
</div>

<div class="form-group">
    <?php echo Form::label('message', trans('app.form.message').'*'); ?>

    <?php echo Form::textarea('message', isset($message) ? $message->message : Null, ['class' => 'form-control summernote', 'rows' => '4', 'placeholder' => trans('app.placeholder.message'), 'required']); ?>

    <div class="help-block with-errors"></div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_compose_a_message.blade.php ENDPATH**/ ?>