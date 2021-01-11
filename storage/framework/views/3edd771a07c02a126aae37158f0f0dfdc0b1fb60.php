<div id="openChatbox-<?php echo e($chat->customer_id, false); ?>" class="row heading">
    <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
       <img src="<?php echo e(get_avatar_src($chat->customer, 'mini'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
    </div>
    <div class="col-sm-8 col-xs-7 heading-name">
			<?php if(Gate::allows('view', $chat->customer)): ?>
         <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $chat->customer_id), false); ?>" class="ajax-modal-btn heading-name-meta"><?php echo $chat->customer->getName(); ?></a>
			<?php else: ?>
				 <span class="heading-name-meta"><?php echo e($chat->customer->getName(), false); ?></span>
			<?php endif; ?>
      
    </div>
    <div class="col-sm-1 col-xs-1  heading-dot pull-right">
      
    </div>
</div>

<div class="row message" id="conversationBox">
	<div class="row message-previous">
  		<div class="col-sm-12 previous">
    		<a onclick="previous(this)" id="ankitjain28" name="20">
        		
		    </a>
  		</div>
	</div>

	<div class="row message-body">
	  	<div class="col-sm-12 message-main-receiver">
	        <div class="receiver">
	          <div class="message-text">
					       <?php echo $chat->message; ?>

	        	</div>
	        </div>
	        <span class="message-time">
	            <?php echo e($chat->created_at->diffForHumans(), false); ?>

	        </span>
	  	</div>
	</div>

  <?php $__currentLoopData = $chat->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row message-body">
        <div class="col-sm-12 message-main-<?php echo e($reply->customer_id ? 'receiver' : 'sender', false); ?>">
          <div class="<?php echo e($reply->customer_id ? 'receiver' : 'sender', false); ?>">
            	<div class="message-text">
      					<?php echo $reply->reply; ?>

            	</div>
          </div>
        	<span class="message-time">
	            <?php echo e($reply->updated_at->diffForHumans(), false); ?>

        	</span>
        </div>
      </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row reply">
	<?php echo Form::open(['route' => ['admin.support.chat_conversation.reply', $chat], 'files' => true, 'id' => 'chat-form', 'data-toggle' => 'validator']); ?>

        <div class="col-sm-1 col-xs-1 reply-attachment">
          	
        </div>
        <div class="col-sm-10 col-xs-10 reply-main">
          	<textarea id="message" name="message" placeholder="Write your reply here ... " class="form-control" rows="1"></textarea>
        </div>
        <div class="col-sm-1 col-xs-1 reply-send nopadding-left">
          	<i class="fa fa-send fa-2x" id="send-btn" aria-hidden="true"></i>
        </div>
	<?php echo Form::close(); ?>

</div>
<?php /**PATH /home/amraibes/public_html/resources/views/admin/chat/_chat_conversation.blade.php ENDPATH**/ ?>