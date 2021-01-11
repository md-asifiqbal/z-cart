<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.attributes'), false); ?></h3>
	      <div class="box-tools pull-right">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\AttributeValue::class)): ?>
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.attributeValue.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_attribute_value'), false); ?> </a>
			<?php endif; ?>
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Attribute::class)): ?>
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.attribute.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_attribute'), false); ?> </a>
			<?php endif; ?>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-2nd-no-sort" id="sortable" data-action="<?php echo e(Route('admin.catalog.attribute.reorder'), false); ?>">
	        <thead>
		        <tr>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Attribute::class)): ?>
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
									<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.attribute.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
									<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.attribute.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
								</ul>
							</div>
						</th>
					<?php endif; ?>
			        <th width="7px"><?php echo e(trans('app.#'), false); ?></th>
					<th><?php echo e(trans('app.position'), false); ?></th>
					<th><?php echo e(trans('app.name'), false); ?></th>
					<th><?php echo e(trans('app.type'), false); ?></th>
					<th><?php echo e(trans('app.entities'), false); ?></th>
					<th><?php echo e(trans('app.option'), false); ?></th>
		        </tr>
	        </thead>
	        <tbody id="massSelectArea">
		        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr id="<?php echo e($attribute->id, false); ?>">
					  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Attribute::class)): ?>
							<td><input id="<?php echo e($attribute->id, false); ?>" type="checkbox" class="massCheck"></td>
					  	<?php endif; ?>
				        <td>
							<i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.move'), false); ?>" class="fa fa-arrows sort-handler"> </i>
				        </td>
						<td><span class="order"><?php echo e($attribute->order, false); ?></span></td>
						<td>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $attribute)): ?>
								<a href="<?php echo e(route('admin.catalog.attribute.entities', $attribute->id), false); ?>"><?php echo e($attribute->name, false); ?></a>
							<?php else: ?>
								<?php echo e($attribute->name, false); ?>

							<?php endif; ?>
						</td>
						<td><?php echo e($attribute->attributeType->type, false); ?></td>
						<td>
							<span class="label label-default"><?php echo e($attribute->attribute_values_count, false); ?></span>
						</td>
						<td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $attribute)): ?>
								<a href="<?php echo e(route('admin.catalog.attribute.entities', $attribute->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.entities'), false); ?>" class="fa fa-plus"></i></a>&nbsp;
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $attribute)): ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.attribute.edit', $attribute->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $attribute)): ?>
								<?php echo Form::open(['route' => ['admin.catalog.attribute.trash', $attribute->id], 'method' => 'delete', 'class' => 'data-form']); ?>

								    <?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

								<?php echo Form::close(); ?>

							<?php endif; ?>
						</td>
			        </tr>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </tbody>
	      </table>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->

	<div class="box collapsed-box">
	    <div class="box-header with-border">
			<h3 class="box-title">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Attribute::class)): ?>
					<?php echo Form::open(['route' => ['admin.catalog.attribute.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

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
	      <table class="table table-hover table-option">
	        <thead>
	        <tr>
	          <th><?php echo e(trans('app.name'), false); ?></th>
  			  <th><?php echo e(trans('app.type'), false); ?></th>
	          <th><?php echo e(trans('app.deleted_at'), false); ?></th>
	          <th><?php echo e(trans('app.option'), false); ?></th>
	        </tr>
	        </thead>
	        <tbody>
		        <?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			          <td><?php echo e($trash->name, false); ?></td>
					  <td><?php echo e($trash->attributeType->type, false); ?></td>
			          <td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
			          <td class="row-options">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
		                    <a href="<?php echo e(route('admin.catalog.attribute.restore', $trash->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

		                    <?php echo Form::open(['route' => ['admin.catalog.attribute.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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

<?php $__env->startSection('page-script'); ?>
	<?php echo $__env->make('plugins.drag-n-drop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/attribute/index.blade.php ENDPATH**/ ?>