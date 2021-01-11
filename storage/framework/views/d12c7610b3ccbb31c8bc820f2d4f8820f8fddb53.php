<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-4 nopadding" style="margin-top: 10px;">
				<img src="<?php echo e(get_product_img_src($inventory, 'medium'), false); ?>" width="100%" class="thumbnail" alt="<?php echo e(trans('app.image'), false); ?>">
			</div>
            <div class="col-md-8 nopadding">
				<table class="table no-border">
					<tr>
						<th class="text-right"><?php echo e(trans('app.name'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($inventory->product->name, false); ?></td>
					</tr>

		            <?php if($inventory->product->brand): ?>
		                <tr>
		                	<th class="text-right"><?php echo e(trans('app.brand'), false); ?>: </th>
		                	<td style="width: 75%;"><?php echo e($inventory->product->brand, false); ?></td>
		                </tr>
		            <?php endif; ?>

		            <?php if($inventory->product->model_number): ?>
						<tr>
							<th class="text-right"><?php echo e(trans('app.model_number'), false); ?>:</th>
							<td style="width: 75%;"><?php echo e($inventory->product->model_number, false); ?></td>
						</tr>
					<?php endif; ?>

		            <tr>
		            	<th class="text-right"><?php echo e(trans('app.status'), false); ?>: </th>
		            	<td style="width: 75%;"><?php echo e(($inventory->active) ? trans('app.active') : trans('app.inactive'), false); ?></td>
		            </tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.available_from'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($inventory->available_from->toFormattedDateString(), false); ?></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.updated_at'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($inventory->updated_at->toDayDateTimeString(), false); ?></td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#listing_tab" data-toggle="tab">
					<?php echo e(trans('app.listing'), false); ?>

				  </a></li>
				  <li><a href="#productinfo_tab" data-toggle="tab">
					<?php echo e(trans('app.product'), false); ?>

				  </a></li>
				  <li><a href="#description_tab" data-toggle="tab">
					<?php echo e(trans('app.description'), false); ?>

				  </a></li>
				  <li><a href="#offer_tab" data-toggle="tab">
					<?php echo e(trans('app.offer'), false); ?>

				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="listing_tab">
				        <table class="table">
				            <?php if($inventory->sku): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.sku'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($inventory->sku, false); ?></td>
								</tr>
							<?php endif; ?>

							<tr>
								<th class="text-right"><?php echo e(trans('app.sale_price'), false); ?>:</th>
								<td style="width: 75%;"> <?php echo e(get_formated_currency($inventory->sale_price, true, 2), false); ?> </td>
							</tr>

							<tr>
								<th class="text-right"><?php echo e(trans('app.stock_quantity'), false); ?>:</th>
								<td style="width: 75%;"> <?php echo e($inventory->stock_quantity, false); ?> </td>
							</tr>

							<tr>
								<th class="text-right"><?php echo e(trans('app.min_order_quantity'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($inventory->min_order_quantity, false); ?></td>
							</tr>

					    	<?php
					    		$attributes = $inventory->attributes->toArray();
					    		$attributeValues = $inventory->attributeValues->toArray();
					    	?>

				            <?php if(count($attributes) > 0): ?>
								<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<th class="text-right"><?php echo e($attribute['name'], false); ?>:</th>
										<td style="width: 75%;"><?php echo e($attributeValues[$k]['value'] ?? trans('help.not_available'), false); ?></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>

							<tr>
								<th class="text-right"><?php echo e(trans('app.condition'), false); ?>:</th>
								<td style="width: 75%;"><?php echo $inventory->condition; ?></td>
							</tr>

				            <?php if($inventory->condition_note): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.condition_note'), false); ?>:</th>
									<td style="width: 75%;"> <?php echo e($inventory->condition_note, false); ?> </td>
								</tr>
							<?php endif; ?>

							<?php if($inventory->product->requires_shipping): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.shipping_weight'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e(get_formated_weight($inventory->shipping_weight), false); ?></td>
								</tr>
								<tr>
									<th class="text-right"><?php echo e(trans('app.packagings'), false); ?>:</th>
									<td style="width: 75%;">
										<?php $__empty_1 = true; $__currentLoopData = $inventory->packagings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packaging): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<label class="label label-outline"><?php echo e($packaging->name, false); ?></label>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<span><?php echo e(trans('app.packaging_not_available'), false); ?></span>
										<?php endif; ?>
									</td>
								</tr>
							<?php endif; ?>

				            <?php if($inventory->puchase_price): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.puchase_price'), false); ?>:</th>
									<td style="width: 75%;"> <?php echo e(get_formated_currency($inventory->puchase_price, true, 2), false); ?> </td>
								</tr>
							<?php endif; ?>

				            <?php if($inventory->damaged_quantity): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.damaged_quantity'), false); ?>:</th>
									<td style="width: 75%;"> <?php echo e($inventory->damaged_quantity, false); ?> </td>
								</tr>
							<?php endif; ?>

				            <?php if($inventory->supplier): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.supplier'), false); ?>:</th>
									<td style="width: 75%;"> <?php echo e($inventory->supplier->name, false); ?> </td>
								</tr>
							<?php endif; ?>

				            <?php if($inventory->warehouse): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.warehouse'), false); ?>:</th>
									<td style="width: 75%;"> <?php echo e($inventory->warehouse->name, false); ?> </td>
								</tr>
							<?php endif; ?>
				        </table>
				    </div>
				    <!-- /.tab-pane -->

				    <div class="tab-pane" id="productinfo_tab">
				        <table class="table">
			                <tr>
			                	<th class="text-right"><?php echo e(trans('app.name'), false); ?>: </th>
			                	<td style="width: 75%;"><?php echo e($inventory->product->name, false); ?></td>
				            </tr>

			                <tr>
			                	<th class="text-right"><?php echo e(trans('app.categories'), false); ?>: </th>
			                	<td style="width: 75%;">
						          	<?php $__currentLoopData = $inventory->product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							          	<span class="label label-outline"><?php echo e($category->name, false); ?></span>
							        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                </td>
				            </tr>

				            <?php if($inventory->product->gtin_type && $inventory->product->gtin ): ?>
				                <tr>
				                	<th class="text-right"><?php echo e($inventory->product->gtin_type, false); ?>: </th>
				                	<td style="width: 75%;"><?php echo e($inventory->product->gtin, false); ?></td>
				                </tr>
				            <?php endif; ?>

				            <?php if($inventory->product->mpn): ?>
				                <tr>
				                	<th class="text-right"><?php echo e(trans('app.mpn'), false); ?>: </th>
				                	<td style="width: 75%;"><?php echo e($inventory->product->mpn, false); ?></td>
				                </tr>
				            <?php endif; ?>

				            <?php if($inventory->product->manufacturer): ?>
				                <tr>
				                	<th class="text-right"><?php echo e(trans('app.manufacturer'), false); ?>: </th>
				                	<td style="width: 75%;"><?php echo e($inventory->product->manufacturer->name, false); ?></td>
				                </tr>
				            <?php endif; ?>

				            <?php if($inventory->product->origin): ?>
				                <tr>
				                	<th class="text-right"><?php echo e(trans('app.origin'), false); ?>: </th>
				                	<td style="width: 75%;"><?php echo e($inventory->product->origin->name, false); ?></td>
				                </tr>
				            <?php endif; ?>

							<tr>
								<th class="text-right"><?php echo e(trans('app.has_variant'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($inventory->product->has_variant ? trans('app.yes') : trans('app.no'), false); ?></td>
							</tr>

			                <tr>
			                	<th class="text-right"><?php echo e(trans('app.downloadable'), false); ?>: </th>
			                	<td style="width: 75%;">
									<?php echo e($inventory->product->downloadable ? trans('app.yes') : trans('app.no'), false); ?>

								</td>
			                </tr>

			                <tr>
			                	<th class="text-right"><?php echo e(trans('app.requires_shipping'), false); ?>: </th>
			                	<td style="width: 75%;">
									<?php echo e($inventory->product->requires_shipping ? trans('app.yes') : trans('app.no'), false); ?>

								</td>
			                </tr>

				            <?php if($inventory->product->min_price && $inventory->product->min_price > 0): ?>
				                <tr>
				                	<th class="text-right"><?php echo e(trans('app.min_price'), false); ?>: </th>
				                	<td style="width: 75%;"><?php echo e(get_formated_currency($inventory->product->min_price, true, 2), false); ?></td>
				                </tr>
				            <?php endif; ?>
				            <?php if($inventory->product->max_price && $inventory->product->max_price > 0): ?>
				                <tr>
				                	<th class="text-right"><?php echo e(trans('app.max_price'), false); ?>: </th>
				                	<td style="width: 75%;"><?php echo e(get_formated_currency($inventory->product->max_price, true, 2), false); ?></td>
				                </tr>
				            <?php endif; ?>

			                <tr>
			                	<th class="text-right"><?php echo e(trans('app.description'), false); ?>: </th>
			                	<td style="width: 75%;">
				            		<?php echo htmlspecialchars_decode($inventory->product->description); ?>

			                	</td>
			                </tr>

				        </table>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="description_tab">
					  <div class="box-body">
				        <?php if($inventory->description): ?>
				            <?php echo $inventory->description; ?>

				        <?php else: ?>
				            <p><?php echo e(trans('app.description_not_available'), false); ?> </p>
				        <?php endif; ?>
					  </div>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="offer_tab">
				        <table class="table">
				            <?php if($inventory->offer_price && $inventory->offer_price > 0): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.offer_price'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e(get_formated_currency($inventory->offer_price, true, 2), false); ?></td>
								</tr>
					        <?php else: ?>
								<tr>
									<th><?php echo e(trans('app.no_offer_available'), false); ?></th>
								</tr>
							<?php endif; ?>
				            <?php if($inventory->offer_start): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.offer_start'), false); ?>:</th>
									<td style="width: 75%;">
										<?php echo e($inventory->offer_start->toDayDateTimeString() .' - '. $inventory->offer_start->diffForHumans(), false); ?>

									</td>
								</tr>
							<?php endif; ?>
				            <?php if($inventory->offer_end): ?>
								<tr>
									<th class="text-right"><?php echo e(trans('app.offer_end'), false); ?>:</th>
									<td style="width: 75%;"><?php echo e($inventory->offer_end->toDayDateTimeString() .' - '. $inventory->offer_end->diffForHumans(), false); ?></td>
								</tr>
							<?php endif; ?>
				        </table>
				    </div>
				  	<!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/inventory/_show.blade.php ENDPATH**/ ?>