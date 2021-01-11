<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.announcements'), false); ?></h3>
	      <div class="box-tools pull-right">
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.announcement.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_announcement'), false); ?></a>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-no-sort">
	        <thead>
	        <tr>
	          <th><?php echo e(trans('app.body'), false); ?></th>
	          <th><?php echo e(trans('app.action'), false); ?></th>
	          <th><?php echo e(trans('app.author'), false); ?></th>
	          <th><?php echo e(trans('app.created_at'), false); ?></th>
	          <th>&nbsp;</th>
	        </tr>
	        </thead>
	        <tbody>
		        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			          <td><?php echo $announcement->parsed_body; ?></td>
			          <td>
			          	<a href="<?php echo e($announcement->action_url, false); ?>" class="btn btn-default btn-xs btn-flat" target="_blank">
				          	<?php echo e($announcement->action_text, false); ?>

				        </a>
			          </td>
			          <td><?php echo e($announcement->creator->getName(), false); ?></td>
			          <td><?php echo e($announcement->created_at->diffForHumans(), false); ?></td>
			          <td class="row-options text-muted small">
		                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.setting.announcement.edit', $announcement->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
		                    <?php echo Form::open(['route' => ['admin.setting.announcement.destroy', $announcement->id], 'method' => 'delete', 'class' => 'data-form']); ?>

		                        <?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

							<?php echo Form::close(); ?>

			          </td>
			        </tr>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </tbody>
	      </table>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/announcement/index.blade.php ENDPATH**/ ?>