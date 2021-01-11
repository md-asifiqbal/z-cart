<?php echo e($product->name, false); ?>


<?php if (! ($product->active)): ?>
    <span class="label label-default indent10"><?php echo e(trans('app.inactive'), false); ?></span>
<?php endif; ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/actions/product/name.blade.php ENDPATH**/ ?>