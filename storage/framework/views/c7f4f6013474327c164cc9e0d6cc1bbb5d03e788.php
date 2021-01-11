<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2 nopadding no-print">
        	<?php echo $__env->make('admin.message._left_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- /.col -->
        <div class="col-md-10 nopadding-right">

        	<?php if($message->user_id): ?>
              	<div class="alert alert-info alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  	<strong><?php echo e(trans('app.important'), false); ?>: </strong>
                  	<?php echo trans('app.message_send_by_staff', ['user' => $message->user->getName()]); ?>

                </div>
            <?php endif; ?>

          	<div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"><?php echo e(trans('app.message'), false); ?></h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
	            </div>
	            <!-- /.box-header -->

	            <div class="box-body no-padding">
	              	<div class="mailbox-read-info">
	              		<div class="row">
		              		<div class="col-md-1">
			            		<img src="<?php echo e(get_avatar_src($message->customer, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $message->customer)): ?>
									<?php if($message->customer->id): ?>
						            	<a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $message->customer), false); ?>" class="ajax-modal-btn small"><?php echo e(trans('app.view_detail'), false); ?></a>
									<?php endif; ?>
								<?php endif; ?>
							</div>
		              		<div class="col-md-11 nopadding-left">
				                <h3><?php echo $message->subject; ?></h3>
				                <h5>
				                	<?php echo e($message->user_id ? trans('app.to') : trans('app.from'), false); ?>: <strong><?php echo e($message->customer->getName(), false); ?> </strong>

				                	<?php if($message->order): ?>
					                	<?php echo e('<' . get_customer_email_from_order($message->order)  . '>', false); ?>

									<?php endif; ?>

				                  	<span class="mailbox-read-time pull-right">
				                  		<?php echo e($message->updated_at->toDayDateTimeString(), false); ?>

				                  	</span>
				              	</h5>

			                	<?php if($message->order): ?>
					                <h5>
					                	<?php echo e(trans('app.order'), false); ?>:
					                	<strong>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $message->order)): ?>
												<a href="<?php echo e(route('admin.order.order.show', $message->order->id), false); ?>">
													<?php echo e($message->order->order_number, false); ?>

												</a>
											<?php else: ?>
												<?php echo e($message->order->order_number, false); ?>

											<?php endif; ?>
					                	</strong>
					              	</h5>
								<?php endif; ?>
			              	</div>
		              	</div>
	              	</div> <!-- /.mailbox-read-info -->

	              	<div class="mailbox-controls text-center no-print">
		                <div class="btn-group">
							<?php if($message->label < \App\Message::LABEL_DRAFT): ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply', $message)): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.reply', $message), false); ?>" class="ajax-modal-btn btn btn-default btn-sm">
										<i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.reply'), false); ?>" class="fa fa-reply"></i> <?php echo e(trans('app.reply'), false); ?>

									</a>

									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.reply', [$message, true]), false); ?>" class="ajax-modal-btn btn btn-default btn-sm">
					                	<i class="fa fa-reply"></i> <?php echo e(trans('app.reply_with_template'), false); ?>

					                </a>
			                  	<?php endif; ?>

								<?php if($message->label == \App\Message::LABEL_INBOX): ?>
									<a href="<?php echo e(route('admin.support.message.update', [$message, \App\Message::STATUS_UNREAD, 'status']), false); ?>" class="btn btn-default btn-sm">
			       		           		<i class="fa fa-envelope-o"></i> <?php echo e(trans('app.mark_as_unread'), false); ?>

			       		           	</a>
		       		           	<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $message)): ?>
									<a href="<?php echo e(route('admin.support.message.update', [$message, \App\Message::LABEL_SPAM]), false); ?>" class="btn btn-default btn-sm">
			       		           		<i class="fa fa-filter"></i> <?php echo e(trans('app.mark_as_spam'), false); ?>

			       		           	</a>

									<a href="<?php echo e(route('admin.support.message.update', [$message, \App\Message::LABEL_TRASH]), false); ?>" class="btn btn-default btn-sm">
				                  		<i class="fa fa-trash-o"></i> <?php echo e(trans('app.trash'), false); ?>

				                  	</a>
			                  	<?php endif; ?>

							<?php else: ?>
								<?php if($message->label == \App\Message::LABEL_DRAFT): ?>
									<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.edit', $message), false); ?>" class="ajax-modal-btn btn btn-default btn-sm">
										<i class="fa fa-send"></i> <?php echo e(trans('app.open'), false); ?>

									</a>
			                  	<?php endif; ?>

								<?php if($message->label > \App\Message::LABEL_DRAFT): ?>
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $message)): ?>
										<a href="<?php echo e(route('admin.support.message.update', [$message, \App\Message::LABEL_INBOX]), false); ?>" class="btn btn-default btn-sm">
				       		           		<i class="fa fa-inbox"></i> <?php echo e(trans('app.move_to_inbox'), false); ?>

				       		           	</a>
				                  	<?php endif; ?>
			                  	<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $message)): ?>
									<a href="<?php echo e(url('admin/support/message/destroy/'. $message->id), false); ?>" class="btn btn-default btn-sm confirm ajax-silent">
										<i class="glyphicon glyphicon-trash"></i> <?php echo e(trans('app.delete_permanently'), false); ?>

									</a>
			                  	<?php endif; ?>
							<?php endif; ?>
		                </div> <!-- /.btn-group -->

	                	<button type="button" class="btn btn-default btn-sm" onclick="window.print();">
	                  		<i class="fa fa-print"></i> <?php echo e(trans('app.print'), false); ?>

	                  	</button>
	              	</div> <!-- /.mailbox-controls -->

					<div class="mailbox-read-message">
						<?php echo $message->message; ?>

					</div>
	            </div> <!-- /.box-body -->

            	<?php if($message->attachments->count()): ?>
		            <div class="box-footer">
			            <?php echo $__env->make('admin.message._view_attachments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		            </div>
	            <?php endif; ?>

				<?php if (! ($message->label == \App\Message::LABEL_DRAFT)): ?>
					<?php if($message->replies->count()): ?>
			            <div class="box-footer">
							<div class="form-group">
							  	<label><?php echo e(trans('app.replies'), false); ?></label>
							</div>

					        <?php $__currentLoopData = $message->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo $__env->make('admin.partials._reply_conversations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
			        <?php endif; ?>
		            <!-- /.box-footer -->
		        <?php endif; ?>

	            <div class="box-footer no-print">
					<?php if($message->label < \App\Message::LABEL_DRAFT): ?>
		              	<div class="pull-right">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply', $message)): ?>
								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.reply', $message), false); ?>" class="ajax-modal-btn btn btn-default btn-sm">
				                	<i class="fa fa-reply"></i> <?php echo e(trans('app.reply'), false); ?>

				                </a>

								<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.reply', [$message, true]), false); ?>" class="ajax-modal-btn btn btn-default btn-sm">
				                	<i class="fa fa-reply"></i> <?php echo e(trans('app.reply_with_template'), false); ?>

				                </a>
							<?php endif; ?>
		              	</div>

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $message)): ?>
							<a href="<?php echo e(route('admin.support.message.update', [$message, \App\Message::LABEL_TRASH]), false); ?>" class="btn btn-default btn-sm">
				              	<i class="fa fa-trash-o"></i> <?php echo e(trans('app.trash'), false); ?>

				             </a>

							<a href="<?php echo e(route('admin.support.message.update', [$message, \App\Message::LABEL_SPAM]), false); ?>" class="btn btn-default btn-sm">
	       		           		<i class="fa fa-filter"></i> <?php echo e(trans('app.mark_as_spam'), false); ?>

	       		           	</a>
		              	<?php endif; ?>
	              	<?php else: ?>
						<?php if($message->label > \App\Message::LABEL_DRAFT): ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $message)): ?>
								<a href="<?php echo e(route('admin.support.message.update', [$message, \App\Message::LABEL_INBOX]), false); ?>" class="btn btn-default btn-sm">
		       		           		<i class="fa fa-inbox"></i> <?php echo e(trans('app.move_to_inbox'), false); ?>

		       		           	</a>
		                  	<?php endif; ?>
	                  	<?php endif; ?>

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $message)): ?>
							<a href="<?php echo e(url('admin/support/message/destroy/'. $message->id), false); ?>" class="btn btn-default btn-sm confirm ajax-silent">
								<i class="glyphicon glyphicon-trash"></i> <?php echo e(trans('app.delete_permanently'), false); ?>

							</a>
		              	<?php endif; ?>
					<?php endif; ?>

	              	<button type="button" class="btn btn-default" onclick="window.print();">
	              		<i class="fa fa-print"></i> <?php echo e(trans('app.print'), false); ?>

	              	</button>
	            </div>
	            <!-- /.box-footer -->
	        </div>
        	<!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/message/show.blade.php ENDPATH**/ ?>