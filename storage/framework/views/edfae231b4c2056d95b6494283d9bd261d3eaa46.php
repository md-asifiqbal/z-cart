<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.create'), false); ?>"  class="ajax-modal-btn btn btn-new btn-lg btn-block"><?php echo e(trans('app.compose'), false); ?></a>

<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.message.create', 'template'), false); ?>"  class="ajax-modal-btn btn btn-info btn-lg btn-block margin-bottom"><?php echo e(trans('app.new_message_with_template'), false); ?></a>

<div class="box box-solid">
	<div class="box-header">
	  <h3 class="box-title"><?php echo e(trans('app.folders'), false); ?></h3>
	</div>
	<div class="box-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php echo e(Request::is('*/labelOf/' . App\Message::LABEL_INBOX.'*') || (isset($message) && $message->label == App\Message::LABEL_INBOX) ? 'active' : '', false); ?>">
				<a href="<?php echo e(route('admin.support.message.labelOf', App\Message::LABEL_INBOX), false); ?>"><i class="fa fa-inbox"></i> <?php echo e(trans('app.inbox'), false); ?>

					<?php if($unread_msg_count = \App\Helpers\Statistics::unread_msg_count()): ?>
						<span class="label label-primary pull-right"><?php echo e($unread_msg_count, false); ?></span>
					<?php endif; ?>
				</a>
			</li>
			<li class="<?php echo e(Request::is('*/labelOf/' . App\Message::LABEL_SENT.'*') || (isset($message) && $message->label == App\Message::LABEL_SENT) ? 'active' : '', false); ?>">
				<a href="<?php echo e(route('admin.support.message.labelOf', App\Message::LABEL_SENT), false); ?>"><i class="fa fa-envelope-o"></i> <?php echo e(trans('app.sent'), false); ?></a>
			</li>
			<li class="<?php echo e(Request::is('*/labelOf/' . App\Message::LABEL_DRAFT.'*') || (isset($message) && $message->label == App\Message::LABEL_DRAFT) ? 'active' : '', false); ?>">
				<a href="<?php echo e(route('admin.support.message.labelOf', App\Message::LABEL_DRAFT), false); ?>"><i class="fa fa-file-text-o"></i> <?php echo e(trans('app.drafts'), false); ?>

					<?php if($draft_msg_count = \App\Helpers\Statistics::draft_msg_count()): ?>
						<span class="label label-default pull-right"><?php echo e($draft_msg_count, false); ?></span>
					<?php endif; ?>
				</a>
			</li>
			<li class="<?php echo e(Request::is('*/labelOf/' . App\Message::LABEL_SPAM.'*') || (isset($message) && $message->label == App\Message::LABEL_SPAM) ? 'active' : '', false); ?>">
				<a href="<?php echo e(route('admin.support.message.labelOf', App\Message::LABEL_SPAM), false); ?>"><i class="fa fa-filter"></i> <?php echo e(trans('app.spams'), false); ?>

					<?php if($spam_msg_count = \App\Helpers\Statistics::spam_msg_count()): ?>
						<span class="label label-warning pull-right"><?php echo e($spam_msg_count, false); ?></span>
					<?php endif; ?>
				</a>
			</li>
			<li class="<?php echo e(Request::is('*/labelOf/' . App\Message::LABEL_TRASH.'*') || (isset($message) && $message->label == App\Message::LABEL_TRASH) ? 'active' : '', false); ?>">
				<a href="<?php echo e(route('admin.support.message.labelOf', App\Message::LABEL_TRASH), false); ?>"><i class="fa fa-trash-o"></i> <?php echo e(trans('app.trash'), false); ?>

					<?php if( ($trash_msg_count = \App\Helpers\Statistics::trash_msg_count()) && $trash_msg_count > 10 ): ?>
						<span class="label label-danger pull-right"><?php echo e($trash_msg_count, false); ?></span>
					<?php endif; ?>
				</a>
			</li>
		</ul>
	</div>
	<!-- /.box-body -->
</div>
<!-- /. box --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/message/_left_nav.blade.php ENDPATH**/ ?>