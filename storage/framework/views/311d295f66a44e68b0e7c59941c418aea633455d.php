<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Customer::class)): ?>
	<td><input id="<?php echo e($customer->id, false); ?>" type="checkbox" class="massCheck"></td>
<?php endif; ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/actions/customer/checkbox.blade.php ENDPATH**/ ?>