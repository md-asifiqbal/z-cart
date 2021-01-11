<div class="row add-to-cart-option">
  <div class="col-md-9 nopadding input-lg">
    <?php echo Form::select('product', $products, null, ['id' => 'product-to-add', 'class' => 'form-control select2', 'placeholder' => trans('app.placeholder.choose_product')]); ?>

  </div>
  <div class="col-md-3 nopadding">
    <button class="btn btn-lg bg-purple btn-block" id="add-to-cart-btn"><?php echo e(trans('app.add_to_cart'), false); ?></button>
  </div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/order/_add_to_cart.blade.php ENDPATH**/ ?>