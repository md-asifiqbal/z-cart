<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.notifications'), false); ?></h3>
	      <div class="box-tools pull-right">
			<?php echo Form::open(['route' => ['admin.notifications.deleteAll'], 'method' => 'delete']); ?>

				<?php echo Form::button('<i class="fa fa-trash-o"></i> ' . trans('app.delete_all'), ['type' => 'submit', 'class' => 'confirm btn btn-flat btn-new']); ?>

			<?php echo Form::close(); ?>

	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
		    <div id="menu">
		      <div class="panel list-group">
                <?php $__empty_1 = true; $__currentLoopData = Auth::user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	                <div class="list-group-item">
	                  <?php
	                    $notification_view = 'admin.partials.notifications.' . Str::snake(class_basename($notification->type));
	                  ?>

	                  <?php echo $__env->make($notification_view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	                  

	                  <span class="pull-right text-muted"><?php echo e($notification->created_at->diffForHumans(), false); ?>

							<?php echo Form::open(['route' => ['admin.notifications.delete', $notification->id], 'method' => 'delete', 'class' => 'data-form']); ?>

								<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent indent20', 'title' => trans('app.delete'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

							<?php echo Form::close(); ?>

	                  </span>
	                </div>
             	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
             		<h5 class="text-center"><?php echo e(trans('app.no_data_found'), false); ?></h5>
                <?php endif; ?>
	           </div>
           </div>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/notification/index.blade.php ENDPATH**/ ?>