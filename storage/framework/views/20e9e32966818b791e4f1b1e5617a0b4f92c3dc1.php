<!-- Main Footer -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
  	<?php if(auth()->user()->isSuperAdmin()): ?>
	    <a href="https://incevio.com/" target="_blank">zCart Version: <?php echo e(\App\System::VERSION, false); ?></a>
  	<?php else: ?>
	  	<span><?php echo e(trans('app.today_is') . ' ' . date('l M-j, Y'), false); ?></span>
  	<?php endif; ?>
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; <?php echo e(date('Y'), false); ?> <?php echo e(config('system_settings.name') ?: config('app.name'), false); ?>.</strong> All rights reserved.
</footer><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/footer.blade.php ENDPATH**/ ?>