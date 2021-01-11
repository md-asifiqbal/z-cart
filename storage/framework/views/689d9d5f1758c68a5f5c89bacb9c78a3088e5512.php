<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.products'), false); ?></h3>
			<div class="box-tools pull-right">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Product::class)): ?>
					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.product.bulk'), false); ?>" class="ajax-modal-btn btn btn-default btn-flat"><?php echo e(trans('app.bulk_import'), false); ?></a>
					<a href="<?php echo e(route('admin.catalog.product.create'), false); ?>" class=" btn btn-new btn-flat"><?php echo e(trans('app.add_product'), false); ?></a>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
		    <table class="table table-hover" id="all-product-table">
		        <thead>
					<tr>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Product::class)): ?>
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
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.product.massTrash'), false); ?>" class="massAction" data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.product.massDestroy'), false); ?>" class="massAction" data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
									</ul>
								</div>
							</th>
						<?php else: ?>
							<th></th>
						<?php endif; ?>
						<th><?php echo e(trans('app.image'), false); ?></th>
						<th><?php echo e(trans('app.name'), false); ?></th>
						<th><?php echo e(trans('app.gtin'), false); ?></th>
						<th width="20%"><?php echo e(trans('app.category'), false); ?></th>
						<th><?php echo e(trans('app.listing'), false); ?></th>
						<?php if(Auth::user()->isFromPlatform()): ?>
							<th width="15%"><?php echo e(trans('app.added_by'), false); ?></th>
						<?php else: ?>
							<th></th>
						<?php endif; ?>
						<th><?php echo e(trans('app.option'), false); ?></th>
					</tr>
		        </thead>
		        <tbody id="massSelectArea">
		        </tbody>
		    </table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->

	
		<div class="box collapsed-box">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Product::class)): ?>
						<?php echo Form::open(['route' => ['admin.catalog.product.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

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
				<table class="table table-hover table-2nd-sort">
					<thead>
						<tr>
							<th><?php echo e(trans('app.image'), false); ?></th>
							<th><?php echo e(trans('app.name'), false); ?></th>
							<th><?php echo e(trans('app.model_number'), false); ?></th>
							<th><?php echo e(trans('app.category'), false); ?></th>
							<th><?php echo e(trans('app.option'), false); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<?php if($trash->featuredImage): ?>
									<img src="<?php echo e(get_storage_file_url(optional($trash->featuredImage)->path, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.featured_image'), false); ?>">
								<?php else: ?>
									<img src="<?php echo e(get_storage_file_url(optional($trash->image)->path, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
								<?php endif; ?>
							</td>
							<td><?php echo e($trash->name, false); ?></td>
							<td><?php echo e($trash->model_number, false); ?></td>
							<td>
								<?php $__currentLoopData = $trash->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<span class="label label-outline"><?php echo e($category->name, false); ?></span>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</td>
							<td class="row-options">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
									<a href="<?php echo e(route('admin.catalog.product.restore', $trash->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

									<?php echo Form::open(['route' => ['admin.catalog.product.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/product/index.blade.php ENDPATH**/ ?>