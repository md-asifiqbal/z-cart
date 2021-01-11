<div class="form-group">
  	<?php echo Form::label('customer_list', trans('app.form.search_customer').'*', ['class' => 'with-help']); ?>

  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.search_customer'), false); ?>"></i>
	<?php echo Form::select('customer_list[]', isset($customer_list) ? $customer_list : [], Null, ['id' => 'customer_list_field', 'class' => 'form-control searchCustomer', 'style' =>'width: 100%', 'multiple' => 'multiple']); ?>

  	<div class="help-block with-errors"></div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_search_customer_multiple.blade.php ENDPATH**/ ?>