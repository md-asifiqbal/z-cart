<!-- Notie -->


<?php if(Session::has('success')): ?>
	<script type="text/javascript">
		notie.alert(1, '<?php echo e(Session::get('success'), false); ?>', 2);
	</script>
<?php elseif(Session::has('warning')): ?>
	<script type="text/javascript">
		notie.alert(2, '<?php echo e(Session::get('warning'), false); ?>', 2);
	</script>
<?php elseif(Session::has('error')): ?>
	<script type="text/javascript">
		notie.alert(3, '<?php echo e(Session::get('error'), false); ?>', 4);
	</script>
<?php elseif(Session::has('info')): ?>
	<script type="text/javascript">
		notie.alert(4, '<?php echo e(Session::get('info'), false); ?>', 4);
	</script>
<?php endif; ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/notification.blade.php ENDPATH**/ ?>