<div id="global-alert-box" class="alert alert-warning alert-dismissible <?php echo e(Session::has('global_msg') ? '' : 'hidden', false); ?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-warning"></i> <?php echo e(trans('app.alert'), false); ?></h4>
  <p id="global-alert-msg"><?php echo e(Session::get('global_msg'), false); ?></p>
</div>

<div id="global-notice-box" class="alert alert-info alert-dismissible <?php echo e(Session::has('global_notice') ? '' : 'hidden', false); ?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-info-circle"></i> <?php echo e(trans('app.notice'), false); ?></h4>
  <p id="global-notice"><?php echo e(Session::get('global_notice'), false); ?></p>
</div>

<div id="global-error-box" class="alert alert-danger alert-dismissible <?php echo e(Session::has('global_error') ? '' : 'hidden', false); ?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-stop-circle-o"></i> <?php echo e(trans('app.error'), false); ?></h4>
  <p id="global-error"><?php echo e(Session::get('global_error'), false); ?></p>
</div> <!-- /#global-alert-box --><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/_global_notice.blade.php ENDPATH**/ ?>