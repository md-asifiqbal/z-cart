<!-- CONTENT SECTION -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-4 bg-light">
        <p class="section-title lead space20"><?php echo trans('theme.section_headings.how_to_open_a_dispute'); ?></p>
        <dl>
          <dt><?php echo trans('theme.help.first_step'); ?>:</dt>
          <dd><?php echo trans('theme.help.how_to_open_a_dispute_first_step'); ?></dd>
          <br/>
          <dt><?php echo trans('theme.help.second_step'); ?>:</dt>
          <dd><?php echo trans('theme.help.how_to_open_a_dispute_second_step'); ?></dd>
          <br/>
          <dt><?php echo trans('theme.help.third_step'); ?>:</dt>
          <dd><?php echo trans('theme.help.how_to_open_a_dispute_third_step'); ?></dd>
        </dl>
      </div><!-- /.col-md-4 .bg-light -->

      <div class="col-md-8">
        <?php
          $progress = $order->dispute ? $order->dispute->progress() : 0;
        ?>
        <div class="step-wizard-wrapper">
          <div class="step-wizard">
              <div class="progress">
                <div class="progressbar empty"></div>
                <div id="prog" class="progressbar" style=""></div>
                <div id="prog" class="progressbar" style="width: <?php echo e($progress, false); ?>%;"></div>
              </div>
              <ul>
                <li class="<?php echo e($progress > 33 ? 'done' : 'active', false); ?>">
                  <a id="step1">
                    <span class="step">1</span>
                    <span class="title"><?php echo trans('theme.open_a_dispute'); ?></span>
                  </a>
                </li>
                <li class="
                  <?php if($progress > 66): ?>
                    done
                  <?php elseif($progress > 33): ?>
                    active
                  <?php endif; ?>
                ">
                  <a id="step2">
                    <span class="step">2</span>
                    <span class="title"><?php echo trans('theme.seller_helps_you'); ?></span>
                  </a>
                </li>
                <li class="
                  <?php if($progress == 100): ?>
                    done
                  <?php elseif($progress > 66): ?>
                    active
                  <?php endif; ?>
                ">
                  <a id="step3">
                      <span class="step">3</span>
                      <span class="title"><?php echo trans('theme.marketplace_steps_in', ['marketplace' => get_platform_title()]); ?><br/>
                          <i class="small hidden-xs"><?php echo trans('theme.help.when_marketplace_steps_in'); ?></i>
                      </span>
                  </a>
                </li>
                <li class="<?php echo e($progress == 100 ? 'done' : '', false); ?>">
                  <a id="step4">
                    <span class="step">4</span>
                    <span class="title"><?php echo trans('theme.dispute_finished'); ?></span>
                  </a>
                </li>
              </ul>
          </div>
        </div><!-- /.step-wizard-wrapper -->

        <div class="space20"></div>

        <?php if($order->dispute): ?>
          <table class="table" id="buyer-order-table">
              <thead>
                  <tr><th colspan="3"><?php echo trans('theme.dispute_detail'); ?></th></tr>
              </thead>
              <tbody>
                  <tr class="order-info-head">
                      <td width="50%">
                        <h5>
                          <span><?php echo trans('theme.store'); ?>:</span>
                          <?php if($order->shop->slug): ?>
                            <a href="<?php echo e(route('show.store', $order->shop->slug), false); ?>"> <?php echo e($order->shop->name, false); ?></a>
                          <?php else: ?>
                            <?php echo trans('theme.seller'); ?>

                          <?php endif; ?>
                        </h5>
                        <h5>
                            <span><?php echo trans('theme.status'); ?></span>
                            <?php echo $order->dispute->statusName(); ?>

                        </h5>
                      </td>
                      <td width="25%" class="order-amount">
                        <h5>
                          <span><?php echo trans('theme.refund_amount'); ?>: </span>
                          <?php echo e(get_formated_currency($order->dispute->refund_amount, true, 2), false); ?>

                        </h5>
                        <h5>
                          <span><?php echo trans('theme.return_goods'); ?>:</span>
                          <?php echo e($order->dispute->return_goods == 1 ? trans('theme.yes') : trans('theme.no'), false); ?>

                        </h5>
                      </td>
                      <td width="25%" class="store-info">
                        <h5>
                          <span><?php echo trans('theme.order_id'); ?>: </span>
                          <a href="<?php echo e(route('order.detail', $order), false); ?>"><?php echo e($order->order_number, false); ?></a>
                        </h5>
                        <h5>
                          <span><?php echo trans('theme.order_received'); ?>:</span>
                          <?php echo e($order->dispute->order_received == 1 ? trans('theme.yes') : trans('theme.no'), false); ?>

                        </h5>
                      </td>
                  </tr> <!-- /.order-info-head -->
                  <tr class="order-body">
                    <td colspan="3">
                      <p class="lead">
                        <span><?php echo trans('theme.reason'); ?>:
                        </span><?php echo e($order->dispute->dispute_type->detail, false); ?>

                      </p>

                      <?php if($order->dispute->description): ?>
                        <div>
                          <?php echo $order->dispute->description; ?>

                          <?php if(count($order->dispute->attachments)): ?>
                            <small class="pull-right">
                              <?php echo e(trans('app.attachments') . ': ', false); ?>

                              <?php $__currentLoopData = $order->dispute->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('attachment.download', $attachment->path), false); ?>"><i class="fa fa-file"></i></a>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </small>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>

                      <div class="space50"></div>

                      <?php if($order->dispute->replies->count() > 0): ?>
                        <?php $__currentLoopData = $order->dispute->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="row">
                            <div class="col-md-2 nopadding-right no-print">
                              <?php if($reply->user_id): ?>
                                <?php if($reply->user->image): ?>
                                  <img src="<?php echo e(get_storage_file_url(optional($reply->user->image)->path, 'thumbnail'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
                                <?php else: ?>
                                  <img src="<?php echo e(get_gravatar_url($reply->user->email, 'thumbnail'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
                                <?php endif; ?>

                                <?php echo e($reply->user->getName(), false); ?>

                              <?php endif; ?>
                            </div>

                            <div class="col-md-8 nopadding">
                              <blockquote style="font-size: 1em;" class="<?php echo e($reply->customer_id ? 'blockquote-reverse' : '', false); ?>">
                                <?php echo $reply->reply; ?>


                                <?php if(count($reply->attachments)): ?>
                                  <small class="no-print">
                                    <?php echo e(trans('app.attachments') . ': ', false); ?>

                                    <?php $__currentLoopData = $reply->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <a href="<?php echo e(route('attachment.download', $attachment), false); ?>"><i class="fa fa-file"></i></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </small>
                                <?php endif; ?>

                                <footer><?php echo e($reply->updated_at->diffForHumans(), false); ?></footer>
                              </blockquote>
                            </div>

                            <div class="col-md-2 nopadding-left no-print">
                              <?php if($reply->customer_id): ?>
                                <?php if($reply->customer->image): ?>
                                  <img src="<?php echo e(get_storage_file_url(optional($reply->customer->image)->path, 'thumbnail'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
                                <?php else: ?>
                                  <img src="<?php echo e(get_gravatar_url($reply->customer->email, 'thumbnail'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.avatar'), false); ?>">
                                <?php endif; ?>

                                <?php echo e($reply->customer->getName(), false); ?>

                              <?php endif; ?>
                            </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>

                      <div class="space20"></div>

                      <div class="text-center space20">
                        <?php if($order->dispute->isClosed()): ?>
                          <a class="btn btn-danger flat" href="#" data-toggle="modal" data-target="#disputeAppealModal"><?php echo trans('theme.button.appeal'); ?></a>
                        <?php else: ?>
                          <a class="btn btn-info flat" href="#" data-toggle="modal" data-target="#disputeResponseModal"><?php echo trans('theme.button.response'); ?></a>

                          <?php echo Form::open(['route' => ['dispute.markAsSolved', $order->dispute], 'class' => 'form-btn']); ?>

                              <?php echo Form::button(trans('theme.mark_as_solved'), ['type' => 'submit', 'class' => 'confirm btn btn-primary flat']); ?>

                          <?php echo Form::close(); ?>

                        <?php endif; ?>
                      </div>
                    </td>
                  </tr> <!-- /.order-body -->
              </tbody>
          </table>
        <?php else: ?>
          <p class="text-center">
              <a href="<?php echo e(route('order.detail', $order) . '#message-section', false); ?>" class="btn btn-primary flat"><?php echo trans('theme.button.contact_seller'); ?></a>

              <?php if (! ($order->dispute)): ?>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#disputeOpenModal" class="btn btn-black flat"><?php echo trans('theme.button.open_dispute'); ?></a>
              <?php endif; ?>
          </p>
          <div class="sep"></div>
          <p class="text-muted">
              <h5><?php echo trans('theme.button.refund_request'); ?>:</h5>
              <span><?php echo trans('theme.help.reason_to_refund_request'); ?></span>
          </p>
          <p class="text-muted">
              <h5><?php echo trans('theme.button.return_goods'); ?>:</h5>
              <span><?php echo trans('theme.help.reason_to_return_goods'); ?></span>
          </p>
        <?php endif; ?>
      </div><!-- /.col-md-8 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>
<div class="clearfix space50"></div>
<!-- END CONTENT SECTION -->

<div class="space20"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/dispute_page.blade.php ENDPATH**/ ?>