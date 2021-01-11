<div class="container">
    <div class="offered-product-widget space30">
        <span class="offered-product-widget-img">
            <img src="<?php echo e(get_storage_file_url(optional($product->featuredImage)->path, 'medium'), false); ?>" alt="<?php echo $product->name; ?>" title="<?php echo $product->name; ?>"/>
        </span>

        <div class="offered-product-widget-content">
            <h2><?php echo $product->name; ?></h2>
            <span class="offered-product-widget-text text-muted space20">
                <?php if($product->manufacturer->slug): ?>
                    <?php echo e(trans('theme.by') . ' ', false); ?>

                    <a href="<?php echo e(route('show.brand', $product->manufacturer->slug), false); ?>" class="product-info-seller-name"><?php echo $product->manufacturer->name; ?></a>
                <?php endif; ?>
            </span>
            <span class="offered-product-widget-text">
                <span class="text-muted"><?php echo e($product->gtin_type, false); ?>:</span> <?php echo e($product->gtin, false); ?>

            </span>
        </div>
    </div>
</div>

<div class="container">
    <table class="table" id="buyer-payment-detail-table">
        <thead>
            <tr>
                <th width="12%"><?php echo app('translator')->getFromJson('theme.price'); ?></th>
                <th width="23%"><?php echo app('translator')->getFromJson('theme.condition'); ?></th>
                <th><?php echo app('translator')->getFromJson('theme.attributes'); ?></th>
                <th><?php echo app('translator')->getFromJson('theme.seller'); ?></th>
                <th width="15%"><?php echo app('translator')->getFromJson('theme.options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $product->inventories->sortBy(function($item){
                return $item->currnt_sale_price();
            }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="sc-product-item">
                    <td class="vertical-center text-center">
                        <?php echo $__env->make('layouts.pricing', ['item' => $offer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                    <td class="vertical-center">
                        <strong><?php echo e($offer->condition, false); ?></strong>
                        <p class="small">
                            <?php echo e($offer->condition_note, false); ?>

                        </p>
                    </td>
                    <td>
                        <a href="<?php echo e(route('show.product', $offer->slug), false); ?>" class="product-info-title"><?php echo e($offer->title, false); ?></a>
                        <span class="small">
                            <?php echo $__env->make('layouts.ratings', ['ratings' => $offer->feedbacks->avg('rating'), 'count' => $offer->feedbacks->count()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>
                        <ul class="list-inline">
                            <?php $__currentLoopData = $offer->attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="small">
                                    <span class="text-muted small"><?php echo e($attributeValue->attribute->name, false); ?>: </span>
                                    <?php echo e($attributeValue->value, false); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                    <td class="seller-info">
                        <div class="space10">
                            <img src="<?php echo e(get_storage_file_url(optional($offer->shop->image)->path, 'thumbnail'), false); ?>" class="seller-info-logo img-sm img-circle" alt="<?php echo e(trans('theme.logo'), false); ?>">

                            <a href="<?php echo e(route('show.store', $offer->shop->slug), false); ?>" class="seller-info-name">
                                <?php echo $offer->shop->getQualifiedName(); ?>

                            </a>
                        </div>
                        <span class="small">
                            <?php echo $__env->make('layouts.ratings', ['ratings' => $offer->shop->feedbacks->avg('rating'), 'count' => $offer->shop->feedbacks->count()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-default flat btn-block btn-sm itemQuickView" href="<?php echo e(route('quickView.product', $offer->slug), false); ?>">
                            <i class="fa fa-external-link" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('theme.button.quick_view'); ?>"></i> <span><?php echo app('translator')->getFromJson('theme.button.quick_view'); ?></span>
                        </a>

                        <a class="btn btn-primary flat btn-block sc-add-to-cart" data-link="<?php echo e(route('cart.addItem', $offer->slug), false); ?>">
                            <i class="fa fa-shopping-cart"></i> <?php echo app('translator')->getFromJson('theme.button.add_to_cart'); ?>
                        </a>

                        <a href="<?php echo e(route('direct.checkout', $offer->slug), false); ?>" class="btn btn-block btn-warning flat">
                            <i class="fa fa-rocket"></i> <?php echo app('translator')->getFromJson('theme.button.buy_now'); ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<div class="clearfix space20"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/offer_page.blade.php ENDPATH**/ ?>