<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-3 nopadding" style="margin-top: 10px;">
	            <?php if($cart->customer->image): ?>
					<img src="<?php echo e(get_storage_file_url(optional($cart->customer->image)->path, 'small'), false); ?>" class="thumbnail" width="100%" alt="<?php echo e(trans('app.avatar'), false); ?>">
	            <?php else: ?>
            		<img src="<?php echo e(get_gravatar_url($cart->customer->email, 'small'), false); ?>" class="thumbnail" width="100%" alt="<?php echo e(trans('app.avatar'), false); ?>">
	            <?php endif; ?>
			</div>
            <div class="col-md-9 nopadding">
            	<div class="spacer10"></div>
				<table class="table no-border">
					<tr>
						<th class="text-right"><?php echo e(trans('app.customer'), false); ?>: </th>
						<td style="width: 75%;"><span class="lead"><?php echo e($cart->customer->getName(), false); ?></span></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.email'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($cart->customer->email, false); ?></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.member_since'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($cart->customer->created_at->toFormattedDateString(), false); ?></td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>

			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#items_tab" data-toggle="tab">
					<?php echo e(trans('app.items'), false); ?>

				  </a></li>
				  <li><a href="#info_tab" data-toggle="tab">
					<?php echo e(trans('app.cart_info'), false); ?>

				  </a></li>
				  <li><a href="#invoice_tab" data-toggle="tab">
					<?php echo e(trans('app.invoice'), false); ?>

				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="items_tab">
					    <table class="table table-sripe">
					      <thead>
					        <tr>
					          <th><?php echo e(trans('app.image'), false); ?></th>
					          <th><?php echo e(trans('app.description'), false); ?></th>
					          <th><?php echo e(trans('app.quantity'), false); ?></th>
					          <th><?php echo e(trans('app.price'), false); ?></th>
					          <th><?php echo e(trans('app.total'), false); ?></th>
					        </tr>
					      </thead>
					      <tbody id="items">
				            <?php if(count($cart->inventories) > 0): ?>
								<?php $__currentLoopData = $cart->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>
							                <?php if($item->image): ?>
							                  <img src="<?php echo e(get_storage_file_url($item->image->path, 'tiny'), false); ?>" class="img-circle img-md" alt="<?php echo e(trans('app.image'), false); ?>">
							                <?php elseif($item->product->featuredImage): ?>
							                  <img src="<?php echo e(get_storage_file_url($item->product->featuredImage->path, 'tiny'), false); ?>" class="img-circle img-md" alt="<?php echo e(trans('app.image'), false); ?>">
							                <?php else: ?>
							                  <img src="<?php echo e(get_storage_file_url(optional($item->product->image)->path, 'tiny'), false); ?>" class="img-circle img-md" alt="<?php echo e(trans('app.image'), false); ?>">
							                <?php endif; ?>
										</td>
										<td><?php echo e($item->pivot->item_description, false); ?></td>
										<td><?php echo e($item->pivot->quantity, false); ?></td>
										<td><?php echo e(get_formated_currency($item->pivot->unit_price, true, 2), false); ?></td>
										<td><?php echo e(get_formated_currency($item->pivot->quantity * $item->pivot->unit_price, true, 2), false); ?></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
						        <tr id='empty-cart'><td colspan="5"><?php echo e(trans('help.empty_cart'), false); ?></td></tr>
							<?php endif; ?>
					      </tbody>
					    </table>
				    </div>
				    <!-- /.tab-pane -->

				    <div class="tab-pane" id="info_tab">
						<table class="table no-border">
							<tr>
								<th class="text-right"><?php echo e(trans('app.created_at'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($cart->created_at->toDayDateTimeString(), false); ?></td>
							</tr>
							<tr>
								<th class="text-right"><?php echo e(trans('app.cart'), false); ?>: </th>
								<td style="width: 75%;"><?php echo e($cart->id, false); ?></td>
							</tr>
							<?php if($cart->shippingRate): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.carrier'), false); ?>:</th>
									<td style="width: 75%;">
										<?php echo e($cart->shippingRate->name, false); ?>

										<?php if($cart->carrier): ?>
									    	<small class="indent20"> <?php echo e(trans('app.by') . ' ' . $cart->carrier->name, false); ?> </small>
										<?php endif; ?>
									</td>
								</tr>
							<?php endif; ?>
							<?php if($cart->shippingPackage): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.packaging'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($cart->shippingPackage->name, false); ?></td>
								</tr>
							<?php endif; ?>
							<tr>
								<th class="text-right"><?php echo e(trans('app.shipping_address'), false); ?>: </th>
								<td style="width: 75%;"><?php echo e($cart->shipping_address, false); ?></td>
							</tr>
							<?php if($cart->message_to_customer): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.message_to_customer'), false); ?>: </th>
									<td style="width: 75%;"><?php echo $cart->message_to_customer; ?></td>
								</tr>
							<?php endif; ?>
							<?php if($cart->admin_note): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.admin_note'), false); ?>: </th>
									<td style="width: 75%;"><?php echo $cart->admin_note; ?></td>
								</tr>
							<?php endif; ?>
						</table>
				    </div>
				    <!-- /.tab-pane -->

				    <div class="tab-pane" id="invoice_tab">
						<table class="table no-border">
							<tr>
								<th class="text-right"><?php echo e(trans('app.grand_total'), false); ?>:</th>
								<td style="width: 75%;"><span class="lead"> <?php echo e(get_formated_currency($cart->grand_total, true, 2), false); ?></span></td>
							</tr>
							<tr>
								<th class="text-right"><?php echo e(trans('app.total'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e(get_formated_currency($cart->total, true, 2), false); ?></td>
							</tr>
							<tr>
								<th class="text-right"><?php echo e(trans('app.discount'), false); ?>:</th>
								<td style="width: 75%;"> - <?php echo e(get_formated_currency($cart->discount, true, 2), false); ?></td>
							</tr>
							<tr>
								<th class="text-right"><?php echo e(trans('app.shipping'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e(get_formated_currency($cart->shipping, true, 2), false); ?></td>
							</tr>
							<tr>
								<th class="text-right"><?php echo e(trans('app.handling'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e(get_formated_currency($cart->handling, true, 2), false); ?></td>
							</tr>
							<tr>
								<th class="text-right"><?php echo e(trans('app.taxes'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e(get_formated_currency($cart->taxes, true, 2), false); ?></td>
							</tr>
							<tr>
								<th class="text-right"><?php echo e(trans('app.billing_address'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($cart->billing_address, false); ?></td>
							</tr>
						</table>
					</div>
				    <!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
        </div> <!-- / .modal-body -->
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/cart/_show.blade.php ENDPATH**/ ?>