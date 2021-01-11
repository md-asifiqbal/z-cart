<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $customer)): ?>
    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $customer->id), false); ?>" class="ajax-modal-btn modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.profile'), false); ?>" class="fa fa-user-circle-o"></i></a>&nbsp;
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $customer)): ?>
    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.edit', $customer->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;

    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.changePassword', $customer->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.change_password'), false); ?>" class="fa fa-lock"></i></a>&nbsp;
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $customer)): ?>
	<?php if($customer->primaryAddress): ?>
		<a href="<?php echo e(route('address.addresses', ['customer', $customer->id]), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.show_addresses'), false); ?>" class="fa fa-address-card-o"></i></a>&nbsp;
	<?php else: ?>
		<a href="javascript:void(0)" data-link="<?php echo e(route('address.create', ['customer', $customer->id]), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.add_address'), false); ?>" class="fa fa-plus-square-o"></i></a>&nbsp;
	<?php endif; ?>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $customer)): ?>
    <?php echo Form::open(['route' => ['admin.admin.customer.trash', $customer->id], 'method' => 'delete', 'class' => 'data-form']); ?>

        <?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

	<?php echo Form::close(); ?>

<?php endif; ?>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/actions/customer/options.blade.php ENDPATH**/ ?>