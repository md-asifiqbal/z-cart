<div id="leftsidebar">
    <div class="row heading">
      <div class="heading-title">
        <i class="fa fa-comments fa-2x" aria-hidden="true"></i>
        <?php echo e(trans('app.chat_conversations'), false); ?>

      </div>
    </div>

    

    <div class="row sidebarContent">
		<?php $__empty_1 = true; $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			<div id="chat-<?php echo e($conversation->customer_id, false); ?>" class="row sidebarBody <?php echo e(isset($chat) && ($conversation->id == $chat->id) ? 'active' : '', false); ?>">
            	<a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.chat_conversation.show', $conversation), false); ?>" class="get-content" style="<?php echo e($conversation->isUnread() ? 'color: #222;' : '', false); ?>">
					<div class="col-sm-3 col-xs-3">
					    <img src="<?php echo e(get_avatar_src($conversation->customer, 'mini'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
					</div>

					<div class="col-sm-9 col-xs-9 sideBar-main nopadding">
					  	<div class="row">
						    <div class="col-sm-8 col-xs-8 sideBar-name">
						      	<span class="name-meta <?php echo e($conversation->isUnread() ? 'strong' : '', false); ?>">
									<?php echo $conversation->customer->getName(); ?>


									<span class="label label-primary flat indent10 <?php echo e(!$conversation->isUnread() ? 'hide' : '', false); ?>"><?php echo e($conversation->statusName(true), false); ?></span>
						    	</span>

		            			<p class="excerpt <?php echo e($conversation->isUnread() ? 'strong' : '', false); ?>">
		            				<?php echo Str::limit($conversation->last_message(), 120); ?>

			            		</p>
						    </div>

						    <div class="col-sm-4 col-xs-4 pull-right time">
						      	<span class="time-meta pull-right"><?php echo e($conversation->updated_at->diffForHumans(), false); ?></span>
						    </div>
					  	</div>
					</div>
				</a>
			</div>
  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  			<p class="text-center"> <?php echo e(trans('app.no_data_found'), false); ?> </p>
		<?php endif; ?>
    </div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/chat/_left_nav.blade.php ENDPATH**/ ?>