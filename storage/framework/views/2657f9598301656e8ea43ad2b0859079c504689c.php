<?php $__env->startSection('content'); ?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo e(trans('app.preview'), false); ?> <small>(<?php echo e(trans('app.total_number_of_rows', ['value' => count($rows)]), false); ?>)</small>
			</h3>
			<div class="box-tools pull-right">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Product::class)): ?>
					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.product.bulk'), false); ?>" class="ajax-modal-btn btn btn-default btn-flat"><?php echo e(trans('app.bulk_import'), false); ?></a>
				<?php endif; ?>
			</div>
		</div> <!-- /.box-header -->

		<div class="box-body">
		    <table class="table table-striped">
		        <thead>
					<tr>
						<th><?php echo e(trans('app.image'), false); ?></th>
						<th width="20%"><?php echo e(trans('app.name'), false); ?></th>
						<th width="25%"><?php echo e(trans('app.description'), false); ?></th>
						<th width="20%"><?php echo e(trans('app.listing'), false); ?></th>
						<th><?php echo e(trans('app.category'), false); ?></th>
						<th><?php echo e(trans('app.tags'), false); ?></th>
						<th><?php echo e(trans('app.has_variant'), false); ?></th>
						<th><?php echo e(trans('app.requires_shipping'), false); ?></th>
						<th><?php echo e(trans('app.active'), false); ?></th>
					</tr>
		        </thead>
		        <tbody>
		        	<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        		

		        		<tr>
		        			<td><img src="<?php echo e($row['image_link'] ?: get_placeholder_img('tiny'), false); ?>" class="img-sm"></td>
		        			<td>
		        				<?php echo e($row['name'], false); ?><br/>
		        				<strong><?php echo e(trans('app.slug'), false); ?>: </strong> <?php echo e($row['slug'] ?: Str::slug($row['name'], '-'), false); ?>

		        			</td>
		        			<td><?php echo $row['description']; ?></td>
		        			<td>
		        				<dl>
		        					<dt><?php echo e(trans('app.gtin'), false); ?>: </dt> <dd><?php echo e($row['gtin_type'] . ' ' . $row['gtin'], false); ?></dd>
		        					<?php if($row['mpn']): ?>
			        					<dt><?php echo e(trans('app.part_number'), false); ?>: </dt> <dd><?php echo e($row['mpn'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['manufacturer']): ?>
		        						<dt><?php echo e(trans('app.manufacturer'), false); ?>: </dt> <dd><?php echo e($row['manufacturer'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['brand']): ?>
		        						<dt><?php echo e(trans('app.brand'), false); ?>: </dt> <dd><?php echo e($row['brand'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['model_number']): ?>
		        						<dt><?php echo e(trans('app.model_number'), false); ?>: </dt> <dd><?php echo e($row['model_number'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['origin_country']): ?>
		        						<dt><?php echo e(trans('app.origin'), false); ?>: </dt> <dd><?php echo e($row['origin_country'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['minimum_price']): ?>
		        						<dt><?php echo e(trans('app.min_price'), false); ?>: </dt> <dd><?php echo e(get_formated_currency($row['minimum_price']), false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['maximum_price']): ?>
		        						<dt><?php echo e(trans('app.max_price'), false); ?>: </dt> <dd><?php echo e(get_formated_currency($row['maximum_price']), false); ?></dd>
									<?php endif; ?>
		        				</dl>
		        			</td>
		        			<td><?php echo e($row['categories'], false); ?></td>
		        			<td><?php echo e($row['tags'], false); ?></td>
		        			<td class="text-center"><i class="fa fa-<?php echo e($row['has_variant'] == 'TRUE' ? 'check' : 'times', false); ?> text-muted"></i></td>
		        			<td class="text-center"><i class="fa fa-<?php echo e($row['requires_shipping'] == 'TRUE' ? 'check' : 'times', false); ?> text-muted"></i></td>
		        			<td class="text-center"><i class="fa fa-<?php echo e($row['active'] == 'TRUE' ? 'check' : 'times', false); ?> text-muted"></i></td>
		        		</tr>
		        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        </tbody>
		    </table>
		</div> <!-- /.box-body -->

		<div class="box-footer">
			<a href="<?php echo e(route('admin.catalog.product.index'), false); ?>" class="btn btn-default btn-flat"><?php echo e(trans('app.cancel'), false); ?></a>
			<small class="indent20"><?php echo e(trans('app.total_number_of_rows', ['value' => count($rows)]), false); ?></small>
			<div class="box-tools pull-right">
				<?php echo Form::open(['route' => 'admin.catalog.product.import', 'id' => 'form', 'class' => 'inline-form', 'data-toggle' => 'validator']); ?>

		        	<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        		
						<?php echo e(Form::hidden('data[]', serialize($row)), false); ?>

		        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php echo Form::button(trans('app.looks_good'), ['type' => 'submit', 'class' => 'confirm btn btn-new btn-flat']); ?>

				<?php echo Form::close(); ?>

			</div>
		</div> <!-- /.box-footer -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/product/upload_review.blade.php ENDPATH**/ ?>