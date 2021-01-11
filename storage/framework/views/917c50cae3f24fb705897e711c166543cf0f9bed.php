<?php
	$geoip = geoip(request()->ip());
	$shipping_country = $business_areas->where('iso_code', $geoip->iso_code)->first();
	$shipping_state = \DB::table('states')->select('id', 'name', 'iso_code')->where([
		['country_id', '=', $shipping_country->id], ['iso_code', '=', $geoip->state]
	])->first();

	$shipping_zone = get_shipping_zone_of($item->shop_id, $shipping_country->id, optional($shipping_state)->id);
	$shipping_options = isset($shipping_zone->id) ? getShippingRates($shipping_zone->id) : 'NaN';
?>

<section>
	<div class="container">
		<div class="row sc-product-item" id="single-product-wrapper">
		  	<div class="col-md-5 col-sm-6">
		  		<?php echo $__env->make('layouts.jqzoom', ['item' => $item, 'variants' => $variants], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		  	</div><!-- /.col-md-5 col-sm-6 -->

		  	<div class="col-md-7 col-sm-6">
		  		<div class="row">
				  	<div class="col-md-7 col-sm-6 nopadding">
				      	<div class="product-single">
					  		<?php echo $__env->make('layouts.product_info', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			              	<div class="space20"></div>

				          	<div class="product-info-options space10">
				              	<div class="select-box-wrapper">
				              		<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                  	<div class="row product-attribute">
										  	<div class="col-sm-3 col-xs-4">
					    	              		<span class="info-label" id="attr-<?php echo e(str_slug($attribute->name), false); ?>" ><?php echo e($attribute->name, false); ?>:</span>
											</div>
										  	<div class="col-sm-9 col-xs-8 nopadding-left">
							                    <select class="product-attribute-selector <?php echo e($attribute->css_classes, false); ?>" id="attribute-<?php echo e($attribute->id, false); ?>" required="required">
								              		<?php $__currentLoopData = $attribute->attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						                          		<option value="<?php echo e($option->id, false); ?>" data-color="<?php echo e($option->color ?? $option->value, false); ?>" <?php echo e(in_array($option->id, $item_attrs) ? 'selected' : '', false); ?>><?php echo e($option->value, false); ?></option>
								              		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                      	</select>
												<div class="help-block with-errors"></div>
							              	</div><!-- /.col-sm-9 .col-xs-6 -->
						              	</div><!-- /.row -->
				              		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				              	</div><!-- /.row .select-box-wrapper -->

					          	<div class="sep"></div>

				              	<div id="calculation-section">
				                  	<div class="row" style="display:none;">
									  	<div class="col-sm-3 col-xs-4">
                                          <span class="info-label" data-options="<?php echo e($shipping_options, false); ?>" id="shipping-options" ><?php echo app('translator')->getFromJson('theme.shipping'); ?>:</span>
										</div>
									  	<div class="col-sm-9 col-xs-8 nopadding-left">
				                            <span id="summary-shipping-cost" data-value="0"></span>
					                        
						              	</div><!-- /.col-sm-9 .col-xs-6 -->
					              	</div><!-- /.row -->

				                  	<div class="row">
									  	<div class="col-sm-3 col-xs-4">
				    	              		<span class="info-label qtt-label"><?php echo app('translator')->getFromJson('theme.quantity'); ?>:</span>
										</div>
									  	<div class="col-sm-9 col-xs-8 nopadding">
							              	<div class="product-qty-wrapper">
							                  	<div class="product-info-qty-item">
							                      	<button class="product-info-qty product-info-qty-minus">-</button>
							                      	<input class="product-info-qty product-info-qty-input" data-name="product_quantity" data-min="<?php echo e($item->min_order_quantity, false); ?>" data-max="<?php echo e($item->stock_quantity, false); ?>" type="text" value="<?php echo e($item->min_order_quantity, false); ?>">
							                      	<button class="product-info-qty product-info-qty-plus">+</button>
								                </div>
							                  	<span class="available-qty-count"><?php echo app('translator')->getFromJson('theme.stock_count', ['count' => $item->stock_quantity]); ?></span>
							              	</div>
						              	</div><!-- /.col-sm-9 .col-xs-6 -->
				                  	</div><!-- /.row -->

				                  	<div class="row" id="order-total-row">
									  	<div class="col-sm-3 col-xs-4">
				    	              		<span class="info-label"><?php echo app('translator')->getFromJson('theme.total'); ?>:</span>
										</div>
									  	<div class="col-sm-9 col-xs-8 nopadding">
				                            <span id="summary-total" class="text-muted"><?php echo e(trans('theme.notify.will_calculated_on_select'), false); ?></span>
						              	</div><!-- /.col-sm-9 .col-xs-6 -->
					              	</div><!-- /.row -->
				              	</div>
				          	</div><!-- /.product-option -->

				          	<div class="sep"></div>

 				          	<a href="<?php echo e(route('direct.checkout', $item->slug), false); ?>" class="btn btn-lg btn-warning flat" id="buy-now-btn"><i class="fa fa-rocket"></i> <?php echo app('translator')->getFromJson('theme.button.buy_now'); ?></a>

 				          	<?php if($item->product->inventories_count > 1): ?>
						        <a href="<?php echo e(route('show.offers', $item->product->slug), false); ?>" class="btn btn-sm btn-link">
					        		<?php echo app('translator')->getFromJson('theme.view_more_offers', ['count' => $item->product->inventories_count]); ?>
						        </a>
					        <?php endif; ?>
				      	</div><!-- /.product-single -->
			  		</div>

				  	<div class="col-md-5 col-sm-6 nopadding-right">
				        <div class="seller-info space30">
				            <div class="text-muted small space10">
				            	<?php echo app('translator')->getFromJson('theme.sold_by'); ?>
				            	<a href="<?php echo e(route('show.store', $item->shop->slug), false); ?>" class="btn-link pull-right">
				            		<?php echo e(trans('theme.button.visit_store'), false); ?>

				            	</a>
				            </div>

							<img src="<?php echo e(get_storage_file_url(optional($item->shop->image)->path, 'thumbnail'), false); ?>" class="seller-info-logo img-sm img-circle" alt="<?php echo e(trans('theme.logo'), false); ?>">

					        <a href="javascript:void(0)" data-toggle="modal" data-target="#shopReviewsModal" class="seller-info-name">
				            	<?php echo $item->shop->getQualifiedName(); ?>

				            </a>

				            <div class="space10"></div>

							<?php echo $__env->make('layouts.ratings', ['ratings' => $item->shop->feedbacks->avg('rating'), 'count' => $item->shop->feedbacks_count, 'shop' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				        </div><!-- /.seller-info -->

			          	<a data-link="<?php echo e(route('cart.addItem', $item->slug), false); ?>" class="btn btn-primary btn-lg btn-block flat space10 sc-add-to-cart">
			          		<i class="fa fa-shopping-bag"></i> <?php echo app('translator')->getFromJson('theme.button.add_to_cart'); ?>
			          	</a>

			          	<?php if($item->product->inventories_count > 1): ?>
					        <a href="<?php echo e(route('show.offers', $item->product->slug), false); ?>" class="btn btn-block btn-link btn-sm">
					        	<?php echo app('translator')->getFromJson('theme.view_more_offers', ['count' => $item->product->inventories_count]); ?>
					        </a>
						<?php endif; ?>

			          	

						<div class="clearfix space20"></div>

						<?php if($item->key_features): ?>
							<div>
						        <div class="section-title">
						          <h4><?php echo trans('theme.section_headings.key_features'); ?></h4>
						        </div>
								<ul class="key_feature_list" id="item_key_features">
									<?php $__currentLoopData = unserialize($item->key_features); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo $key_feature; ?></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						<?php endif; ?>
			  		</div>
		  		</div><!-- /.row -->
		      	<div class="space20"></div>
		  	</div><!-- /.col-md-7 col-sm-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>

<div class="clearfix space20"></div>

<section id="item-desc-section">
    <div class="container">
      	<div class="row">
      		<?php if($linked_items->count()): ?>
		        <div class="col-md-3 bg-light nopadding-right nopadding-left">
			        <div class="section-title">
			          <p class=""><?php echo app('translator')->getFromJson('theme.section_headings.bought_together'); ?>: </p>
			        </div>
					<ul class="sidebar-product-list">
					    <?php $__currentLoopData = $linked_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linkedItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					        <li class="sc-product-item">
					            <div class="product-widget">
					                <div class="product-img-wrap">
					                    <img class="product-img" src="<?php echo e(get_inventory_img_src($linkedItem, 'small'), false); ?>" alt="<?php echo e($linkedItem->title, false); ?>" title="<?php echo e($linkedItem->title, false); ?>" />
					                </div>
					                <div class="product-info space10">
					                    <?php echo $__env->make('layouts.ratings', ['ratings' => $linkedItem->feedbacks->avg('rating')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					                    <a href="<?php echo e(route('show.product', $linkedItem->slug), false); ?>" class="product-info-title" data-name="product_name"><?php echo e($linkedItem->title, false); ?></a>

					                    <?php echo $__env->make('layouts.pricing', ['item' => $linkedItem], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					                </div>
					                <div class="btn-group pull-right">
				                        <a class="btn btn-default btn-xs flat itemQuickView" href="<?php echo e(route('quickView.product', $linkedItem->slug), false); ?>">
				                            <i class="fa fa-external-link" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('theme.button.quick_view'); ?>"></i> <span><?php echo app('translator')->getFromJson('theme.button.quick_view'); ?></span>
				                        </a>

							          	<a data-link="<?php echo e(route('cart.addItem', $linkedItem->slug), false); ?>" class="btn btn-primary btn-xs flat sc-add-to-cart pull-right">
							          		<i class="fa fa-shopping-bag"></i> <?php echo app('translator')->getFromJson('theme.button.add_to_cart'); ?>
							          	</a>
					                </div>
					            </div>
					        </li>
					    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
		        </div><!-- /.col-md-2 -->
	        <?php endif; ?>

	        <div class="col-md-<?php echo e($linked_items->count() ? '9' : '12', false); ?>" id="product_desc_section">
          		<div role="tabpanel">
	              	<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#desc_tab" aria-controls="desc_tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo app('translator')->getFromJson('theme.product_desc'); ?></a>
						</li>
						<li role="presentation">
							<a href="#seller_desc_tab" aria-controls="seller_desc_tab" role="tab" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->getFromJson('theme.product_desc_seller'); ?></a>
						</li>
						<li role="presentation">
							<a href="#reviews_tab" aria-controls="reviews_tab" role="tab" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->getFromJson('theme.customer_reviews'); ?></a>
						</li>
					</ul><!-- /.nav-tab -->

              		<div class="tab-content">
                  		<div role="tabpanel" class="tab-pane fade active in" id="desc_tab">

							<?php echo $item->product->description; ?>


							<div class="clearfix space30"></div>

                		  	<hr class="style4 muted"/>

                		  	<h4><?php echo e(trans('theme.technical_details'), false); ?>: </h4>

							<table class="table table-striped noborder">
								<tbody>
						            <?php if($item->product->brand): ?>
						                <tr class="noborder">
						                	<th class="text-right noborder"><?php echo e(trans('theme.brand'), false); ?>: </th>
						                	<td class="noborder" style="width: 75%;"><?php echo e($item->product->brand, false); ?></td>
						                </tr>
						            <?php endif; ?>

						            <?php if($item->product->model_number): ?>
										<tr class="noborder">
											<th class="text-right noborder"><?php echo e(trans('theme.model_number'), false); ?>:</th>
											<td class="noborder" style="width: 75%;"><?php echo e($item->product->model_number, false); ?></td>
										</tr>
									<?php endif; ?>

						            <?php if($item->product->gtin_type && $item->product->gtin ): ?>
						                <tr class="noborder">
						                	<th class="text-right noborder"><?php echo e($item->product->gtin_type, false); ?>: </th>
						                	<td class="noborder" style="width: 75%;"><?php echo e($item->product->gtin, false); ?></td>
						                </tr>
						            <?php endif; ?>

						            <?php if($item->product->mpn): ?>
						                <tr class="noborder">
						                	<th class="text-right noborder"><?php echo e(trans('theme.mpn'), false); ?>: </th>
						                	<td class="noborder" style="width: 75%;"><?php echo e($item->product->mpn, false); ?></td>
						                </tr>
						            <?php endif; ?>

						            <?php if($item->sku): ?>
						                <tr class="noborder">
						                	<th class="text-right noborder"><?php echo e(trans('theme.sku'), false); ?>: </th>
						                	<td class="noborder" id="item_sku" style="width: 75%;"><?php echo e($item->sku, false); ?></td>
						                </tr>
						            <?php endif; ?>

						            <?php if(optional($item->product->manufacturer)->name): ?>
						                <tr class="noborder">
						                	<th class="text-right noborder"><?php echo e(trans('theme.manufacturer'), false); ?>: </th>
						                	<td class="noborder" style="width: 75%;"><?php echo e($item->product->manufacturer->name, false); ?></td>
						                </tr>
						            <?php endif; ?>

						            <?php if($item->product->origin): ?>
						                <tr class="noborder">
						                	<th class="text-right noborder"><?php echo e(trans('theme.origin'), false); ?>: </th>
						                	<td class="noborder" style="width: 75%;"><?php echo e($item->product->origin->name, false); ?></td>
						                </tr>
						            <?php endif; ?>

						            <?php if($item->min_order_quantity): ?>
						                <tr class="noborder">
						                	<th class="text-right noborder"><?php echo e(trans('theme.min_order_quantity'), false); ?>: </th>
						                	<td class="noborder" id="item_min_order_qtt" style="width: 75%;"><?php echo e($item->min_order_quantity, false); ?></td>
						                </tr>
						            <?php endif; ?>

						            <?php if($item->shipping_weight): ?>
						                <tr class="noborder">
						                	<th class="text-right noborder"><?php echo e(trans('theme.shipping_weight'), false); ?>: </th>
						                	<td class="noborder" id="item_shipping_weight" style="width: 75%;"><?php echo e($item->shipping_weight . ' ' . config('system_settings.weight_unit'), false); ?></td>
						                </tr>
						            <?php endif; ?>

						            <?php if($item->product->created_at): ?>
										<tr class="noborder">
											<th class="text-right noborder"><?php echo e(trans('theme.first_listed_on', ['platform' => get_platform_title()]), false); ?>:</th>
											<td class="noborder" style="width: 75%;"><?php echo e($item->product->created_at->toFormattedDateString(), false); ?></td>
										</tr>
						            <?php endif; ?>
								</tbody>
							</table>
		                </div>

         		        <div role="tabpanel" class="tab-pane fade" id="seller_desc_tab">

         		        	<div id="seller_seller_desc">
	                		  	<?php echo $item->description; ?>

         		        	</div>

                		  	<?php if($item->shop->config->show_shop_desc_with_listing): ?>
        	        		  	<?php if($item->description): ?>
		                		  	<br/><br/><hr class="style4 muted"/>
	                		  	<?php endif; ?>
	                		  	<br/>
	                		  	<h4><?php echo e(trans('theme.seller_info'), false); ?>: </h4>
	                		  	<?php echo $item->shop->description; ?>

                		  	<?php endif; ?>

                		  	<?php if($item->shop->config->show_refund_policy_with_listing && $item->shop->config->return_refund): ?>
	                		  	<br/><br/><hr class="style4 muted"/><br/>

	                		  	<h4><?php echo e(trans('theme.return_and_refund_policy'), false); ?>: </h4>
	                		  	<?php echo $item->shop->config->return_refund; ?>

                		  	<?php endif; ?>
	                  	</div>

		              	<div role="tabpanel" class="tab-pane fade" id="reviews_tab">
                      		<div class="reviews-tab">
	                      		<?php $__empty_1 = true; $__currentLoopData = $item->feedbacks->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<p>
										<b><?php echo e(optional($feedback->customer)->getName(), false); ?></b>

										<span class="pull-right small">
											<b class="text-success"><?php echo app('translator')->getFromJson('theme.verified_purchase'); ?></b>
											<span class="text-muted"> | <?php echo e($feedback->created_at->diffForHumans(), false); ?></span>
										</span>
									</p>

									<p><?php echo e($feedback->comment, false); ?></p>

			                        <?php echo $__env->make('layouts.ratings', ['ratings' => $feedback->rating], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			                        <?php if (! ($loop->last)): ?>
										<div class="sep"></div>
			                        <?php endif; ?>
	                          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	                          		<div class="space20"></div>
	                          		<p class="lead text-center text-muted"><?php echo app('translator')->getFromJson('theme.no_reviews'); ?></p>
	                          	<?php endif; ?>
	                      	</div>
    	              	</div>
	              	</div><!-- /.tab-content -->
          		</div><!-- /.tabpanel -->
        	</div><!-- /.col-md-9 -->
      	</div><!-- /.row -->
    </div><!-- /.container -->
</section>

<div class="clearfix space20"></div><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/contents/product_page.blade.php ENDPATH**/ ?>