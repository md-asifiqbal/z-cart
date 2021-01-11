<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-3 nopadding" style="margin-top: 10px;">
			  	<?php if($product->featuredImage): ?>
					<img src="<?php echo e(get_storage_file_url(optional($product->featuredImage)->path, 'medium'), false); ?>" class="thumbnail" width="100%" alt="<?php echo e(trans('app.featured_image'), false); ?>">
				<?php else: ?>
					<img src="<?php echo e(get_storage_file_url(optional($product->image)->path, 'medium'), false); ?>" class="thumbnail" width="100%" alt="<?php echo e(trans('app.featured_image'), false); ?>">
				<?php endif; ?>
			</div>
            <div class="col-md-9 nopadding">
				<table class="table no-border">
					<tr>
						<th class="text-right"><?php echo e(trans('app.name'), false); ?>:</th>
						<td style="width: 75%;"><span class="lead"><?php echo e($product->name, false); ?></span></td>
					</tr>

		            <?php if($product->brand): ?>
		                <tr>
		                	<th class="text-right"><?php echo e(trans('app.brand'), false); ?>: </th>
		                	<td style="width: 75%;"><?php echo e($product->brand, false); ?></td>
		                </tr>
		            <?php endif; ?>

		            <?php if($product->model_number): ?>
						<tr>
							<th class="text-right"><?php echo e(trans('app.model_number'), false); ?>:</th>
							<td style="width: 75%;"><?php echo e($product->model_number, false); ?></td>
						</tr>
					<?php endif; ?>

	                <tr>
	                	<th class="text-right"><?php echo e(trans('app.status'), false); ?>: </th>
	                	<td style="width: 75%;"><?php echo e($product->active ? trans('app.active') : trans('app.inactive'), false); ?></td>
	                </tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.available_from'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($product->created_at->toFormattedDateString(), false); ?></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.updated_at'), false); ?>:</th>
						<td style="width: 75%;"><?php echo e($product->updated_at->toDayDateTimeString(), false); ?></td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#basic_info_tab" data-toggle="tab">
					<?php echo e(trans('app.basic_info'), false); ?>

				  </a></li>
				  <li><a href="#description_tab" data-toggle="tab">
					<?php echo e(trans('app.description'), false); ?>

				  </a></li>
				  <li><a href="#listings_tab" data-toggle="tab">
					<?php echo e(trans('app.listings'), false); ?>

				  </a></li>
				  <li><a href="#seo_tab" data-toggle="tab">
					<?php echo e(trans('app.seo'), false); ?>

				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="basic_info_tab">
				        <table class="table">
							<tr>
								<th><?php echo e(trans('app.requires_shipping'), false); ?>:</th>
								<td><?php echo e($product->requires_shipping ? trans('app.yes') : trans('app.no'), false); ?></td>
							</tr>

							

							<tr>
								<th><?php echo e(trans('app.has_variant'), false); ?>:</th>
								<td><?php echo e($product->has_variant ? trans('app.yes') : trans('app.no'), false); ?></td>
							</tr>

				            <?php if($product->manufacturer): ?>
				                <tr>
				                	<th><?php echo e(trans('app.manufacturer'), false); ?>: </th>
				                	<td><?php echo e($product->manufacturer->name, false); ?></td>
				                </tr>
				            <?php endif; ?>

				            <?php if($product->origin): ?>
				                <tr>
				                	<th><?php echo e(trans('app.origin'), false); ?>: </th>
				                	<td><?php echo e($product->origin->name, false); ?></td>
				                </tr>
				            <?php endif; ?>

				            <?php if($product->gtin_type && $product->gtin ): ?>
				                <tr>
				                	<th><?php echo e($product->gtin_type, false); ?>: </th>
				                	<td><?php echo e($product->gtin, false); ?></td>
				                </tr>
				            <?php endif; ?>

				            <?php if($product->mpn): ?>
				                <tr>
				                	<th><?php echo e(trans('app.mpn'), false); ?>: </th>
				                	<td><?php echo e($product->mpn, false); ?></td>
				                </tr>
				            <?php endif; ?>

			                <tr>
			                	<th><?php echo e(trans('app.categories'), false); ?>: </th>
			                	<td>
						          	<?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							          	<span class="label label-outline"><?php echo e($category->name, false); ?></span>
							        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                </td>
				            </tr>

				            <?php if($product->min_price && $product->min_price != 0): ?>
				                <tr>
				                	<th><?php echo e(trans('app.min_price'), false); ?>: </th>
				                	<td><?php echo e(get_formated_currency($product->min_price, true, 2), false); ?></td>
				                </tr>
				            <?php endif; ?>
				            <?php if($product->max_price && $product->max_price != 0): ?>
				                <tr>
				                	<th><?php echo e(trans('app.max_price'), false); ?>: </th>
				                	<td><?php echo e(get_formated_currency($product->max_price, true, 2), false); ?></td>
				                </tr>
				            <?php endif; ?>
				        </table>
				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="description_tab">
					  <div class="box-body">
				        <?php if($product->description): ?>
				            <?php echo htmlspecialchars_decode($product->description); ?>

				        <?php else: ?>
				            <p><?php echo e(trans('app.description_not_available'), false); ?> </p>
				        <?php endif; ?>
					  </div>
				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="listings_tab">
				        <table class="table">
			                <thead>
				                <tr>
									<th><?php echo e(trans('app.vendor'), false); ?></th>
				                	<th><?php echo e(trans('app.stock_quantity'), false); ?> </th>
				                	<th><?php echo e(trans('app.condition'), false); ?> </th>
				                	<th><?php echo e(trans('app.price'), false); ?> </th>
				                	<th><?php echo e(trans('app.options'), false); ?> </th>
				                </tr>
				            </thead>
				            <tbody>
						        <?php $__currentLoopData = $product->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					            	<tr>
										<td>
											<?php echo e($listing->shop->name, false); ?>


						            		<?php if($listing->shop->isVerified()): ?>
												<img src="<?php echo e(get_verified_badge(), false); ?>" class="verified-badge img-xs" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.verified_seller'), false); ?>" alt="verified-badge">
											<?php endif; ?>

						            		<?php if($listing->shop->isDown()): ?>
									          	<span class="label label-default indent10"><?php echo e(trans('app.maintenance_mode'), false); ?></span>
											<?php endif; ?>
										</td>
										<td>
											<?php echo e(($listing->stock_quantity > 0) ? $listing->stock_quantity : trans('app.out_of_stock'), false); ?>

										</td>
										<td>
											<?php echo e($listing->condition, false); ?>

											<small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e($listing->condition_note, false); ?>"><sup><i class="fa fa-question-circle"></i></sup></small>
										</td>
										<td>
											<?php if($listing->hasOffer()): ?>
												<?php
													$offer_price_help =
														trans('help.offer_starting_time') . ': ' .
														$listing->offer_start->diffForHumans() . ' ' . trans('app.and') . ' ' .
														trans('help.offer_ending_time') . ': ' .
														$listing->offer_end->diffForHumans();
												?>

												<small class="text-muted"><?php echo e(get_formated_currency($listing->sale_price, true, 2), false); ?></small>
												<small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e($offer_price_help, false); ?>"><sup><i class="fa fa-question-circle"></i></sup></small><br/>
											<?php endif; ?>
											<?php echo e(get_formated_currency($listing->currnt_sale_price(), true, 2), false); ?>

										</td>
										<td>
											<a href="<?php echo e(route('show.product', $listing->slug), false); ?>" target="_blank">
												<?php echo e(trans('app.view_detail'), false); ?>

											</a>

										</td>
					            	</tr>
				            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				            </tbody>
				        </table>
				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="seo_tab">
				        <table class="table">
				            <?php if($product->slug): ?>
				                <tr>
				                	<th><?php echo e(trans('app.slug'), false); ?>: </th>
				                	<td><?php echo e($product->slug, false); ?></td>
				                </tr>
				            <?php endif; ?>
				            <?php if($product->meta_title): ?>
				                <tr>
				                	<th><?php echo e(trans('app.meta_title'), false); ?>: </th>
				                	<td><?php echo e($product->meta_title, false); ?></td>
				                </tr>
				            <?php endif; ?>
				            <?php if($product->meta_description): ?>
				                <tr>
				                	<th><?php echo e(trans('app.meta_description'), false); ?>: </th>
				                	<td><?php echo e($product->meta_description, false); ?></td>
				                </tr>
				            <?php endif; ?>
				            <?php if($product->meta_keywords): ?>
				                <tr>
				                	<th><?php echo e(trans('app.meta_keywords'), false); ?>: </th>
				                	<td><?php echo e($product->meta_keywords, false); ?></td>
				                </tr>
				            <?php endif; ?>
				            <?php if($product->tags): ?>
				                <tr>
				                	<th><?php echo e(trans('app.tags'), false); ?>: </th>
				                	<td>
							          	<?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								          	<span class="label label-outline"><?php echo e($tag->name, false); ?></span>
								        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                	</td>
				                </tr>
				            <?php endif; ?>
				        </table>
				    </div> <!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/product/_show.blade.php ENDPATH**/ ?>