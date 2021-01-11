<div class="form-group">
  	<?php echo Form::label('customer_id', trans('app.form.search_customer').'*', ['class' => 'with-help']); ?>

  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="<?php echo e(trans('help.search_customer'), false); ?>"></i>
	<?php echo Form::select('customer_id', isset($customer) ? [ $customer->id => $customer->name . ' | ' . $customer->email ] : [], isset($customer) ? $customer->id : Null, ['class' => 'form-control searchCustomer', 'style' =>'width: 100%', 'required']); ?>

  	<div class="help-block with-errors"></div>
</div><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/_search_customer.blade.php ENDPATH**/ ?>