<div class="modal-dialog modal-md">
    <div class="modal-content">
        <?php echo Form::open(['route' => ['admin.stock.inventory.addWithVariant', $product_id], 'method' => 'get', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.form.set_variants'), false); ?>

        </div>
        <div class="modal-body">
            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <?php echo Form::label($attribute->name, $attribute->name, ['class' => 'with-help']); ?>

                    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.set_attribute'), false); ?>"></i>
                    <select class="form-control select2-set_attribute" id="<?php echo e($attribute->name, false); ?>" name="<?php echo e($attribute->id, false); ?>[]" multiple='multiple' placeholder="<?php echo e(trans('app.placeholder.attribute_values'), false); ?>">
                        <?php $__currentLoopData = $attribute->attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($attributeValue->id, false); ?>"><?php echo e($attributeValue->value, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.form.set_variants'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/inventory/_set_variant.blade.php ENDPATH**/ ?>