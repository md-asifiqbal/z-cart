<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.theme_options'), false); ?></h3>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	    	<table class="table table-stripe">
	    		<thead>
	    			<tr>
	    				<th><?php echo app('translator')->getFromJson('app.options'); ?></th>
	    				<th><?php echo app('translator')->getFromJson('app.values'); ?></th>
	    				<th>&nbsp;</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<tr>
	    				<th><?php echo app('translator')->getFromJson('app.featured_categories'); ?></th>
	    				<td>
	    					<?php $__currentLoopData = $featured_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    				<span class="label label-outline"><?php echo e($category, false); ?></span>
	    					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    				</td>
	    				<td>
	    					<a href="javascript:void(0)" data-link="<?php echo e(route('admin.appearance.featuredCategories'), false); ?>" class="ajax-modal-btn btn btn-sm btn-default flat"><i class="fa fa-edit"></i> <?php echo app('translator')->getFromJson('app.edit'); ?></a>
	    				</td>
	    			</tr>
	    		</tbody>
	    	</table>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/theme/options.blade.php ENDPATH**/ ?>