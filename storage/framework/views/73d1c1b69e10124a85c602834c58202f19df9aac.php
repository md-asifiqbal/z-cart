<div class="row">
  <div class="col-md-12">
    <table class="table table-sripe">
      <tbody id="items">
        <tr id='empty-cart' style="display: <?php echo e((isset($cart) && count($cart->inventories) > 0) ? 'none' : 'table-row', false); ?>"><td colspan="5"><?php echo e(trans('help.empty_cart'), false); ?></td></tr>

        <?php if(isset($cart) && count($cart->inventories) > 0): ?>
          <?php
            $i = 1;
          ?>
          <?php $__currentLoopData = $cart->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $id = $item->pivot->inventory_id;
            ?>

            <tr id="<?php echo e($id, false); ?>">
              <td>
                <img src="<?php echo e(get_product_img_src($item, 'tiny'), false); ?>" class="img-circle img-md" alt="<?php echo e(trans('app.image'), false); ?>">
              </td>
              <td class="nopadding-right" width="55%">
                <?php echo e($item->pivot->item_description, false); ?>

                <?php echo e(Form::hidden("cart[".$i."][inventory_id]", $id), false); ?>

                <?php echo e(Form::hidden("cart[".$i."][item_description]", $item->pivot->item_description), false); ?>

                <?php echo e(Form::hidden("cart[".$i."][shipping_weight]", $item->shipping_weight), false); ?>

              </td>
              <td class="nopadding-right" width="15%">
                <?php echo e(Form::number("cart[".$i."][unit_price]", get_formated_decimal($item->sale_price), ['id' => 'price-'.$id, 'class' => 'form-control itemPrice no-border', 'step' => 'any', 'required']), false); ?>

              </td>
              <td>x</td>
              <td class="nopadding-right" width="10%">
                <?php echo e(Form::number("cart[".$i."][quantity]", $item->pivot->quantity, ['id' => 'qtt-'.$id, 'class' => 'form-control itemQtt no-border', 'required']), false); ?>

              </td>
              <td class="nopadding-right text-center" width="10%"><?php echo e(get_formated_currency_symbol(), false); ?>

                <span id="total-<?php echo e($id, false); ?>"  class="itemTotal">
                  <?php echo e(get_formated_decimal($item->pivot->quantity * $item->sale_price), false); ?>

                </span>
              </td>
              <td class="small"><i class="fa fa-trash text-muted deleteThisRow" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.romove_this_cart_item'), false); ?>"></i></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div><?php /**PATH /home/amraibes/public_html/resources/views/admin/order/_cart.blade.php ENDPATH**/ ?>