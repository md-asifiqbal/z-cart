<?php $__env->startSection('content'); ?>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Inventory::class)): ?>
		<?php echo $__env->make('admin.inventory._add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>

	<div class="box">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="<?php echo e(Request::has('tab') ? '' : 'active', false); ?>"><a href="#active_inventory_tab" data-toggle="tab">
					<i class="fa fa-superpowers hidden-sm"></i>
					<?php echo e(trans('app.active_stocks'), false); ?>

				</a></li>
				<li class="<?php echo e(Request::input('tab') == 'inactive_listings' ? 'active' : '', false); ?>"><a href="#inactive_listings_tab" data-toggle="tab">
					<i class="fa fa-bell-o hidden-sm"></i>
					<?php echo e(trans('app.inactive_stocks'), false); ?>

				</a></li>
				<li class="<?php echo e(Request::input('tab') == 'out_of_stock' ? 'active' : '', false); ?>"><a href="#stock_out_tab" data-toggle="tab">
					<i class="fa fa-bullhorn hidden-sm"></i>
					<?php echo e(trans('app.out_of_stock'), false); ?>

				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane <?php echo e(Request::has('tab') ? '' : 'active', false); ?>" id="active_inventory_tab">
					<table class="table table-hover table-2nd-no-sort">
						<thead>
							<tr>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Inventory::class)): ?>
									<th class="massActionWrapper">
						                <!-- Check all button -->
										<div class="btn-group ">
											<button type="button" class="btn btn-xs btn-default checkbox-toggle">
												<i class="fa fa-square-o" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.select_all'), false); ?>"></i>
											</button>
											<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only"><?php echo e(trans('app.toggle_dropdown'), false); ?></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
												<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
											</ul>
										</div>
									</th>
								<?php endif; ?>
								<th><?php echo e(trans('app.image'), false); ?></th>
								<th><?php echo e(trans('app.sku'), false); ?></th>
								<th><?php echo e(trans('app.title'), false); ?></th>
								<th><?php echo e(trans('app.condition'), false); ?></th>
								<th><?php echo e(trans('app.price'), false); ?> <small>( <?php echo e(trans('app.excl_tax'), false); ?> )</small> </th>
								<th><?php echo e(trans('app.quantity'), false); ?></th>
								<th><?php echo e(trans('app.option'), false); ?></th>
							</tr>
						</thead>
				        <tbody id="massSelectArea">
							<?php $__currentLoopData = $inventories->where('active', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="<?php echo e($inventory->isLowQtt() ? 'danger' : '', false); ?>">
								  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Inventory::class)): ?>
										<td><input id="<?php echo e($inventory->id, false); ?>" type="checkbox" class="massCheck"></td>
								  	<?php endif; ?>
									<td>
										<img src="<?php echo e(get_product_img_src($inventory, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
									</td>
									<td><?php echo e($inventory->sku, false); ?></td>
									<td><?php echo $inventory->title; ?></td>
									<td><?php echo e($inventory->condition, false); ?></td>
									<td>
										<?php if(($inventory->offer_price > 0) && ($inventory->offer_end > \Carbon\Carbon::now())): ?>
											<?php
												$offer_price_help =
													trans('help.offer_starting_time') . ': ' .
													$inventory->offer_start->diffForHumans() . ' ' . trans('app.and') . ' ' .
													trans('help.offer_ending_time') . ': ' .
													$inventory->offer_end->diffForHumans();
											?>

											<small class="text-muted"><?php echo e($inventory->sale_price, false); ?></small><br/>
											<?php echo e(get_formated_currency($inventory->offer_price, true, 2), false); ?>


											<small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e($offer_price_help, false); ?>"><sup><i class="fa fa-question"></i></sup></small>
										<?php else: ?>
											<?php echo e(get_formated_currency($inventory->sale_price, true, 2), false); ?>

										<?php endif; ?>
									</td>
									<td>
										<?php if(Gate::allows('update', $inventory)): ?>
											<a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.editQtt', $inventory->id), false); ?>" class="ajax-modal-btn qtt-<?php echo e($inventory->id, false); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.update'), false); ?>">
												<?php echo e(($inventory->stock_quantity > 0) ? $inventory->stock_quantity : trans('app.out_of_stock'), false); ?>

											</a>
										<?php else: ?>
											<?php echo e(($inventory->stock_quantity > 0) ? $inventory->stock_quantity : trans('app.out_of_stock'), false); ?>

										<?php endif; ?>
									</td>
									<td class="row-options">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $inventory)): ?>
											<a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.show', $inventory->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i></a>&nbsp;
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $inventory)): ?>
											<a href="<?php echo e(route('admin.stock.inventory.edit', $inventory->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $inventory)): ?>
											<?php echo Form::open(['route' => ['admin.stock.inventory.trash', $inventory->id], 'method' => 'delete', 'class' => 'data-form']); ?>

												<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

											<?php echo Form::close(); ?>

										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>

			    <div class="tab-pane <?php echo e(Request::input('tab') == 'inactive_listings' ? 'active' : '', false); ?>" id="inactive_listings_tab">
					<table class="table table-hover table-2nd-no-sort">
						<thead>
							<tr>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Inventory::class)): ?>
									<th class="massActionWrapper">
						                <!-- Check all button -->
										<div class="btn-group ">
											<button type="button" class="btn btn-xs btn-default checkbox-toggle">
												<i class="fa fa-square-o" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.select_all'), false); ?>"></i>
											</button>
											<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only"><?php echo e(trans('app.toggle_dropdown'), false); ?></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
												<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
											</ul>
										</div>
									</th>
								<?php endif; ?>
								<th><?php echo e(trans('app.image'), false); ?></th>
								<th><?php echo e(trans('app.sku'), false); ?></th>
								<th><?php echo e(trans('app.title'), false); ?></th>
								<th><?php echo e(trans('app.condition'), false); ?></th>
								<th><?php echo e(trans('app.price'), false); ?> <small>( <?php echo e(trans('app.excl_tax'), false); ?> )</small> </th>
								<th><?php echo e(trans('app.quantity'), false); ?></th>
								<th><?php echo e(trans('app.option'), false); ?></th>
							</tr>
						</thead>
				        <tbody id="massSelectArea2">
							<?php $__currentLoopData = $inventories->where('active', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="<?php echo e($inventory->isLowQtt() ? 'danger' : '', false); ?>">
								  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Inventory::class)): ?>
										<td><input id="<?php echo e($inventory->id, false); ?>" type="checkbox" class="massCheck"></td>
								  	<?php endif; ?>
									<td>
										<img src="<?php echo e(get_product_img_src($inventory, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
									</td>
									<td><?php echo e($inventory->sku, false); ?></td>
									<td><?php echo $inventory->title; ?></td>
									<td><?php echo e($inventory->condition, false); ?></td>
									<td>
										<?php if(($inventory->offer_price > 0) && ($inventory->offer_end > \Carbon\Carbon::now())): ?>
											<?php $offer_price_help =
													trans('help.offer_starting_time') . ': ' .
													$inventory->offer_start->diffForHumans() . ' and ' .
													trans('help.offer_ending_time') . ': ' .
													$inventory->offer_end->diffForHumans(); ?>

											<small class="text-muted"><?php echo e($inventory->sale_price, false); ?></small><br/>
											<?php echo e(get_formated_currency($inventory->offer_price, true, 2), false); ?>


											<small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e($offer_price_help, false); ?>"><sup><i class="fa fa-question"></i></sup></small>
										<?php else: ?>
											<?php echo e(get_formated_currency($inventory->sale_price, true, 2), false); ?>

										<?php endif; ?>
									</td>
									<td><?php echo e(($inventory->stock_quantity > 0) ? $inventory->stock_quantity : trans('app.out_of_stock'), false); ?></td>
									<td class="row-options">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $inventory)): ?>
											<a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.show', $inventory->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i></a>&nbsp;
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $inventory)): ?>
											<a href="<?php echo e(route('admin.stock.inventory.edit', $inventory->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $inventory)): ?>
											<?php echo Form::open(['route' => ['admin.stock.inventory.trash', $inventory->id], 'method' => 'delete', 'class' => 'data-form']); ?>

												<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

											<?php echo Form::close(); ?>

										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>

			    <div class="tab-pane <?php echo e(Request::input('tab') == 'out_of_stock' ? 'active' : '', false); ?>" id="stock_out_tab">
					<table class="table table-hover table-2nd-no-sort">
						<thead>
							<tr>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Inventory::class)): ?>
									<th class="massActionWrapper">
						                <!-- Check all button -->
										<div class="btn-group ">
											<button type="button" class="btn btn-xs btn-default checkbox-toggle">
												<i class="fa fa-square-o" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.select_all'), false); ?>"></i>
											</button>
											<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only"><?php echo e(trans('app.toggle_dropdown'), false); ?></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
												<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
											</ul>
										</div>
									</th>
								<?php endif; ?>
								<th><?php echo e(trans('app.image'), false); ?></th>
								<th><?php echo e(trans('app.sku'), false); ?></th>
								<th><?php echo e(trans('app.title'), false); ?></th>
								<th><?php echo e(trans('app.condition'), false); ?></th>
								<th><?php echo e(trans('app.price'), false); ?> <small>( <?php echo e(trans('app.excl_tax'), false); ?> )</small> </th>
								<th><?php echo e(trans('app.quantity'), false); ?></th>
								<th><?php echo e(trans('app.option'), false); ?></th>
							</tr>
						</thead>
						<tbody id="massSelectArea3">
							<?php $__currentLoopData = $inventories->where('stock_quantity', '<=', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
								  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Inventory::class)): ?>
										<td><input id="<?php echo e($inventory->id, false); ?>" type="checkbox" class="massCheck"></td>
								  	<?php endif; ?>
									<td>
										<img src="<?php echo e(get_product_img_src($inventory, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
									</td>
									<td><?php echo e($inventory->sku, false); ?></td>
									<td><?php echo $inventory->title; ?></td>
									<td><?php echo e($inventory->condition, false); ?></td>
									<td>
										<?php if(($inventory->offer_price > 0) && ($inventory->offer_end > \Carbon\Carbon::now())): ?>
											<?php $offer_price_help =
													trans('help.offer_starting_time') . ': ' .
													$inventory->offer_start->diffForHumans() . ' and ' .
													trans('help.offer_ending_time') . ': ' .
													$inventory->offer_end->diffForHumans(); ?>

											<small class="text-muted"><?php echo e($inventory->sale_price, false); ?></small><br/>
											<?php echo e(get_formated_currency($inventory->offer_price, true, 2), false); ?>


											<small class="text-muted" data-toggle="tooltip" data-placement="top" title="<?php echo e($offer_price_help, false); ?>"><sup><i class="fa fa-question"></i></sup></small>
										<?php else: ?>
											<?php echo e(get_formated_currency($inventory->sale_price, true, 2), false); ?>

										<?php endif; ?>
									</td>
									<td>
										<?php if(Gate::allows('update', $inventory)): ?>
											<a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.editQtt', $inventory->id), false); ?>" class="ajax-modal-btn qtt-<?php echo e($inventory->id, false); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.update'), false); ?>">
												<?php echo e(($inventory->stock_quantity > 0) ? $inventory->stock_quantity : trans('app.out_of_stock'), false); ?>

											</a>
										<?php else: ?>
											<?php echo e(($inventory->stock_quantity > 0) ? $inventory->stock_quantity : trans('app.out_of_stock'), false); ?>

										<?php endif; ?>
									</td>
									<td class="row-options">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $inventory)): ?>
											<a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.show', $inventory->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i></a>&nbsp;
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $inventory)): ?>
											<a href="<?php echo e(route('admin.stock.inventory.edit', $inventory->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $inventory)): ?>
											<?php echo Form::open(['route' => ['admin.stock.inventory.trash', $inventory->id], 'method' => 'delete', 'class' => 'data-form']); ?>

												<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

											<?php echo Form::close(); ?>

										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->

	<div class="box collapsed-box">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Inventory::class)): ?>
					<?php echo Form::open(['route' => ['admin.stock.inventory.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

						<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm btn btn-default btn-flat ajax-silent', 'title' => trans('help.empty_trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'right']); ?>

					<?php echo Form::close(); ?>

				<?php else: ?>
					<i class="fa fa-trash-o"></i>
				<?php endif; ?>
				<?php echo e(trans('app.trash'), false); ?>

			</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-no-sort">
				<thead>
					<tr>
						<th><?php echo e(trans('app.image'), false); ?></th>
						<th><?php echo e(trans('app.sku'), false); ?></th>
						<th><?php echo e(trans('app.title'), false); ?></th>
						<th><?php echo e(trans('app.condition'), false); ?></th>
						<th><?php echo e(trans('app.price'), false); ?></th>
						<th><?php echo e(trans('app.quantity'), false); ?></th>
						<th><?php echo e(trans('app.deleted_at'), false); ?></th>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
						  	<?php if($trash->image): ?>
								<img src="<?php echo e(get_storage_file_url($trash->image->path, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
							<?php else: ?>
								<img src="<?php echo e(get_storage_file_url(optional($trash->product->image)->path, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
							<?php endif; ?>
						</td>
						<td><?php echo e($trash->sku, false); ?></td>
						<td><?php echo e($trash->title, false); ?></td>
						<td><?php echo e($trash->condition, false); ?></td>
						<td><?php echo e(get_formated_currency($trash->sale_price, true, 2), false); ?></td>
						<td><?php echo e($trash->stock_quantity, false); ?></td>
						<td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
								<a href="<?php echo e(route('admin.stock.inventory.restore', $trash->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

								<?php echo Form::open(['route' => ['admin.stock.inventory.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']); ?>

									<?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete_permanently'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

								<?php echo Form::close(); ?>

							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/inventory/index.blade.php ENDPATH**/ ?>