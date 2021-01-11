<?php $__env->startSection('content'); ?>
	<div class="row">
	  	<div class="col-md-3 nopadding-right">
			<div class="box">
			    <div class="box-header with-border">
			      	<h3 class="box-title"><?php echo e(trans('app.topics'), false); ?></h3>
					<div class="box-tools pull-right">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Faq::class)): ?>
							<a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.faqTopic.create'), false); ?>" class="ajax-modal-btn btn btn-default btn-flat"><?php echo e(trans('app.add_topic'), false); ?></a>
						<?php endif; ?>
					</div>
			    </div> <!-- /.box-header -->
			    <div class="box-body">
			      	<table class="table">
						<tbody>
						    <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						        <tr>
						        	<td><?php echo e($topic->name, false); ?></td>
						        	<td class="small"><?php echo e($topic->for, false); ?></td>
									<td class="row-options text-muted small">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Faq::class)): ?>
											<a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.faqTopic.edit', $topic->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
											<?php echo Form::open(['route' => ['admin.utility.faqTopic.destroy', $topic->id], 'method' => 'delete', 'class' => 'data-form']); ?>

												<?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

											<?php echo Form::close(); ?>

										<?php endif; ?>
									</td>
						        </tr>
						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
			    	</table>
				</div>
			</div>
		</div>

	  	<div class="col-md-9">
			<div class="box">
			    <div class="box-header with-border">
			      <h3 class="box-title"><?php echo e(trans('app.faqs'), false); ?></h3>
			      <div class="box-tools pull-right">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Faq::class)): ?>
						<a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.faq.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_faq'), false); ?></a>
					<?php endif; ?>
			      </div>
			    </div> <!-- /.box-header -->
			    <div class="box-body">
			      <table class="table table-hover table-no-sort">
			        <thead>
				        <tr>
				          <th><?php echo e(trans('app.detail'), false); ?></th>
				          <th><?php echo e(trans('app.topic'), false); ?></th>
				          <th><?php echo e(trans('app.updated_at'), false); ?></th>
				          <th>&nbsp;</th>
				        </tr>
			        </thead>
			        <tbody>
				        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					        <tr>
					          <td width="60%">
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $faq)): ?>
					                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.faq.edit', $faq->id), false); ?>"  class="ajax-modal-btn"><strong><?php echo $faq->question; ?></strong></a>
									<?php else: ?>
							          	<strong><?php echo $faq->question; ?></strong>
									<?php endif; ?>
									<br/>
						          	<span class="excerpt-td"><?php echo $faq->answer; ?></span>
					          </td>
					          <td>
					          	<?php echo e($faq->topic->name, false); ?>

						        <br/><span class="label label-default"><?php echo e(strtoupper($faq->topic->for), false); ?></span>
					          </td>
					          <td class="small">
					          	<?php echo e($faq->updated_at->toFormattedDateString(), false); ?>

						      </td>
					          <td class="row-options text-muted small">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $faq)): ?>
				                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.utility.faq.edit', $faq->id), false); ?>"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $faq)): ?>
				                    <?php echo Form::open(['route' => ['admin.utility.faq.destroy', $faq->id], 'method' => 'delete', 'class' => 'data-form']); ?>

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
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/faq/index.blade.php ENDPATH**/ ?>