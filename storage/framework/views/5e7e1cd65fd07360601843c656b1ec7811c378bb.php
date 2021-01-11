<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.pages'), false); ?></h3>
	      <div class="box-tools pull-right">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Page::class)): ?>
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.page.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_page'), false); ?></a>
			<?php endif; ?>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-2nd-no-sort">
	        <thead>
	        <tr>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Page::class)): ?>
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
								<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.page.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
								<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.page.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
							</ul>
						</div>
					</th>
				<?php endif; ?>
				<th><?php echo e(trans('app.image'), false); ?></th>
				<th><?php echo e(trans('app.page_title'), false); ?></th>
				<th><?php echo e(trans('app.visibility'), false); ?></th>
				<th><?php echo e(trans('app.view_position'), false); ?></th>
				<th><?php echo e(trans('app.author'), false); ?></th>
				<th><?php echo e(trans('app.date'), false); ?></th>
				<th>&nbsp;</th>
	        </tr>
	        </thead>
	        <tbody id="massSelectArea">
		        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
					  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Page::class)): ?>
							<td><input id="<?php echo e($page->id, false); ?>" type="checkbox" class="massCheck"></td>
					  	<?php endif; ?>
			          <td>
						<img src="<?php echo e(get_storage_file_url(optional($page->image)->path, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
			          </td>
			          <td width="45%">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $page)): ?>
			                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.page.edit', $page), false); ?>"  class="ajax-modal-btn"><strong><?php echo $page->title; ?></strong></a>
							<?php else: ?>
					          	<strong><?php echo $page->title; ?></strong>
							<?php endif; ?>
				          	<?php if(is_null($page->published_at)): ?>
					          	<span class="indent10 label label-default"><?php echo e(strtoupper(trans('app.draft')), false); ?></span>
					        <?php endif; ?>
			          </td>
			          <td><?php echo $page->visibilityName(); ?></td>
			          <td><?php echo $page->viewPosition(); ?></td>
			          <td><?php echo e($page->author->getName(), false); ?></td>
			          <td class="small">
			          	<?php if($page->published_at): ?>
				          	<?php if(\Carbon\Carbon::now() < $page->published_at): ?>
					          	<?php echo e(trans('app.schedule_published_at'), false); ?><br/>
					          	<?php echo e(optional($page->published_at)->toDayDateTimeString(), false); ?>

					        <?php else: ?>
					          	<?php echo e(trans('app.published_at'), false); ?><br/>
					          	<?php echo e(optional($page->published_at)->toFormattedDateString(), false); ?>

					        <?php endif; ?>
				        <?php else: ?>
				          	<?php echo e(trans('app.updated_at'), false); ?><br/>
				          	<?php echo e($page->updated_at->toFormattedDateString(), false); ?>

				        <?php endif; ?>
				      </td>
			          <td class="row-options text-muted small">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $page)): ?>
			                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.page.edit', $page), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
							<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $page)): ?>
							<?php if(in_array($page->id, config('system.freeze.pages'))): ?>
								<i class="fa fa-bell-o text-muted" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('messages.freezed_model'), false); ?>" ></i>
							<?php else: ?>
			                    <?php echo Form::open(['route' => ['admin.utility.page.trash', $page], 'method' => 'delete', 'class' => 'data-form']); ?>

			                        <?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

								<?php echo Form::close(); ?>

							<?php endif; ?>
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
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Page::class)): ?>
					<?php echo Form::open(['route' => ['admin.utility.page.emptyTrash'], 'method' => 'delete', 'class' => 'data-form']); ?>

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
	          <th><?php echo e(trans('app.page_title'), false); ?></th>
	          <th><?php echo e(trans('app.visibility'), false); ?></th>
	          <th><?php echo e(trans('app.author'), false); ?></th>
	          <th><?php echo e(trans('app.deleted_at'), false); ?></th>
	          <th><?php echo e(trans('app.option'), false); ?></th>
	        </tr>
	        </thead>
	        <tbody>
		        <?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			          <td width="50%"><strong><?php echo $trash->title; ?></strong></td>
			          <td><?php echo $trash->visibilityName(); ?></td>
			          <td><?php echo e($trash->author->getName(), false); ?></td>
			          <td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
			          <td class="row-options small">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
		                    <a href="<?php echo e(route('admin.utility.page.restore', $trash), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;
		                    <?php echo Form::open(['route' => ['admin.utility.page.destroy', $trash], 'method' => 'delete', 'class' => 'data-form']); ?>

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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/page/index.blade.php ENDPATH**/ ?>