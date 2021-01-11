<div class="form-group">
  <?php echo Form::label('body', trans('app.form.body').'*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="<?php echo e(trans('help.use_markdown_to_bold'), false); ?>"></i>
  <?php echo Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.announcement_body'), 'rows' => '2', 'required']); ?>

  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  	<?php echo Form::label('action_text', trans('app.form.action_text')); ?>

	<div class="input-group">
  		<?php echo Form::text('action_text', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.action_text') . ' ' . trans('help.optional')]); ?>

        <span class="input-group-addon">
	  		<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.announcement_action_text'), false); ?>"></i>
	  	</span>
	</div>
</div>
<div class="form-group">
  <?php echo Form::label('action_url', trans('app.form.action_url')); ?>

	<div class="input-group">
		<?php echo Form::text('action_url', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.action_url') . ' ' . trans('help.optional')]); ?>

        <span class="input-group-addon">
	  		<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.announcement_action_url'), false); ?>"></i>
	  	</span>
	</div>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p><?php /**PATH /home/amraibes/public_html/resources/views/admin/announcement/_form.blade.php ENDPATH**/ ?>