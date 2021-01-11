<?php if($visitor->isBlocked()): ?>
	<a href="<?php echo e(route('admin.visitor.unban', $visitor), false); ?>" class="confirm"><i class="fa fa-tree" data-toggle="tooltip" title="<?php echo e(trans('app.unblock_ip'), false); ?>"></i></a>
<?php else: ?>
	<?php echo Form::open(['route' => ['admin.visitor.ban', $visitor], 'method' => 'delete', 'class' => 'data-form']); ?>

		<?php echo Form::button('<i class="fa fa-ban"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.ban_ip'), 'data-toggle' => 'tooltip', 'data-placement' => 'left']); ?>

	<?php echo Form::close(); ?>

<?php endif; ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/actions/visitor/options.blade.php ENDPATH**/ ?>