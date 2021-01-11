<?php if(Session::has('success')): ?>
	<script type="text/javascript">
	    <?php echo $__env->make('layouts.notification', ['message' => Session::get('success'), 'type' => 'success'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</script>
<?php elseif(Session::has('warning')): ?>
	<script type="text/javascript">
	    <?php echo $__env->make('layouts.notification', ['message' => Session::get('warning'), 'type' => 'warning', 'icon' => 'warning'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</script>
<?php elseif(Session::has('error')): ?>
	<script type="text/javascript">
	    <?php echo $__env->make('layouts.notification', ['message' => Session::get('error'), 'type' => 'danger', 'icon' => 'warning'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</script>
<?php elseif(Session::has('info')): ?>
	<script type="text/javascript">
	    <?php echo $__env->make('layouts.notification', ['message' => Session::get('info'), 'type' => 'info', 'icon' => 'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</script>
<?php endif; ?><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/notifications.blade.php ENDPATH**/ ?>