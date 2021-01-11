<style type="text/css">
</style>
<div class="row message-list-item <?php echo e($message->user_id ? 'message-seller' : 'message-buyer message-me', false); ?>">
    <div class="col-xs-2 nopadding-right">
      <?php if($message->user_id): ?>
          <div class="message-user-info">
              <div class="message-user-name" title="seller"><?php echo e($message->shop ? $message->shop->name : trans('theme.store'), false); ?></div>
            <div class="message-date"><?php echo e($message->created_at->toDayDateTimeString(), false); ?></div>
        </div>
      <?php endif; ?>
    </div> <!-- .col-xs-2 -->
    <div class="col-xs-8">
        <div class="message-content-wrapper">
          <div class="message-content">
            <h4><?php echo $message->subject; ?></h4>
            <?php echo $message->message; ?>

          </div>
          <?php if($attachment = optional($message->attachments)->first()): ?>
            <a href="<?php echo e(get_storage_file_url($attachment->path, 'original'), false); ?>" class="pull-right message-attachment" target="_blank">
              <img src="<?php echo e(get_storage_file_url($attachment->path, 'tiny'), false); ?>" class="img-sm thumbnail">
            </a>
          <?php endif; ?>
        </div>
    </div> <!-- .col-xs-8 -->
    <div class="col-xs-2 nopadding-left">
      <?php if (! ($message->user_id)): ?>
        <div class="message-user-info">
            <div class="message-user-name" title="me"><?php echo app('translator')->getFromJson('theme.me'); ?></div>
            <div class="message-date"><?php echo e($message->created_at->toDayDateTimeString(), false); ?></div>
        </div>
      <?php endif; ?>
    </div> <!-- .col-xs-2 -->
</div>

<?php $__currentLoopData = $message->replies->sortBy('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="row message-list-item <?php echo e($msg->customer_id ? 'message-buyer message-me' : 'message-seller', false); ?>">
    <div class="col-xs-2 nopadding-right">
      <?php if (! ($msg->customer_id)): ?>
          <div class="message-user-info">
            <div class="message-user-name" title="seller"><?php echo e($message->shop ? $message->shop->name : trans('theme.store'), false); ?></div>
            <div class="message-date"><?php echo e($msg->created_at->toDayDateTimeString(), false); ?></div>
        </div>
      <?php endif; ?>
    </div> <!-- .col-xs-2 -->
    <div class="col-xs-8">
        <div class="message-content-wrapper">
            <div class="message-content"><?php echo $msg->reply; ?></div>
          <?php if($attachment = optional($msg->attachments)->first()): ?>
          <a href="<?php echo e(get_storage_file_url($attachment->path, 'original'), false); ?>" class="pull-right message-attachment" target="_blank">
            <img src="<?php echo e(get_storage_file_url($attachment->path, 'tiny'), false); ?>" class="img-sm thumbnail">
          </a>
          <?php endif; ?>
        </div>
    </div> <!-- .col-xs-8 -->
    <div class="col-xs-2 nopadding-left">
        <?php if($msg->customer_id): ?>
            <div class="message-user-info">
                <div class="message-user-name" title="me"><?php echo app('translator')->getFromJson('theme.me'); ?></div>
              <div class="message-date"><?php echo e($msg->created_at->toDayDateTimeString(), false); ?></div>
          </div>
        <?php endif; ?>
    </div> <!-- .col-xs-2 -->
  </div> <!-- .row .message-list-item -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Reply the conversation -->
<div class="clearfix space20"></div>
<div class="row message-list-item">
  <div class="col-xs-2 nopadding-right">
  </div> <!-- .col-xs-2 -->
  <div class="col-xs-8">
    <?php echo Form::open(['route' => ['message.reply', $message], 'files' => true, 'id' => 'conversation-form', 'data-toggle' => 'validator']); ?>

        <div class="form-group">
          <?php echo Form::textarea('reply', null, ['class' => 'form-control form-control flat', 'placeholder' => trans('theme.placeholder.message'), 'rows' => '3', 'maxlength' => 500, 'required']); ?>

            <div class="help-block with-errors"></div>
        </div>
        <?php echo Form::button(trans('theme.button.send_message'), ['type' => 'submit', 'class' => 'btn btn-info flat pull-right']); ?>

    <?php echo Form::close(); ?>

  </div> <!-- .col-xs-8 -->
  <div class="col-xs-2 nopadding-left">
  </div> <!-- .col-xs-2 -->
</div> <!-- .row .message-list-item -->

<div class="clearfix space50"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/message.blade.php ENDPATH**/ ?>