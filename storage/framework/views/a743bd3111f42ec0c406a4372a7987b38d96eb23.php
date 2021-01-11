<?php $__env->startSection('content'); ?>
	<?php
		$search_q = isset($search_q) ? $search_q : Null;
		$requestLabel = isset(request()->route()->parameters['label']) ? request()->route()->parameters['label'] : 1;
	?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2 nopadding">
        	<?php echo $__env->make('admin.message._left_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div> <!-- /.col -->
        <div class="col-md-10 nopadding-right">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo e($search_q ? trans('app.search_result') : get_msg_folder_name_from_label($requestLabel), false); ?></h3>
              <div class="box-tools col-lg-4 pull-right nopadding-right">
                <div class="has-feedback">
				    <?php echo Form::open(['route' => 'message.search', 'method' => 'get', 'id' => 'form', 'data-toggle' => 'validator']); ?>

						<div class="input-group">
							<?php echo Form::text('q', null, ['class' => 'form-control input-sm', 'placeholder' => trans('app.placeholder.search'), 'required']); ?>

							<div class="help-block with-errors"></div>
					     	<span class="input-group-btn">
					        	<button class="btn btn-default" type="submit"> <i class="fa fa-search"></i> </button>
					    	</span>
					    </div><!-- /input-group -->
				    <?php echo Form::close(); ?>

                </div>
              </div> <!-- /.box-tools -->
            </div> <!-- /.box-header -->

            <div class="box-body no-padding">
              	<div class="mailbox-controls">
	                <!-- Check all button -->
					<div class="btn-group ">
						<button type="button" class="btn btn-sm btn-default checkbox-toggle">
							<i class="fa fa-square-o" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.select_all'), false); ?>"></i>
						</button>
						<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<span class="caret"></span>
							<span class="sr-only"><?php echo e(trans('app.toggle_dropdown'), false); ?></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.massUpdate', [ App\Message::STATUS_NEW, 'status' ]), false); ?>" class="massAction" data-doafter="reload">
								<i class="fa fa-envelope-o"></i> <?php echo e(trans('app.new'), false); ?></a></li>
							<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.massUpdate', [ App\Message::STATUS_READ, 'status' ]), false); ?>" class="massAction" data-doafter="reload"><i class="fa fa-envelope-open"></i> <?php echo e(trans('app.read'), false); ?></a></li>
							<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.massUpdate', [ App\Message::STATUS_UNREAD, 'status' ]), false); ?>" class="massAction" data-doafter="reload"><i class="fa fa-envelope"></i> <?php echo e(trans('app.unread'), false); ?></a></li>
							<li class="divider"></li>

							<?php if($requestLabel <= \App\Message::LABEL_DRAFT): ?>
								<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.massUpdate', [ App\Message::LABEL_SPAM, 'label' ]), false); ?>" class="massAction" data-doafter="remove"><i class="fa fa-filter"></i> <?php echo e(trans('app.spam'), false); ?></a></li>

								<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.massUpdate', [ App\Message::LABEL_TRASH, 'label' ]), false); ?>" class="massAction" data-doafter="remove"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
							<?php else: ?>
								<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.massUpdate', [ App\Message::LABEL_INBOX, 'label' ]), false); ?>" class="massAction" data-doafter="remove"><i class="fa fa-inbox"></i> <?php echo e(trans('app.move_to_inbox'), false); ?></a></li>
							<?php endif; ?>

							<?php if($requestLabel > \App\Message::LABEL_DRAFT): ?>
								<li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.massDestroy'), false); ?>" class="massAction" data-doafter="remove"><i class="glyphicon glyphicon-trash"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
							<?php endif; ?>
						</ul>
	                </div>

	                <button type="button" class="btn btn-default btn-sm" onClick="window.location.reload();"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.refresh'), false); ?>"></i></button>

                	<?php if($search_q): ?>
		                <div id="" style="display: inline;"> <?php echo e(trans('app.search_result_for') . " '" . $search_q . "'", false); ?> </div>
					<?php endif; ?>

	                <div class="pull-right">
	                	<?php if($messages->count()): ?>
							<?php echo e($messages->links('admin.partials._pagination_btn'), false); ?>

						<?php endif; ?>
	                </div> <!-- /.pull-right -->
              	</div>

              	<div class="table-responsive mailbox-messages" id="massSelectArea">
	                <table class="table table-hover table-striped">
	                  	<tbody>
							<?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		                  		<tr id="item_<?php echo e($message->id, false); ?>">
				                    <td>
				                    	<input id="<?php echo e($message->id, false); ?>" type="checkbox" class="massCheck">
				                    </td>
				                    <td class="mailbox-name">
				                    	<a href="<?php echo e(route('admin.support.message.show', $message), false); ?>">
				                    		<?php if($message->isUnread()): ?>
												<strong><?php echo highlightWords($message->customer->getName(), $search_q); ?></strong>
											<?php else: ?>
												<?php echo highlightWords($message->customer->getName(), $search_q); ?>

											<?php endif; ?>
				                    	</a>
				                	</td>
				                    <td class="mailbox-subject">
				                    	<a href="<?php echo e(route('admin.support.message.show', $message), false); ?>" style="<?php echo e($message->isUnread() ? 'color: #222;' : '', false); ?>">
				                    		<strong><?php echo highlightWords($message->subject, $search_q); ?> </strong> - <?php echo highlightWords(str_limit(strip_tags($message->message), 180 - strlen($message->subject)), $search_q); ?>

				                    	</a>
				                    </td>
				                    <td class="">
				                    	<small>
					                    	<?php if($message->isUnread()): ?>
					                    		<?php echo $message->statusName(); ?>

											<?php endif; ?>
					                    	<?php if($message->about()): ?>
												<?php echo $message->about(); ?>

											<?php endif; ?>
					                    	<?php if($message->replies_count): ?>
						                    	<span class="label label-default" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.replies'), false); ?>"><?php echo e($message->replies_count, false); ?></span>
											<?php endif; ?>
										</small>
				                    </td>
				                    <td class="mailbox-attachment">
				                    	<?php if($message->hasAttachments()): ?>
					                    	<i class="fa fa-paperclip" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.attachments'), false); ?>"></i>
										<?php endif; ?>
				                    </td>
				                    <td class="mailbox-date"><?php echo e($message->updated_at->diffForHumans(), false); ?></td>
		                  		</tr>
	                  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	                  			<tr><p class="text-center"> <?php echo e(trans('app.no_data_found'), false); ?> </p></tr>
							<?php endif; ?>
	                  	</tbody>
	                </table> <!-- /.table -->
              	</div> <!-- /.mail-box-messages -->

              	<div class="mailbox-controls">
	                <div class="pull-right">
	                	<?php if($messages->count()): ?>
							<?php echo e($messages->links('admin.partials._pagination_btn'), false); ?>

						<?php endif; ?>
	                </div>
                </div>
                <br><br>
            </div>
          </div> <!-- /. box -->
        </div> <!-- /.col -->
      </div> <!-- /.row -->
    </section> <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/message/index.blade.php ENDPATH**/ ?>