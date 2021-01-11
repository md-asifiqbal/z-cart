<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.customers'), false); ?></h3>
	      <div class="box-tools pull-right">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Customer::class)): ?>
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.bulk'), false); ?>" class="ajax-modal-btn btn btn-default btn-flat"><?php echo e(trans('app.bulk_import'), false); ?></a>
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_customer'), false); ?></a>
			<?php endif; ?>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
		    <table class="table table-hover" id="all-customer-table">
		        <thead>
			        <tr>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Customer::class)): ?>
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
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
									</ul>
								</div>
							</th>
						<?php else: ?>
							<th></th>
						<?php endif; ?>
						<th><?php echo e(trans('app.avatar'), false); ?></th>
						<th><?php echo e(trans('app.nice_name'), false); ?></th>
						<th><?php echo e(trans('app.full_name'), false); ?></th>
						<th><?php echo e(trans('app.email'), false); ?></th>
						<th><?php echo e(trans('app.orders'), false); ?></th>
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
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Customer::class)): ?>
					<?php echo Form::open(['route' => ['admin.admin.customer.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

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
	          <th><?php echo e(trans('app.avatar'), false); ?></th>
	          <th><?php echo e(trans('app.nice_name'), false); ?></th>
	          <th><?php echo e(trans('app.full_name'), false); ?></th>
	          <th><?php echo e(trans('app.email'), false); ?></th>
	          <th><?php echo e(trans('app.deleted_at'), false); ?></th>
	          <th><?php echo e(trans('app.option'), false); ?></th>
	        </tr>
	        </thead>
	        <tbody>
		        <?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			          <td>
			            <img src="<?php echo e(get_avatar_src($trash, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
			          </td>
			          <td><?php echo e($trash->nice_name, false); ?></td>
			          <td><?php echo e($trash->name, false); ?></td>
			          <td><?php echo e($trash->email, false); ?></td>
			          <td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
			          <td class="row-options">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
		                    <a href="<?php echo e(route('admin.admin.customer.restore', $trash->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

		                    <?php echo Form::open(['route' => ['admin.admin.customer.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/customer/index.blade.php ENDPATH**/ ?>