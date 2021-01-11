<?php $__env->startSection('content'); ?>

  <div id="chatbox">
      <div class="row chatContent">
        <div class="col-sm-4 side">
            <?php echo $__env->make('admin.chat._left_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div id="chatConversation" class="col-sm-8 conversation">
            <div class="row heading">
                <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
                   <img src="<?php echo e(get_gravatar_url('help@incevio.com', 'mini'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
                </div>
                <div class="col-sm-8 col-xs-7 heading-name">
                   <span class="heading-name-meta"><?php echo e(trans('app.conversations'), false); ?></span>
                </div>
            </div>

            <div class="row message">
                <div class="row message-body">
                  <div class="col-sm-12">
                    <p class="lead"><?php echo trans('messages.please_select_conversation'); ?></p>
                  </div>
                </div>
            </div>
        </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <?php echo $__env->make('plugins.chatbox', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/chat/index.blade.php ENDPATH**/ ?>