<?php $__env->startSection('content'); ?>
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><?php echo e(trans('app.sliders'), false); ?></h3>
	      <div class="box-tools pull-right">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Slider::class)): ?>
				<a href="javascript:void(0)" data-link="<?php echo e(route('admin.appearance.slider.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_slider'), false); ?></a>
			<?php endif; ?>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
		    <table class="table table-hover table-2nd-no-sort">
		        <thead>
			        <tr>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Slider::class)): ?>
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
										<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.appearance.slider.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
									</ul>
								</div>
							</th>
						<?php endif; ?>
						<th><?php echo e(trans('app.mobile_slider'), false); ?></th>
						<th><?php echo e(trans('app.detail'), false); ?></th>
						<th><?php echo e(trans('app.slider'), false); ?></th>
						<th><?php echo e(trans('app.options'), false); ?></th>
						<th><?php echo e(trans('app.created_at'), false); ?></th>
						<th>&nbsp;</th>
			        </tr>
		        </thead>
				<tbody id="massSelectArea">
			        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr>
						  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Slider::class)): ?>
								<td><input id="<?php echo e($slider->id, false); ?>" type="checkbox" class="massCheck"></td>
						  	<?php endif; ?>
				          	<td>
								<img src="<?php echo e(get_storage_file_url(optional($slider->mobile)->path, 'cover_thumb'), false); ?>" class="" height ="50%" alt="<?php echo e(trans('app.image'), false); ?>">
							</td>
				          	<td>
					          	<strong style="color: <?php echo e($slider->title_color, false); ?>"><?php echo $slider->title; ?> </strong>
								<br/>
					          	<small style="color: <?php echo e($slider->sub_title_color, false); ?>"><?php echo $slider->sub_title; ?></small>
				          	</td>
					        <td>
								<img src="<?php echo e(get_storage_file_url(optional($slider->featuredImage)->path, 'cover_thumb'), false); ?>" class="thumbnail" alt="<?php echo e(trans('app.slider_image'), false); ?>">
					        </td>
				          	<td>
					          	<?php echo e(trans('app.title_color') . ': ', false); ?><strong><?php echo $slider->title_color; ?></strong>
								<br/>
					          	<?php echo e(trans('app.sub_title_color') . ': ', false); ?><strong><?php echo $slider->sub_title_color; ?></strong>
								<br/>
					          	<?php echo e(trans('app.order') . ': ', false); ?><strong><?php echo $slider->order; ?></strong>
								<br/>
					          	<?php echo e(trans('app.link') . ': ', false); ?><strong><?php echo $slider->link; ?></strong>
				          	</td>
				          	<td>
					          	<?php echo e($slider->created_at->toFormattedDateString(), false); ?>

				          	</td>
				          	<td class="row-options text-muted small">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $slider)): ?>
				                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.appearance.slider.edit', $slider->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $slider)): ?>
				                    <?php echo Form::open(['route' => ['admin.appearance.slider.destroy', $slider->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/slider/index.blade.php ENDPATH**/ ?>