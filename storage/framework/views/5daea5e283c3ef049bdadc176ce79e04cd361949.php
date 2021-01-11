<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.banners'), false); ?></h3>
	      <div class="box-tools pull-right">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Banner::class)): ?>
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.appearance.banner.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_banner'), false); ?></a>
			<?php endif; ?>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
		    <table class="table table-hover table-no-sort">
		        <thead>
			        <tr>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Banner::class)): ?>
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
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.appearance.banner.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
									</ul>
								</div>
							</th>
						<?php endif; ?>
						<th><?php echo e(trans('app.detail'), false); ?></th>
						<th><?php echo e(trans('app.banner_image'), false); ?></th>
						<th><?php echo e(trans('app.background'), false); ?></th>
						<th><?php echo e(trans('app.options'), false); ?></th>
						<th><?php echo e(trans('app.created_at'), false); ?></th>
						<th>&nbsp;</th>
			        </tr>
		        </thead>
				<tbody id="massSelectArea">
			        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr>
						  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Banner::class)): ?>
								<td><input id="<?php echo e($banner->id, false); ?>" type="checkbox" class="massCheck"></td>
						  	<?php endif; ?>
				          	<td>
					          	<strong><?php echo $banner->title; ?> </strong>
					          	<?php if (! ($banner->group)): ?>
						          	<span class="label label-default indent10"><?php echo e(strtoupper(trans('app.draft')), false); ?></span>
					          	<?php endif; ?>
								<br/>
					          	<span class="small"><?php echo $banner->description; ?></span>
				          	</td>
					        <td>
								<img src="<?php echo e(get_storage_file_url(optional($banner->featuredImage)->path, 'small'), false); ?>" class="thumbnail" alt="<?php echo e(trans('app.banner_image'), false); ?>">
					        </td>
					        <td>
				 	  			<?php if($banner->hasImages()): ?>
									<img src="<?php echo e(get_storage_file_url(optional($banner->images->first())->path, 'small'), false); ?>" class="thumbnail" width="100%" alt="<?php echo e(trans('app.image'), false); ?>">
								<?php elseif($banner->bg_color): ?>
									<div class="" style="padding: 20px 5px; background-color: <?php echo e($banner->bg_color, false); ?>;">
										<h4 class="text-center" style="color: #d3d3d3; font-weight: lighter;"><?php echo e(strtoupper($banner->bg_color), false); ?></h4>
									</div>
								<?php endif; ?>
				          	</td>
				          	<td>
					          	<?php echo e(trans('app.group') . ': ', false); ?>

					          	<strong>
						          	<?php if($banner->group): ?>
						          		<?php echo $banner->group->name; ?>

									<?php else: ?>
						          		<?php echo trans('app.unspecified'); ?>

									<?php endif; ?>
					          	</strong>
								<br/>
					          	<?php echo e(trans('app.columns') . ': ', false); ?><strong><?php echo $banner->columns; ?></strong>
								<br/>
					          	<?php echo e(trans('app.order') . ': ', false); ?><strong><?php echo $banner->order; ?></strong>
								<br/>
					          	<?php echo e(trans('app.link_label') . ': ', false); ?><strong><?php echo $banner->link_label; ?></strong>
								<br/>
					          	<?php echo e(trans('app.link') . ': ', false); ?><strong><?php echo $banner->link; ?></strong>
				          	</td>
				          	<td>
					          	<?php echo e($banner->created_at->toFormattedDateString(), false); ?>

				          	</td>
				          	<td class="row-options text-muted small">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $banner)): ?>
				                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.appearance.banner.edit', $banner->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $banner)): ?>
				                    <?php echo Form::open(['route' => ['admin.appearance.banner.destroy', $banner->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/banner/index.blade.php ENDPATH**/ ?>