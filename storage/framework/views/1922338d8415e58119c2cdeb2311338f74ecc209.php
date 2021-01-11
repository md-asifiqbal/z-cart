<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-history"></i> <?php echo e(trans('app.history'), false); ?></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div> <!-- /.box-header -->
  <div class="box-body">
    <div id="menu">
      <div class="panel list-group">
        <?php $__empty_1 = true; $__currentLoopData = $logger->logs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <?php
            $changes = $log->changes;
                // print_r($changes); //echo "<pre>"; //exit('end!');
          ?>

          <a class="list-group-item" data-toggle="collapse" data-target="#sl-<?php echo e($log->id, false); ?>" data-parent="#menu">
            <span class="fa-stack fa-md">
              <i class="fa fa-circle-thin fa-stack-2x"></i>
              <i class="fa fa-check fa-stack-1x"></i>
            </span>
            <?php echo e(get_activity_title($log), false); ?>

            <span class="pull-right"><?php echo e($log->created_at->diffForHumans(), false); ?></span>
          </a>
          <div id="sl-<?php echo e($log->id, false); ?>" class="sublinks collapse">
            <?php if( ! empty($changes) && (strtolower($log->description) == 'updated')): ?>
              <?php $__currentLoopData = $changes['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrbute => $new_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="list-group-item  list-group-item-info">
                  <i class="fa fa-arrow-circle-o-right indent20"></i>
                  <span class="indent5">
                    <?php echo get_activity_str($logger, $attrbute, $new_value, $changes['old'][$attrbute]); ?>

                  </span>
                </p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="list-group-item  list-group-item-info"><i class="fa fa-arrow-circle-o-right indent20"> </i> <span class="indent5"><?php echo e(trans('messages.no_changes'), false); ?></span></p>
            <?php endif; ?>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <span class="indent5"><?php echo e(trans('messages.no_history_data'), false); ?></span>
        <?php endif; ?>
      </div> <!-- /.panel -->
    </div> <!-- /#menu -->
  </div> <!-- /.box-body -->
</div> <!-- /.box --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/_activity_logs.blade.php ENDPATH**/ ?>