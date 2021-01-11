<?php $__env->startSection('content'); ?>
	<div class="alert alert-danger">
	    <strong><i class="icon fa fa-info-circle"></i><?php echo e(trans('app.notice'), false); ?></strong>
	    <?php echo e(trans('messages.import_ignored'), false); ?>

	</div>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo e(trans('app.import_failed'), false); ?> <small>(<?php echo e(trans('app.total_number_of_rows', ['value' => count($failed_rows)]), false); ?>)</small>
			</h3>
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
						<th width="20%"><?php echo e(trans('app.reason'), false); ?></th>
					</tr>
		        </thead>
		        <tbody>
		        	<?php $__currentLoopData = $failed_rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        		<tr>
		        			<td><img src="<?php echo e($row['data']['image_link'] ?: get_placeholder_img('tiny'), false); ?>" class="img-sm"></td>
		        			<td>
		        				<?php echo e($row['data']['name'], false); ?><br/>
		        				<strong><?php echo e(trans('app.slug'), false); ?>: </strong> <?php echo e($row['data']['slug'] ?: Str::slug($row['data']['name'], '-'), false); ?>

		        			</td>
		        			<td><?php echo e($row['data']['description'], false); ?></td>
		        			<td>
		        				<dl>
		        					<dt><?php echo e(trans('app.gtin'), false); ?>: </dt> <dd><?php echo e($row['data']['gtin_type'] . ' ' . $row['data']['gtin'], false); ?></dd>
		        					<?php if($row['data']['mpn']): ?>
			        					<dt><?php echo e(trans('app.part_number'), false); ?>: </dt> <dd><?php echo e($row['data']['mpn'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['data']['manufacturer']): ?>
		        						<dt><?php echo e(trans('app.manufacturer'), false); ?>: </dt> <dd><?php echo e($row['data']['manufacturer'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['data']['brand']): ?>
		        						<dt><?php echo e(trans('app.brand'), false); ?>: </dt> <dd><?php echo e($row['data']['brand'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['data']['model_number']): ?>
		        						<dt><?php echo e(trans('app.model_number'), false); ?>: </dt> <dd><?php echo e($row['data']['model_number'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['data']['origin_country']): ?>
		        						<dt><?php echo e(trans('app.origin'), false); ?>: </dt> <dd><?php echo e($row['data']['origin_country'], false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['data']['minimum_price']): ?>
		        						<dt><?php echo e(trans('app.min_price'), false); ?>: </dt> <dd><?php echo e(get_formated_currency($row['data']['minimum_price']), false); ?></dd>
									<?php endif; ?>
		        					<?php if($row['data']['maximum_price']): ?>
		        						<dt><?php echo e(trans('app.max_price'), false); ?>: </dt> <dd><?php echo e(get_formated_currency($row['data']['maximum_price']), false); ?></dd>
									<?php endif; ?>
		        				</dl>
		        			</td>
		        			<td><?php echo e($row['data']['categories'], false); ?></td>
		        			<td><span class="label label-danger"><?php echo e($row['reason'], false); ?></span></td>
		        		</tr>
		        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        </tbody>
		    </table>
		</div> <!-- /.box-body -->
		<div class="box-footer">
			<a href="<?php echo e(route('admin.catalog.product.index'), false); ?>" class="btn btn-danger btn-flat"><?php echo e(trans('app.dismiss'), false); ?></a>
			<small class="indent20"><?php echo e(trans('app.total_number_of_rows', ['value' => count($failed_rows)]), false); ?></small>
			<div class="box-tools pull-right">
				<?php echo Form::open(['route' => 'admin.catalog.product.downloadFailedRows', 'id' => 'form', 'class' => 'inline-form', 'data-toggle' => 'validator']); ?>

		        	<?php $__currentLoopData = $failed_rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        		<input type="hidden" name="data[]" value="<?php echo e(serialize($row['data']), false); ?>">
		        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php echo Form::button(trans('app.download_failed_rows'), ['type' => 'submit', 'class' => 'btn btn-new btn-flat']); ?>

				<?php echo Form::close(); ?>

			</div>
		</div> <!-- /.box-footer -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/product/import_failed.blade.php ENDPATH**/ ?>