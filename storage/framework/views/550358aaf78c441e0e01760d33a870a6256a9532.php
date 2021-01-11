<?php echo e(trans('app.of_total', ['first' => $paginator->firstItem(), 'last' => $paginator->lastItem(), 'total' => $paginator->total()]), false); ?>


<div class="btn-group">
	<?php if($paginator->onFirstPage()): ?>
		<button type="button" class="btn btn-default btn-sm disabled"><i class="fa fa-chevron-left"></i></button>
    <?php else: ?>
		<a href="<?php echo e($paginator->previousPageUrl(), false); ?>" type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></a>
    <?php endif; ?>

	<?php if($paginator->hasMorePages()): ?>
		<a href="<?php echo e($paginator->nextPageUrl(), false); ?>" type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></a>
    <?php else: ?>
		<button type="button" class="btn btn-default btn-sm disabled"><i class="fa fa-chevron-right"></i></button>
    <?php endif; ?>
</div><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/_pagination_btn.blade.php ENDPATH**/ ?>