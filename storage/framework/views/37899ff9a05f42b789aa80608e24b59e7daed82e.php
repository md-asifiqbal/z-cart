<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $product)): ?>
        <?php echo $__env->make('admin.partials._product_widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?php echo e(trans('app.add_inventory'), false); ?>

            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div> <!-- /.box-header -->
        <div class="box-body">
            <?php echo Form::open(['route' => 'admin.stock.inventory.storeWithVariant', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>


                <?php echo $__env->make('admin.inventory._formWithVariant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-lg btn-new pull-right']); ?>

            <?php echo Form::close(); ?>

        </div> <!-- /.box-body -->
    </div> <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <?php echo $__env->make('plugins.dynamic-inputs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script language="javascript" type="text/javascript">
      ;(function($, window, document) {

        // Dynamically set get the value from row 1 and set to other rows
        $("#variantsTable > tbody tr:first input.sku").change(function(){
            var value = $(this).val();
            $('input.sku').each(function(){
                if($(this).val() == '') $(this).val(value);
            })
        });

        $("#variantsTable > tbody tr:first select.condition").change(function(){
            var value = $(this).val();
            console.log(value);
            $('select.condition').each(function(){
                $(this).val(value);
            })
        });

        $("#variantsTable > tbody tr:first input.quantity").change(function(){
            var value = $(this).val();
            $('input.quantity').each(function(){
                if($(this).val() == '') $(this).val(value);
            })
        });

        $("#variantsTable > tbody tr:first input.purchasePrice").change(function(){
            var value = $(this).val();
            $('input.purchasePrice').each(function(){
                if($(this).val() == '') $(this).val(value);
            })
        });

        $("#variantsTable > tbody tr:first input.salePrice").change(function(){
            var value = $(this).val();
            $('input.salePrice').each(function(){
                if($(this).val() == '') $(this).val(value);
            })
        });

        $("#variantsTable > tbody tr:first input.offerPrice").change(function(){
            var value = $(this).val();
            $('input.offerPrice').each(function(){
                if($(this).val() == '') $(this).val(value);
            })
        });

        // Remove table rows
        $(".deleteThisRow").click(function(event) {
            $($(this).closest("tr")).remove();
            return false;
        });

        // Display Offer dates
        $('input.offerPrice').each(function(){
            if($(this).val() != '') {
                $("#offerDates").show();
                $('#offer_start').attr('required', 'required');
                $('#offer_end').attr('required', 'required');
                return false;
            }
        });
        $(".offerPrice,.deleteThisRow").keyup(checkOfferPrice);
        $(".deleteThisRow").click(checkOfferPrice);

        function checkOfferPrice() {
            $('input[name^="offer_price"]').each(function() {
                if($(this).val()){
                    $("#offerDates").show();
                    $('#offer_start').attr('required', 'required');
                    $('#offer_end').attr('required', 'required');
                    return false;
                }
                $('#offer_start').removeAttr('required');
                $('#offer_end').removeAttr('required');
                $("#offerDates").hide();
            });
        }

        // Appy styleing for images upload button
        $("input:file").change(function (){

            if ($(this).val()) {
                // $(this).parent().append("<img src="+$(this).val()+" />");
                $(this).parent().css('background', '#dcdcdc');
            }else{
                $(this).parent().css('background', '#fff');
            }
        });
      }(window.jQuery, window, document));
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/inventory/createWithVariant.blade.php ENDPATH**/ ?>