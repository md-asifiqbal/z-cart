<div class="modal fade" id="shopReviewsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content flat">
            <div class="modal-body nopadding">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9; color: #eee;">&times;</button>
                <div class="box-widget widget-shop">
                    <div class="widget-shop-header"  style="background-image:url( <?php echo e(get_cover_img_src($shop, 'shop'), false); ?> );">
                        <h2 class="widget-shop-name">
                            <?php echo $shop->getQualifiedName(); ?>

                        </h2>
                        <p class="member-since small">
                            <?php echo e(trans('theme.member_since'), false); ?>: <?php echo e($shop->created_at->diffForHumans(), false); ?>

                        </p>
                    </div> <!-- /.widget-shop-header -->

                    <div class="widget-shop-image">
                        <img src="<?php echo e(get_storage_file_url(optional($shop->logo)->path, 'small'), false); ?>" class="img-circle" alt="<?php echo e(trans('theme.logo'), false); ?>">
                    </div>

                    <div class="row">
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header"><?php echo e($shop->inventories_count, false); ?></h5>
                            <span class="description-text"><?php echo e(trans('theme.active_listings'), false); ?></span>
                          </div>
                        </div>

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">&nbsp;</h5>
                            <span class="description-text small">
                                <?php echo $__env->make('layouts.ratings', ['ratings' => $shop->feedbacks->avg('rating'), 'count' => $shop->feedbacks->count()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="description-block">
                            <h5 class="description-header"><?php echo e(\App\Helpers\Statistics::sold_items_count($shop->id), false); ?></h5>
                            <span class="description-text"><?php echo e(trans('theme.items_sold'), false); ?></span>
                          </div>
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.widget-shop -->

                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#description_tab" data-toggle="tab">
                        <?php echo e(trans('theme.description'), false); ?>

                      </a></li>
                      <?php if($shop->config->return_refund): ?>
                      <li><a href="#refund_policy_tab" data-toggle="tab">
                        <?php echo e(trans('theme.return_and_refund_policy'), false); ?>

                      </a></li>
                      <?php endif; ?>
                      <li><a href="#shop_reviews_tab" data-toggle="tab">
                        <?php echo e(trans('theme.latest_reviews'), false); ?>

                      </a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="description_tab">
                            <?php echo $shop->description; ?>

                        </div> <!-- /.tab-pane -->

                        <div class="tab-pane" id="refund_policy_tab">
                            <?php echo $shop->config->return_refund; ?>

                        </div> <!-- /.tab-pane -->

                        <div class="tab-pane" id="shop_reviews_tab">
                            <?php $__empty_1 = true; $__currentLoopData = $shop->feedbacks->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <p>
                                    <b><?php echo e($feedback->customer->nice_name ?? $feedback->customer->name, false); ?></b>

                                    <span class="pull-right small">
                                        <b class="text-success"><?php echo app('translator')->getFromJson('theme.verified_purchase'); ?></b>
                                        <span class="text-muted"> | <?php echo e($feedback->created_at->diffForHumans(), false); ?></span>
                                    </span>
                                </p>

                                <p><?php echo e($feedback->comment, false); ?></p>

                                <?php echo $__env->make('layouts.ratings', ['ratings' => $feedback->rating], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php if (! ($loop->last)): ?>
                                    <div class="sep"></div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="space20"></div>
                                <p class="lead text-center text-muted"><?php echo app('translator')->getFromJson('theme.no_reviews'); ?></p>
                            <?php endif; ?>
                        </div> <!-- /.tab-pane -->
                    </div> <!-- /.tab-content -->
                </div> <!-- /.nav-tabs-custom -->
            </div><!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog modal-lg -->
</div><!-- /#shopReviewsModal --><?php /**PATH /home/amraibes/public_html/public/themes/default/views/modals/shopReviews.blade.php ENDPATH**/ ?>