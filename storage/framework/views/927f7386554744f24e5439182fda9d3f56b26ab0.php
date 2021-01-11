<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.categories'), false); ?></h3>
	      <div class="box-tools pull-right">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Category::class)): ?>
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.category.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_category'), false); ?></a>
			<?php endif; ?>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-2nd-no-sort">
	        <thead>
	        <tr>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Category::class)): ?>
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
								<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.category.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
								<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.category.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
							</ul>
						</div>
					</th>
				<?php endif; ?>
				<th><?php echo e(trans('app.cover_image'), false); ?></th>
				<th><?php echo e(trans('app.category_name'), false); ?></th>
				<th><?php echo e(trans('app.parent'), false); ?></th>
				<th><?php echo e(trans('app.products'), false); ?></th>
				<th><?php echo e(trans('app.listings'), false); ?></th>
				<th><?php echo e(trans('app.order'), false); ?></th>
				<th>&nbsp;</th>
	        </tr>
	        </thead>
	        <tbody id="massSelectArea">
		        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
					  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Category::class)): ?>
							<td>
								<?php if (! ($category->products_count)): ?>
									<input id="<?php echo e($category->id, false); ?>" type="checkbox" class="massCheck">
							  	<?php endif; ?>
							</td>
					  	<?php endif; ?>
			          	<td>
							<img src="<?php echo e(get_storage_file_url(optional($category->featuredImage)->path, 'cover_thumb'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.cover_image'), false); ?>">
			          	</td>
			          	<td>
			          		<h5>
			          			<?php echo e($category->name, false); ?>

			          			<?php if($category->featured): ?>
				          			<small class="label label-primary indent10"><?php echo e(trans('app.featured'), false); ?></small>
			          			<?php endif; ?>
								<?php if (! ($category->active)): ?>
									<span class="label label-default indent5 small"><?php echo e(trans('app.inactive'), false); ?></span>
								<?php endif; ?>
			          		</h5>
			          		<?php if($category->description): ?>
				          		<span class="excerpt-td small">
				          			<?php echo Str::limit($category->description, 200); ?>

				          		</span>
				          	<?php endif; ?>
			          	</td>
				        <td>
				          	<?php if($category->subGroup->group->deleted_at): ?>
					          	<i class="fa fa-trash-o small"></i>
				          	<?php endif; ?>
				        	<?php echo $category->subGroup->group->name; ?>

				        	&nbsp;<i class="fa fa-angle-double-right small"></i>&nbsp;
				          	<?php if($category->subGroup->deleted_at): ?>
					          	<i class="fa fa-trash-o small"></i>
				          	<?php endif; ?>
				        	<?php echo $category->subGroup->name; ?>

				        </td>
			          	<td><span class="label label-default"><?php echo e($category->products_count, false); ?></span></td>
			          	<td><span class="label label-warning"><?php echo e($category->listings_count, false); ?></span></td>
				        <td><?php echo e($category->order, false); ?></td>
				        <td class="row-options">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $category)): ?>
		                	    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.category.edit', $category->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
	                	    <?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $category)): ?>
			                    <?php echo Form::open(['route' => ['admin.catalog.category.trash', $category->id], 'method' => 'delete', 'class' => 'data-form']); ?>

			                        <?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

								<?php echo Form::close(); ?>

							<?php endif; ?>
						</td>
			        </tr>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	</div>
	<!-- /.box -->

	<div class="box collapsed-box">
	    <div class="box-header with-border">
			<h3 class="box-title">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Category::class)): ?>
					<?php echo Form::open(['route' => ['admin.catalog.category.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

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
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-option">
	        <thead>
	        <tr>
	          <th><?php echo e(trans('app.category_name'), false); ?></th>
	          <th><?php echo e(trans('app.parent'), false); ?></th>
	          <th><?php echo e(trans('app.deleted_at'), false); ?></th>
	          <th><?php echo e(trans('app.option'), false); ?></th>
	        </tr>
	        </thead>
	        <tbody>
		        <?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			          <td>
			          	<h5><?php echo e($trash->name, false); ?></h5>
			          	<?php if($trash->description): ?>
				          	<span class="excerpt-td small"><?php echo Str::limit($trash->description, 150); ?></span>
			          	<?php endif; ?>
			          </td>
				      <td>
				          	<?php if($trash->subGroup->group->deleted_at): ?>
					          	<i class="fa fa-trash-o small"></i>
				          	<?php endif; ?>
				        	<?php echo $trash->subGroup->group->name; ?>

				        	&nbsp;<i class="fa fa-angle-double-right small"></i>&nbsp;
				          	<?php if($trash->subGroup->deleted_at): ?>
					          	<i class="fa fa-trash-o small"></i>
				          	<?php endif; ?>
				        	<?php echo $trash->subGroup->name; ?>

				      </td>
			          <td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
			          <td class="row-options">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
		                    <a href="<?php echo e(route('admin.catalog.category.restore', $trash->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

		                    <?php echo Form::open(['route' => ['admin.catalog.category.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']); ?>

		                        <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete_permanently'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

							<?php echo Form::close(); ?>

						<?php endif; ?>
			          </td>
			        </tr>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	</div>
	<!-- /.box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/category/index.blade.php ENDPATH**/ ?>