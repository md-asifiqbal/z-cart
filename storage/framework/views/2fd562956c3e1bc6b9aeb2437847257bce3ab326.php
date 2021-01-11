<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content flat">
        <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
        <div class="row sc-product-item">
            <div class="col-md-5 col-sm-6">
                <?php echo $__env->make('layouts.jqzoom', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-7 col-sm-6">
                <div class="product-single">
                    <?php echo $__env->make('layouts.product_info', ['zoomID' => 'quickViewZoom', 'item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="sep"></div>

                    <div class="row product-attribute">
                        <div class="col-xs-12">
                            <?php if($item->key_features): ?>
                                <div class="section-title space10">
                                  <?php echo trans('theme.section_headings.key_features'); ?>

                                </div>
                                <ul class="key_feature_list">
                                    <?php $__currentLoopData = unserialize($item->key_features); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo $key_feature; ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>

                            <div class="clearfix space10"></div>

                            <a href="<?php echo e(route('show.product', $item->slug), false); ?>" class="btn btn-default flat space10">
                                <?php echo app('translator')->getFromJson('theme.button.view_product_details'); ?>
                            </a>
                        </div><!-- /.col-sm-9 .col-xs-6 -->
                    </div><!-- /.row -->

                    <div class="sep"></div>

                    <a href="javascript:void(0);" data-link="<?php echo e(route('cart.addItem', $item->slug), false); ?>" class="btn btn-primary flat sc-add-to-cart" data-dismiss="modal">
                        <i class="fa fa-shopping-bag"></i> <?php echo app('translator')->getFromJson('theme.button.add_to_cart'); ?>
                    </a>

                    <a href="<?php echo e(route('direct.checkout', $item->slug), false); ?>" class="btn btn-warning flat" id="buy-now-btn"><i class="fa fa-rocket"></i>
                        <?php echo app('translator')->getFromJson('theme.button.buy_now'); ?>
                    </a>

                    <?php if($item->product->inventories_count > 1): ?>
                        <a href="<?php echo e(route('show.offers', $item->product->slug), false); ?>" class="btn btn-sm btn-link">
                            <?php echo app('translator')->getFromJson('theme.view_more_offers', ['count' => $item->product->inventories_count]); ?>
                        </a>
                    <?php endif; ?>
                </div><!-- /.product-single -->

                <div class="space50"></div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/amraibes/public_html/public/themes/default/views/modals/quickview.blade.php ENDPATH**/ ?>