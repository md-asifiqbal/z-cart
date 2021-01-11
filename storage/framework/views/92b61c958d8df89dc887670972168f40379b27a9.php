<?php $__env->startSection('content'); ?>
<div class="row">
  	<div class="col-md-8">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo e(trans('app.verification'), false); ?></h3>
			</div> <!-- /.box-header -->
			<div class="box-body">

				<h3><?php echo trans('messages.how_id_verification_helps'); ?></h3>
				<p><?php echo trans('messages.verification_intro'); ?></p>

				<h3><?php echo e(trans('messages.verified_business_name_like'), false); ?>: </h3>
				<p class="lead">
					<img src="<?php echo e(get_storage_file_url(optional($config->shop->logo)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
					<strong><?php echo e(get_site_title(), false); ?></strong>
					<img src="<?php echo e(get_verified_badge(), false); ?>" class="verified-badge img-xs" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.verified_seller'), false); ?>" alt="verified-badge">
				</p>

				<h3><?php echo trans('messages.how_the_verification_process_works'); ?></h3>
				<p><?php echo trans('messages.verification_process'); ?></p>

				<h3><?php echo trans('messages.what_the_verification_documents_need'); ?></h3>
				<p><?php echo trans('messages.verification_documents'); ?></p>

		        <span class="spacer30"></span>
			</div> <!-- /.box-body -->
		</div> <!-- /.box -->
  	</div> <!-- /.col-md-8 -->

  	<div class="col-md-4 nopadding-left">
	    <div class="box">
	      	<div class="box-header with-border">
	          	<h3 class="box-title"><?php echo e(trans('app.upload_documents'), false); ?></h3>
	      	</div> <!-- /.box-header -->
	      	<div class="box-body">

				<?php if(count($config->attachments)): ?>
	                <div class="form-group">
			          	<label><?php echo e(trans('app.uploaded_documents'), false); ?></label>
			          	<ul class="list-group">
							<?php $__currentLoopData = $config->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="list-group-item small">
									<a href="<?php echo e(route('attachment.download', $attachment), false); ?>">
										<i class="fa fa-cloud-download"></i>
										<?php echo e($attachment->name, false); ?>

									</a>
									<small>
							            (<?php echo e(get_formated_file_size($attachment->size), false); ?>)
									</small>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			          	</ul>
				    </div>
				<?php endif; ?>

		    	<?php echo Form::open(['route' => 'admin.setting.verify', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

			        <span class="spacer10"></span>

			        <div class="row">
			            <div class="col-md-9 nopadding-right">
			               <input id="uploadFile" placeholder="<?php echo e(trans('app.upload_documents'), false); ?>" class="form-control" disabled="disabled" style="height: 28px;" />
			              	<div class="help-block with-errors"><i class="fa fa-info"></i> <?php echo e(trans('help.select_all_verification_documents'), false); ?></div>
			            </div>
			            <div class="col-md-3 nopadding-left">
			                <div class="fileUpload btn btn-primary btn-block btn-flat">
			                    <span><?php echo e(trans('app.form.upload'), false); ?> </span>
			                    <input type="file" name="documents[]" multiple="true" id="uploadBtn" class="upload" />
			                </div>
			            </div>
			        </div>

			        <span class="spacer10"></span>

	    	        <?php echo Form::submit(trans('app.submit'), ['class' => 'btn btn-flat btn-lg btn-block btn-new']); ?>

		        <?php echo Form::close(); ?>

		        <span class="spacer30"></span>
			</div> <!-- /.box-body -->
		</div> <!-- /.box -->
  	</div> <!-- /.col-md-4 -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/config/verify.blade.php ENDPATH**/ ?>