<?php if($paginator->hasPages()): ?>
    <div class="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
            <a href="#" class="disabled">&laquo;</a>
        <?php else: ?>
            <a href="<?php echo e($paginator->previousPageUrl(), false); ?>" rel="prev">&laquo;</a>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <a href="#" class="disabled"><?php echo e($element, false); ?></a>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <a href="#" class="active"><?php echo e($page, false); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e($url, false); ?>"><?php echo e($page, false); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a href="<?php echo e($paginator->nextPageUrl(), false); ?>" rel="next">&raquo;</a>
        <?php else: ?>
            <a class="disabled">&raquo;</a>
        <?php endif; ?>
    </div>
<?php endif; ?><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/layouts/pagination.blade.php ENDPATH**/ ?>