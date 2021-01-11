<?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<span class="label label-outline"><?php echo e($category->name, false); ?></span>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/amraibest.com/public_html/resources/views/admin/partials/actions/product/category.blade.php ENDPATH**/ ?>