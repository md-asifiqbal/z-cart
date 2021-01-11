<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>
	  		<div class="panel panel-default">
		  		<div class="panel-body">
					<table class="table no-border">
						<tr>
							<th class="text-right"><?php echo e(trans('app.name'), false); ?>:</th>
							<td>
								<span class="lead"><?php echo e($subscriptionPlan->name, false); ?></span>
								<?php if($subscriptionPlan->featured): ?>
									<span class="label label-primary indent10"><?php echo e(trans('app.featured'), false); ?></span>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th class="text-right"><?php echo e(trans('app.cost'), false); ?>:</th>
							<td class="lead"><?php echo e(get_formated_currency($subscriptionPlan->cost, true, 2) . trans('app.per_month'), false); ?></td>
						</tr>
						<?php if((bool) config('system_settings.trial_days')): ?>
							<tr>
								<th class="text-right"><?php echo e(trans('app.trial_days'), false); ?>:</th>
								<td><i class="fa fa-pagelines"></i> <?php echo e(config('system_settings.trial_days') . ' ' . trans('days'), false); ?></td>
							</tr>
						<?php endif; ?>
						<tr>
							<th class="text-right"><?php echo e(trans('app.team_size'), false); ?>:</th>
							<td><i class="fa fa-users"></i> <?php echo e($subscriptionPlan->team_size, false); ?></td>
						</tr>
						<tr>
							<th class="text-right"><?php echo e(trans('app.inventory_limit'), false); ?>:</th>
							<td><i class="fa fa-cubes"></i> <?php echo e($subscriptionPlan->inventory_limit, false); ?></td>
						</tr>
						<tr>
							<th class="text-right"><?php echo e(trans('app.transaction_fee'), false); ?>:</th>
							<td><?php echo e(get_formated_currency($subscriptionPlan->transaction_fee, true, 2), false); ?></td>
						</tr>
						<tr>
							<th class="text-right"><?php echo e(trans('app.marketplace_commission'), false); ?>:</th>
							<td><?php echo e($subscriptionPlan->marketplace_commission . trans('app.percent'), false); ?></td>
						</tr>
						<tr>
							<th class="text-right"><?php echo e(trans('app.available_from'), false); ?>:</th>
							<td><?php echo e($subscriptionPlan->created_at->toFormattedDateString(), false); ?></td>
						</tr>
						<tr>
							<th class="text-right"><?php echo e(trans('app.updated_at'), false); ?>:</th>
							<td><?php echo e($subscriptionPlan->updated_at->toDayDateTimeString(), false); ?></td>
						</tr>
					</table>
	        	</div>
	        </div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/subscription_plan/_show.blade.php ENDPATH**/ ?>