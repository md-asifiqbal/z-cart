<?php $__env->startSection('buttons'); ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Order::class)): ?>
    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.order.searchCutomer'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.search_again'), false); ?></a>
  <?php endif; ?>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Order::class)): ?>
    <a href="<?php echo e(route('admin.order.order.index'), false); ?>" class="btn btn-new btn-flat"><?php echo e(trans('app.cancel'), false); ?></a>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php
    $shipping_address = $customer->shippingAddress ? $customer->shippingAddress : $customer->primaryAddress;
    $billing_address = $customer->billingAddress ? $customer->billingAddress : $shipping_address;
    $shipping_zone = $shipping_address ?
                    get_shipping_zone_of(Auth::user()->merchantId(), $shipping_address->country_id, $shipping_address->state_id) : Null;

    $shipping_options = isset($shipping_zone->id) ? getShippingRates($shipping_zone->id) : 'NaN';
    $packaging_options = getPackagings();
    $default_packaging = isset($cart->packaging_id) ? $cart->shippingPackage : getDefaultPackaging();
  ?>

  <div class="row">
    <?php if(count($cart_lists)): ?>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Cart::class)): ?>
        <div class="col-md-12">
          <?php echo $__env->make('admin.partials._cart_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php echo Form::open(['route' => 'admin.order.order.store', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

      <div class="col-md-9">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-cart-plus"></i> <?php echo e(trans('app.cart'), false); ?></h3>
          </div> <!-- /.box-header -->
          <div class="box-body">
            <?php echo e(Form::hidden('customer_id', $customer->id), false); ?>

            <?php echo e(Form::hidden('discount', isset($cart->discount) ? $cart->discount : Null, ['id' => 'cart-discount']), false); ?>

            <?php echo e(Form::hidden('taxrate', Null, ['id' => 'cart-taxrate']), false); ?>

            <?php echo e(Form::hidden('taxes', Null, ['id' => 'cart-taxes']), false); ?>

            <?php echo e(Form::hidden('packaging_id', $default_packaging ? $default_packaging->id : Null, ['id' => 'packaging_id']), false); ?>

            <?php echo e(Form::hidden('packaging', $default_packaging ? $default_packaging->cost : Null, ['id' => 'cart-packaging']), false); ?>

            <?php echo e(Form::hidden('shipping', Null, ['id' => 'cart-shipping']), false); ?>

            <?php echo e(Form::hidden('shipping_zone_id', isset($shipping_zone->id) ? $shipping_zone->id : Null, ['id' => 'shipping_zone_id']), false); ?>

            <?php echo e(Form::hidden('shipping_rate_id', Null, ['id' => 'shipping_rate_id']), false); ?>

            <?php echo e(Form::hidden('shipping_address', $shipping_address ? $shipping_address->id : Null), false); ?>

            <?php echo e(Form::hidden('billing_address', $billing_address ? $billing_address->id : Null), false); ?>


            <?php echo $__env->make('admin.order._add_to_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('admin.order._cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <hr class="style7">

            <div class="row">
              <div class="col-md-6">
                <dir class="spacer30"></dir>
                <div class="form-group">
                  <?php echo Form::label('admin_note', trans('app.form.admin_note'), ['class' => 'with-help']); ?>

                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.admin_note'), false); ?>"></i>
                  <?php echo Form::textarea('admin_note', (isset($cart->admin_note)) ? $cart->admin_note : null, ['class' => 'form-control summernote-without-toolbar', 'rows' => '2', 'placeholder' => trans('app.placeholder.admin_note')]); ?>

                </div>
              </div>
              <div class="col-md-6" id="summary-block">
                <table class="table">
                  <tr>
                    <td class="text-right"><?php echo e(trans('app.total'), false); ?></td>
                    <td class="text-right" width="40%"><?php echo e(get_formated_currency_symbol(), false); ?>

                      <span id="summary-total"><?php echo e(get_formated_decimal(0, true, 2), false); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-right">
                      <a class="discount-options" data-toggle="popover" title= "<?php echo e(trans('app.discount'), false); ?>">
                        <u><?php echo e(trans('app.discount'), false); ?></u>
                      </a>
                    </td>
                    <td class="text-right" width="40%"> &minus; <?php echo e(get_formated_currency_symbol(), false); ?>

                      <span id="summary-discount">
                        <?php echo e(isset($cart->discount) ? get_formated_decimal($cart->discount, true, 2) : get_formated_decimal(0, true, 2), false); ?>

                      </span>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-right">
                      <a class="dynamic-shipping-rates" data-toggle="popover" title= "<?php echo e(trans('app.shipping'), false); ?>">
                        <u><?php echo e(trans('app.shipping'), false); ?></u></a><br/>
                      <em id="summary-shipping-name" class="small"></em>
                    </td>
                    <td class="text-right" width="40%"><?php echo e(get_formated_currency_symbol(), false); ?>

                      <span id="summary-shipping"><?php echo e(get_formated_decimal(0, true, 2), false); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-right">
                      <a class="packaging-options" data-toggle="popover" title= "<?php echo e(trans('app.packaging'), false); ?>">
                        <u><?php echo e(trans('app.packaging'), false); ?></u></a><br/>
                      <em id="summary-packaging-name" class="small"><?php echo e($default_packaging ? $default_packaging->name : '', false); ?></em>
                    </td>
                    <td class="text-right" width="40%"><?php echo e(get_formated_currency_symbol(), false); ?>

                      <span id="summary-packaging">
                        <?php echo e(get_formated_decimal($default_packaging ? $default_packaging->cost : 0, true, 2), false); ?>

                      </span>
                    </td>
                  </tr>

                  <?php if( (bool) get_formated_decimal(config('shop_settings.order_handling_cost')) ): ?>
                    <tr>
                      <td class="text-right"><?php echo e(trans('app.handling'), false); ?></td>
                      <td class="text-right" width="40%"><?php echo e(get_formated_currency_symbol(), false); ?>

                        <span id="summary-handling"><?php echo e(get_formated_decimal(config('shop_settings.order_handling_cost'), true, 2), false); ?></span>
                      </td>
                    </tr>
                  <?php endif; ?>

                  <tr>
                    <td class="text-right"><?php echo e(trans('app.taxes'), false); ?> <br/>
                      <em class="small">
                        <?php echo e(isset($shipping_zone->name) ? $shipping_zone->name . ' ' : '', false); ?>

                        <span id="summary-taxrate"></span>%
                      </small>
                    </td>
                    <td class="text-right" width="40%"><?php echo e(get_formated_currency_symbol(), false); ?>

                      <span id="summary-tax"><?php echo e(get_formated_decimal(0, true, 2), false); ?></span>
                    </td>
                  </tr>

                  <tr class="lead">
                    <td class="text-right"><?php echo e(trans('app.grand_total'), false); ?></td>
                    <td class="text-right" width="40%"><?php echo e(get_formated_currency_symbol(), false); ?>

                      <span id="summary-grand-total"><?php echo e(get_formated_decimal(0, true, 2), false); ?></span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
          </div> <!-- /.box-body -->
        </div> <!-- /.box -->

        <div class="box">
          <div class="box-body">
            <?php if(isset($cart)): ?>
              <?php echo e(Form::hidden('cart_id', $cart->id, ['id' => 'cart_id']), false); ?>

              <?php if (! (isset($order_cart))): ?>
                <small>
                  <?php echo Form::checkbox('delete_the_cart', 1, null, ['class' => 'icheck', 'checked']); ?>

                  <?php echo Form::label('delete_the_cart', strtoupper(trans('app.delete_the_cart')), ['class' => 'indent5']); ?>

                  <i class="fa fa-question-circle indent5" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.delete_the_cart'), false); ?>"></i>
                </small>
              <?php endif; ?>
            <?php endif; ?>

            <div class="box-tools pull-right">
              <?php if(Gate::allows('create', App\Cart::class) || Gate::allows('create', App\Order::class) || Gate::allows('update', App\Cart::class)): ?>
                <button name='action' value="1" id="saveTheCart" class='btn btn-flat btn-lg btn-default' >
                    <i class="fa fa-save"></i>
                    <?php if(isset($order_cart)): ?>
                        <?php echo e(trans('app.update_the_order'), false); ?>

                    <?php elseif(isset($cart)): ?>
                      <?php echo e(trans('app.update_n_back'), false); ?>

                    <?php else: ?>
                      <?php echo e(trans('app.save_n_back'), false); ?>

                    <?php endif; ?>
                </button>
              <?php endif; ?>

              <?php if( $shipping_options != 'NaN' && ! isset($order_cart) && Gate::allows('create', App\Order::class)): ?>
                <button name='action' type="submit" class='btn btn-flat btn-lg btn-new' >
                  <?php echo e(trans('app.place_order'), false); ?>

                </button>
              <?php endif; ?>
            </div>
          </div> <!-- /.box-body -->
        </div> <!-- /.box -->
      </div>

      <div class="col-md-3 nopadding-left">
        <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> <?php echo e(trans('app.customer'), false); ?></h3>
          </div> <!-- /.box-header -->
          <div class="box-body">
            <p>
              <?php if($customer->image): ?>
                <img src="<?php echo e(get_storage_file_url(optional($customer->image)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
              <?php else: ?>
                <img src="<?php echo e(get_gravatar_url($customer->email, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
              <?php endif; ?>

              <span class="admin-user-widget-title indent5">
                  <?php echo e($customer->getName(), false); ?>

              </span>
            </p>

            <span class="admin-user-widget-text text-muted">
                <?php echo e(trans('app.email') . ': ' . $customer->email, false); ?>

            </span>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $customer)): ?>
              <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $customer->id), false); ?>" class="ajax-modal-btn btn btn-default btn-xs"><?php echo e(trans('app.view_detail'), false); ?></a>
            <?php endif; ?>
          </div>
        </div>

        <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> <?php echo e(trans('app.addresses'), false); ?></h3>
          </div> <!-- /.box-header -->
          <div class="box-body">
            <fieldset><legend><?php echo e(strtoupper(trans('app.shipping_address')), false); ?></legend></fieldset>
            <?php if(isset($cart->shipping_address)): ?>
              <a href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $cart->shipping_address), false); ?>" class="ajax-modal-btn pull-right indent10 small"><i class="fa fa-edit"></i> <?php echo e(trans('app.edit'), false); ?> </a>
              <?php echo $cart->shippingAddress->toHtml('<br/>', false); ?>

            <?php else: ?>
              <?php if($shipping_address): ?>
                <a href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $shipping_address->id), false); ?>" class="ajax-modal-btn pull-right indent10 small"><i class="fa fa-edit"></i> <?php echo e(trans('app.edit'), false); ?> </a>
                <?php echo $shipping_address->toHtml('<br/>', false); ?>

              <?php else: ?>
                <a href="javascript:void(0)" data-link="<?php echo e(route('address.create', ['customer', $customer->id]), false); ?>" class="ajax-modal-btn btn btn-new"><i class="fa fa-plus-square-o"></i> <?php echo e(trans('app.add_address'), false); ?> </a>
              <?php endif; ?>
            <?php endif; ?>

            <fieldset><legend><?php echo e(strtoupper(trans('app.billing_address')), false); ?></legend></fieldset>
            <small>
              <?php echo Form::checkbox('same_as_shipping_address', 1, Null, ['id' => 'same_as_shipping_address', 'class' => 'icheck']); ?>

              <?php echo Form::label('same_as_shipping_address', strtoupper(trans('app.same_as_shipping_address')), ['class' => 'indent5']); ?>

            </small>

            <div class="spacer20"></div>

            <div id="billing-address-block">
              <?php if(isset($cart->billing_address)): ?>
                <a href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $cart->billing_address), false); ?>" class="ajax-modal-btn pull-right indent10 small"><i class="fa fa-edit"></i> <?php echo e(trans('app.edit'), false); ?> </a>
                <?php echo $cart->billingAddress->toHtml('<br/>', false); ?>

              <?php else: ?>
                <?php if($billing_address): ?>
                  <a href="javascript:void(0)" data-link="<?php echo e(route('address.edit', $billing_address->id), false); ?>" class="ajax-modal-btn pull-right indent10 small"><i class="fa fa-edit"></i> <?php echo e(trans('app.edit'), false); ?> </a>
                  <?php echo $billing_address->toHtml('<br/>', false); ?>

                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> <?php echo e(trans('app.payment'), false); ?></h3>
          </div> <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <?php echo Form::label('payment_method_id', trans('app.form.payment_method').'*'); ?>

              <?php echo Form::select('payment_method_id', $payment_methods ,  isset($cart->payment_method_id) ? $cart->payment_method_id : config('shop_settings.default_payment_method_id') , ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.payment'), 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <?php echo Form::label('payment_status', trans('app.form.payment_status').'*'); ?>

              <?php echo Form::select('payment_status', $payment_statuses, (isset($cart->payment_status)) ? $cart->payment_status : 1, ['class' => 'form-control select2-normal', 'required']); ?>

              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo e(trans('app.invoice'), false); ?></h3>
          </div> <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <?php echo Form::label('message_to_customer', trans('app.form.message_to_customer'), ['class' => 'with-help']); ?>

              <i class="fa fa-question-circle indent5" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.message_to_customer'), false); ?>"></i>
              <?php echo Form::textarea('message_to_customer', (isset($cart->message_to_customer)) ? $cart->message_to_customer : null, ['class' => 'form-control summernote-without-toolbar', 'rows' => '2', 'placeholder' => trans('app.placeholder.message_to_customer')]); ?>

            </div>
            <small>
              <?php echo Form::checkbox('send_invoice_to_customer', 1, null, ['class' => 'icheck', 'checked']); ?>

              <?php echo Form::label('send_invoice_to_customer', strtoupper(trans('app.send_invoice_to_customer')), ['class' => 'indent5']); ?>

              <i class="fa fa-question-circle indent5" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.send_invoice_to_customer'), false); ?>"></i>
            </small>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
  <style type="text/css">
    #summary-block a{
      cursor: pointer;
    }
  </style>

  <script language="javascript" type="text/javascript">
    ;(function($, window, document) {
      var payment_methods = <?=$payment_methods;?>;
      if(payment_methods.length == 0){
        $("#global-alert-msg").html('<?php echo trans('messages.notice.no_active_payment_method') . ' ' . '<a href="' . route('admin.setting.config.paymentMethod.index') . '">' . trans('app.activate') . '</a>'; ?>');
        $("#global-alert-box").removeClass('hidden');
      }

      var billing_address = <?=$billing_address;?>;
      if(billing_address.length == 0){
        $("#global-alert-msg").html('<?php echo trans('messages.notice.no_billing_address') . ' ' . '<a class="ajax-modal-btn btn btn-new" href="javascript:void(0)" data-link="' . route('address.create', ['customer', $customer->id]) . '"><i class="fa fa-plus-square-o"></i>' . trans('app.add_address') . '</a>'; ?>');
        $("#global-alert-box").removeClass('hidden');
      }

      var cartWeight = 0;

      var packaging_options = <?=$packaging_options;?>;
      var shipping_options = <?=$shipping_options;?>;
      var productObj = <?=json_encode($inventories);?>;

      var cart = "<?php echo e(isset($cart) ? TRUE : FALSE, false); ?>";
      if(cart){
        setPackagingCost('<?php echo e($default_packaging->name, false); ?>', <?php echo e($default_packaging->cost, false); ?>, <?php echo e($default_packaging->id, false); ?>);
        calculateOrderTotal();
      }

      // Set default settings based on shop and system configs
      var taxId = "<?php echo e(isset($shipping_zone->tax_id) ? $shipping_zone->tax_id : config('shop_settings.default_tax_id'), false); ?>";
      if( taxId ){
        setTax(taxId);
      }

      if(!shipping_options){
        $("#global-alert-msg").html('<?php echo e(trans('messages.notice.no_shipping_option_for_the_zone'), false); ?>');
        $("#global-alert-box").removeClass('hidden');
      }
      else if($.isEmptyObject(shipping_options)){
        $("#global-alert-msg").html('<?php echo trans('messages.notice.no_rate_for_the_shipping_zone', ['zone' => optional($shipping_zone)->name]); ?>');
        $("#global-alert-box").removeClass('hidden');
      }

      var apply_btn = '<div class="spacer5"></div><button class="popover-submit-btn btn btn-flat btn-new btn-lg btn-block" type="button"><?php echo e(trans('app.apply'), false); ?></button>';

      // Do appropriate actions and Update order detail
      $(document).on("click", ".popover-submit-btn", function() {
        var node = $(this).parents('.popover-form');
        var nodeId = node.attr('id');

        switch(nodeId){
          case 'shipping-options-popover':
            var shipping = $('input[name=shipping_option]:checked');
            var name = shipping.attr('id') == 'custom_shipping' ? '<?php echo e(trans('app.custom_shipping'), false); ?>' : shipping.attr('id');
            var value = shipping.val();
            var id = shipping.parent('label').attr('id');
            setShippingCost(name, value, id);
            break;

          case 'packaging-options-popover':
            var packaging = $('input[name=packaging_option]:checked');
            var id = packaging.parent('label').attr('id');
            setPackagingCost(packaging.attr('id'), packaging.val(), id);
            break;

          case 'discount-options-popover':
            setDiscount(node.find('input#input-discount').val());
            break;
        }
      });

      $('a.discount-options').popover({
          html: true,
          placement:'left',
          content: function(){
            var current = getDiscount();

            var options = '<div class="input-group" id="discount-popover"><span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span><input id="input-discount" name="discount" class="form-control" value="'+ current +'" type="number" step="any" placeholder = <?php echo e(trans('app.discount'), false); ?>></div>';

            return '<div class="popover-form" id="discount-options-popover">'+
                    options + apply_btn +
                    '</div>';
          }
      });

      $('a.packaging-options').popover({
          html: true,
          placement:'left',
          content: function(){
            var current = getPackagingName();

            var options = '';
            packaging_options.forEach( function (item){
              var preChecked = String(current) == String(item.name) ? 'checked' : '';

              options += '<div class="radio"><label id="'+ item.id +'"><input type="radio" name="packaging_option" id="'+ item.name +'" value="'+ getFormatedValue(item.cost) +'" '+ preChecked +'>'+ item.name +'</label></div>';
            });

            return '<div class="popover-form" id="packaging-options-popover">'+
                    options + apply_btn +
                    '</div>';
          }
      });

      $('a.dynamic-shipping-rates').popover({
          html: true,
          placement:'left',
          content: function(){
            var current = getShippingName();
            var preChecked = String(current) == '<?php echo e(trans('app.custom_shipping'), false); ?>' ? 'checked' : '';
            var custValue = preChecked == 'checked' ? getShipping() : '';

            var custom_shipping = '<div class="radio"><label id=""><input type="radio" name="shipping_option" id="custom_shipping"'+ preChecked +'><?php echo e(trans('app.custom_shipping'), false); ?></label></div>' +
              '<div class="input-group"><span class="input-group-addon"><?php echo e(config('system_settings.currency_symbol') ?: '$', false); ?></span><input id="input-shipping" name="custom_shipping" class="form-control" value="'+ custValue +'" type="number" step="any" placeholder = <?php echo e(trans('app.placeholder.custom_shipping'), false); ?>></div>';

            var filtered = getShippingOptions();

            var options = '';
            filtered.forEach( function (item){
              var preChecked = String(current) == String(item.name) ? 'checked' : '';

              options += '<div class="radio"><label id="'+ item.id +'"><input type="radio" name="shipping_option" id="'+ item.name +'" value="'+ getFormatedValue(item.rate) +'" '+ preChecked +'>'+ item.name +'</label></div>';
            });

            return '<div class="popover-form" id="shipping-options-popover">'+
                    options + custom_shipping + apply_btn +
                    '</div>';
          }
      });

      $('body').on('focus change', 'input#input-shipping', function() {
        $("input:radio#custom_shipping").prop("checked", true).val($(this).val());
      });

      $('body').on('change', '.itemQtt, .itemPrice', function() {
        var itemId = $(this).closest('tr').attr('id');
        calculateItemTotal(itemId);
      });

      $('body').on('click', '.deleteThisRow', function() {
        var itemId = $(this).closest('tr').attr('id');
        deleteThisRow(itemId);
      });

      // Add to Cart
      $('#add-to-cart-btn').click(
          function(){
              var ID = $("#product-to-add").select2('data')[0].id;
              var itemDescription = $("#product-to-add").select2('data')[0].text;

              if (ID == '' || itemDescription == '')
                  return false;
              else
                  $("#empty-cart").hide(); // Hide the empty cart message

              $("#product-to-add").select2("val", ""); // Reset the product search dropdown

              // Check if the product is already on the cart, Is so then just increase the qtt
              if($("tr#"+ID).length){
                  increaseQttByOne(ID);
                  calculateItemTotal(ID);
                  return;
              }

              //Pick the string after the : to get the item description
              itemDescription = itemDescription.substring(itemDescription.indexOf(":") + 2);

              var imgSrc = getFromPHPHelper('get_product_img_src', productObj[ID].id, 'tiny');

              var numOfRows = $("tbody#items tr").length;

              var node = '<tr id="'+ ID +'">' +
                  '<td><img src="' + imgSrc + '" class="img-circle img-md" alt="<?php echo e(trans('app.image'), false); ?>"></td>' +
                  '<td class="nopadding-right" width="55%">' + itemDescription +
                    '<input type="hidden" name="cart['+ numOfRows +'][inventory_id]" value="'+ ID +'"></input>' +
                    '<input type="hidden" name="cart['+ numOfRows +'][item_description]" value="'+ itemDescription +'"></input>' +
                    '<input type="hidden" name="cart['+ numOfRows +'][shipping_weight]" value="'+ productObj[ID].shipping_weight +'" id="weight-'+ ID +'" class="itemWeight"></input>' +
                  '</td>' +
                  '<td class="nopadding-right" width="15%">' +
                    '<input name="cart['+ numOfRows +'][unit_price]" value="' + productObj[ID].salePrice + '" id="price-'+ ID +'" type="number" class="form-control itemPrice no-border" placeholder="<?php echo e(trans('app.price'), false); ?>" required>' +
                  '</div>' +
                  '<td>x</td>' +
                  '<td class="nopadding-right" width="10%">' +
                      '<input name="cart['+ numOfRows +'][quantity]" value="1" type="number" id="qtt-'+ ID +'" class="form-control itemQtt no-border" placeholder="<?php echo e(trans('app.quantity'), false); ?>" required>' +
                  '</td>' +
                  '<td class="nopadding-right text-center" width="10%"><?php echo e(get_formated_currency_symbol(), false); ?>' +
                      '<span id="total-'+ ID +'"  class="itemTotal">' +
                          getFormatedValue(productObj[ID].salePrice) +
                      '</span>' +
                  '</td>' +
                  '<td class="small"><i class="fa fa-trash text-muted deleteThisRow" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('help.romove_this_cart_item'), false); ?>"></i></td>' +
              '</tr>';

              $('tbody#items').append(node);

              calculateOrderTotal();

              return false; //Return false to prevent unspected form submition
          }
      );

      function calculateItemTotal(ID)
      {
        // var itemTotal = getItemTotal(ID);
        var itemWeight = getItemTotalWeight(ID);
        var itemTotal = getFormatedValue(getItemTotal(ID));

        $("#weight-"+ID).val(itemWeight);
        $("#total-"+ID).text(itemTotal);

        calculateOrderTotal();
        return;
      };

      function getShippingOptions()
      {
        var totalPrice  = getOrderTotal();
        var totalWeight  = cartWeight;

        var filtered = shipping_options.filter(function (el) {
          var result =  el.based_on == 'price' &&
                        el.minimum <= totalPrice &&
                        (el.maximum >= totalPrice || !el.maximum);

          if(totalWeight){
            result =  result ||
                      (el.based_on == 'weight' &&
                      el.minimum <= totalWeight &&
                      el.maximum >= totalWeight);
          }

          return result;
        });

        return filtered;
      }

      /**
       * This function will need in front end
       */

      function calculateOrderTotal()
      {
        cartWeight = 0;
        var sum = 0;
        $(".itemTotal").each(
            function(){
              sum += ($(this).text()) * 1;
            }
        );
        $("#summary-total").text(getFormatedValue(sum));

        $(".itemWeight").each(function()
            {
              cartWeight += ($(this).val()) * 1;
            }
        );

        if(!cartWeight){
          $("#global-alert-msg").html('<?php echo e(trans('messages.notice.cant_cal_weight_shipping_rate'), false); ?>');
          $("#global-alert-box").removeClass('hidden');
        }

        var options = getShippingOptions();
        if(options[0])
          setShippingCost(options[0].name, options[0].rate, options[0].id);
        else
          setShippingCost('');

        return;
      };

      function setDiscount(value = 0)
      {
        $('#summary-discount').text(getFormatedValue(value));
        $('#cart-discount').val(value);
        calculateTax();
        return;
      }

      function setShippingCost(name = '', value = 0, id = '')
      {
        value = value ? value : 0;
        $('#summary-shipping').text(getFormatedValue(value));
        $("#summary-shipping-name").text(name);
        $('#cart-shipping').val(value);
        $('#shipping_rate_id').val(id);
        calculateTax();
        return;
      }

      function setPackagingCost(name, value = 0, id = '')
      {
        value = value ? value : 0;
        $('#summary-packaging').text(getFormatedValue(value));
        $("#summary-packaging-name").text(name);
        $('#cart-packaging').val(value);
        $('#packaging_id').val(id);
        calculateTax();
        return;
      }

      function setTax(ID = NULL)
      {
          if(!ID){
              $("#summary-taxrate").text(0);
              calculateTax();
              return;
          }

          $.ajax({
            data: "ID="+ID,
            url: "<?php echo e(route('ajax.getTaxRate'), false); ?>",
            success: function(result){
                $("#summary-taxrate").text(result);
                $("#cart-taxrate").val(result);
                calculateTax();
            }
          });
        return;
      }

      function calculateTax()
      {
        var total = getTotalAmount();
        var taxrate = getTaxrate();

        var tax = (total * taxrate)/100;
        $("#summary-tax").text(getFormatedValue(tax));
        $("#cart-taxes").val(tax);

        calculateOrderSummary();
        return;
      };

      function calculateOrderSummary()
      {
        var grand = getTotalAmount() + getTax();
        $("#summary-grand-total").text(getFormatedValue(grand));
        return;
      }

      function getOrderTotal()
      {
          return Number($("#summary-total").text());
      };

      function getDiscount()
      {
        return Number($("#summary-discount").text());
      }

      function getTaxrate()
      {
        return Number($("#summary-taxrate").text());
      };

      function getTax()
      {
        return Number($("#summary-tax").text());
      };

      function getShipping()
      {
        return Number($("#summary-shipping").text());
      };

      function getShippingName()
      {
        return $("#summary-shipping-name").text().trim();
      };

      function getHandling()
      {
        return Number($("#summary-handling").text());
      };

      function getPackagingName()
      {
        return $("#summary-packaging-name").text().trim();
      };

      function getPackaging()
      {
        return Number($("#summary-packaging").text());
      };

      function getItemQtt(ID)
      {
        return $("#qtt-"+ID).val();
      };

      function getItemPrice(ID)
      {
        return $("#price-"+ID).val();
      };

      function getItemTotalWeight(ID)
      {
        return Number(getItemQtt(ID)) * Number(productObj[ID].shipping_weight);
      }

      function getItemTotal(ID)
      {
        return Number(getItemQtt(ID)) * Number(getItemPrice(ID));
      };

      function getFormatedValue(value = 0)
      {
        value = value ? value : 0;
        return parseFloat(value).toFixed(2);
      }

      function getTotalAmount()
      {
        var total = getOrderTotal();
        if(!total)
          return total;

        var packaging = getPackaging();
        var handling  = getHandling();
        var shipping  = getShipping();
        var discount  = getDiscount();

        return (total + shipping + handling + packaging) - discount;
      }

      // Remove table rows
      function deleteThisRow(ID)
      {
        $("tr#"+ID).remove();
        if($("tbody#items tr").length <= 1)
          $("#empty-cart").show(); // Show the empty cart message

        calculateOrderTotal();
        return;
      };

      function increaseQttByOne(ID)
      {
        var qtt = $("#qtt-"+ID).val();
        $("#qtt-"+ID).val(++qtt);
        return true;
      };

      // Save the cart action
      $('body').on('click', '#saveTheCart', function(e) {
        var cart = $("input#cart_id").val();
        var order = <?=isset($order_cart) ? 1 : 'NaN'?>;

        if (order){
          var method = '<input name="_method" type="hidden" value="PUT">';
          var url = "<?php echo e(url('admin/order/order/'), false); ?>/"+ cart;
          $("form#form").append(method);
        }
        else if (cart){
          var method = '<input name="_method" type="hidden" value="PUT">';
          var url = "<?php echo e(url('admin/order/cart/'), false); ?>/"+ cart;
          $("form#form").append(method);
        }
        else{
          var url = "<?php echo e(url('admin/order/cart'), false); ?>";
        }

        $("form#form").attr('action', url);
        $("form#form").submit();
      });

      // Toggle billing address
      $('input#same_as_shipping_address').on('ifChecked', function () {
        $('#billing-address-block').hide()
      });

      $('input#same_as_shipping_address').on('ifUnchecked', function () {
        $('#billing-address-block').show();
      });
    }(window.jQuery, window, document));
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/order/create.blade.php ENDPATH**/ ?>