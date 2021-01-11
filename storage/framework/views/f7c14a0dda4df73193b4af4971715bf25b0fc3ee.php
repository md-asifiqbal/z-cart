<div class="row">
  <div class="col-xs-12">
    <div class="my-info-container">
        <div class="my-info-box">
            <div class="me-info-block">
                <div class="my-photo-block">
                    <img src="<?php echo e(get_storage_file_url(optional($dashboard->image)->path, 'thumbnail'), false); ?>" class="center-block" alt="<?php echo e(trans('theme.avatar'), false); ?>"/>
                </div>
                <div class="my-info">
                    <div class="name">
                        <span>
                            <?php echo e($dashboard->getName(), false); ?>

                        </span>
                        <a href="<?php echo e(route('account', 'account'), false); ?>" class="small indent10"><i class="fa fa-edit" data-toggle="tooltip" data-title="<?php echo e(trans('theme.edit_account'), false); ?>"></i></a>
                    </div>
                    <div class="messages">
                        <span>
                          <i class="fa fa-clock-o"></i>
                          <?php echo e(trans('theme.member_since'), false); ?>: <em><?php echo e($dashboard->created_at->diffForHumans(), false); ?></em>
                        </span>
                    </div>
                </div>

                <div class="pull-right">
                    <a href="<?php echo e(url('/'), false); ?>" class="btn btn-primary flat">
                      <i class="fa fa-shopping-cart"></i> <?php echo app('translator')->getFromJson('theme.button.continue_shopping'); ?>
                    </a>

                    <?php if (! ($dashboard->shippingAddress)): ?>
                      <a href="<?php echo e(route('account', 'account'), false); ?>#address-tab" class="btn btn-default flat">
                        <i class="fa fa-truck"></i> <?php echo app('translator')->getFromJson('theme.add_shipping_address'); ?>
                      </a>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- .my-info-box -->

        <div class="my-info-details">
            <ul>
                <li>
                    <a href="<?php echo e(route('account', 'orders'), false); ?>">
                        <span class="v"><?php echo e($dashboard->orders_count, false); ?></span>
                        <span class="d"><i class="fa fa-shopping-cart"></i> <?php echo app('translator')->getFromJson('theme.orders'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('account', 'wishlist'), false); ?>">
                        <span class="v"><?php echo e($dashboard->wishlists_count, false); ?></span>
                        <span class="d"><i class="fa fa-heart"></i> <?php echo app('translator')->getFromJson('theme.wishlist'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('account', 'messages'), false); ?>">
                        <span class="v"><?php echo e($dashboard->messages_count, false); ?></span>
                        <span class="d"><i class="fa fa-envelope"></i> <?php echo app('translator')->getFromJson('theme.unread_messages'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('account', 'coupons'), false); ?>">
                        <span class="v"><?php echo e($dashboard->coupons_count, false); ?></span>
                        <span class="d"><i class="fa fa-tags"></i> <?php echo app('translator')->getFromJson('theme.coupons'); ?></span>
                    </a>
                </li>
                <li class="last">
                    <a href="<?php echo e(route('account', 'disputes'), false); ?>">
                        <span class="v"><?php echo e($dashboard->disputes_count, false); ?></span>
                        <span class="d"><i class="fa fa-envelope"></i> <?php echo app('translator')->getFromJson('theme.disputes'); ?></span>
                    </a>
                </li>
            </ul>
        </div><!-- .my-info-details -->
    </div><!-- .my-info-container -->
  </div><!-- .col-sm-12 -->
</div><!-- .row -->

<div class="row">
  <div class="col-md-6 nopadding-right">
    <table class="table table-bordered">
      <thead>
        <tr class="text-muted">
          <th><?php echo e(trans('theme.date'), false); ?></th>
          <th>
            <?php echo e(trans('theme.orders'), false); ?>

            <i class="fa fa-question-circle pull-right" data-toggle="tooltip" data-title="<?php echo e(trans('theme.item_count'), false); ?>"></i>
          </th>
          <th><?php echo e(trans('theme.amount'), false); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $dashboard->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo $order->created_at->format('M j'); ?></td>
            <td>
              <img src="<?php echo e(get_storage_file_url(optional($order->shop->image)->path, 'tiny_thumb'), false); ?>" class="img-circle" alt="<?php echo e($order->shop->name, false); ?>" data-toggle="tooltip" data-title="<?php echo e($order->shop->name, false); ?>">
              <a href="<?php echo e(route('order.detail', $order), false); ?>">
                <?php echo $order->order_number; ?>

              </a>
              <small class="indent10"><?php echo $order->orderStatus(); ?></small>
              <span class="label label-outline pull-right"> <?php echo e($order->item_count, false); ?> </span>
            </td>
            <td><?php echo get_formated_price($order->grand_total, 2); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div><!-- .col-sm-6 -->
  <div class="col-md-6 nopadding-left">
    <table class="table table-bordered">
      <thead>
        <tr class="text-muted">
          <th><?php echo e(trans('theme.wishlist'), false); ?></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $dashboard->wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($wish->inventory): ?>
            <tr>
              <td>
                <img class="" src="<?php echo e(get_product_img_src($wish->inventory, 'tiny'), false); ?>" alt="<?php echo $wish->inventory->title; ?>" title="<?php echo $wish->inventory->title; ?>" />

                <a class="product-link" href="<?php echo e(route('show.product', $wish->inventory->slug), false); ?>"><?php echo str_limit($wish->inventory->title, 35); ?></a>
              </td>
              <td>
                  <a class="btn btn-primary btn-xs flat" href="<?php echo e(route('direct.checkout', $wish->inventory->slug), false); ?>">
                      <i class="fa fa-rocket"></i> <?php echo app('translator')->getFromJson('theme.button.buy_now'); ?>
                  </a>
              </td>
            </tr>

          <?php elseif($wish->product): ?>

            <tr>
              <td>
                <img src="<?php echo e(get_storage_file_url(optional($wish->product->featuredImage)->path, 'tiny'), false); ?>" alt="<?php echo $wish->product->name; ?>" title="<?php echo $wish->product->name; ?>"/>

                <a class="product-link" href="<?php echo e(route('show.offers', $wish->product->slug), false); ?>" class="btn btn-sm btn-link"><?php echo str_limit($wish->product->name, 35); ?></a>
              </td>
              <td>
                  <a class="btn btn-primary btn-xs flat" href="<?php echo e(route('show.offers', $wish->product->slug), false); ?>">
                      <?php echo app('translator')->getFromJson('theme.view_more_offers', ['count' => $wish->product->inventories_count]); ?>
                  </a>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div><!-- .col-sm-6 -->
</div><!-- .row -->

<div class="clearfix space50"></div>
<?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/dashboard.blade.php ENDPATH**/ ?>