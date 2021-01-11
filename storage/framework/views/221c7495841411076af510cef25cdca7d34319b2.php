<?php $__env->startSection('page-style'); ?>
  <?php echo $__env->make('plugins.ionic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <!-- Info boxes -->
  <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="icon ion-md-people"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.customers'), false); ?></span>
              <span class="info-box-number">
                  <?php echo e($customer_count, false); ?>

                  <a href="<?php echo e(route('admin.admin.customer.index'), false); ?>" class="pull-right small" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.detail'), false); ?>" >
                    <i class="icon ion-md-send"></i>
                  </a>
              </span>
              <div class="progress" style="background: transparent;"></div>
              <span class="progress-description text-muted">
                  <i class="icon ion-md-add"></i>
                  <?php echo e(trans('app.new_in_30_days', ['new' => $new_customer_last_30_days, 'model' => trans('app.customers')]), false); ?>

              </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div> <!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="icon ion-md-contacts"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo e(trans('app.merchants'), false); ?></span>
                <span class="info-box-number">
                    <?php echo e($merchant_count, false); ?>

                    <a href="<?php echo e(route('admin.vendor.merchant.index'), false); ?>" class="pull-right small" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.detail'), false); ?>" >
                      <i class="icon ion-md-send"></i>
                    </a>
                </span>
                <div class="progress" style="background: transparent;"></div>
                <span class="progress-description text-muted">
                  <i class="icon ion-md-add"></i>
                  <?php echo e(trans('app.new_in_30_days', ['new' => $new_merchant_last_30_days, 'model' => trans('app.merchants')]), false); ?>

                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div> <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-green">
            <i class="icon ion-md-cart"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.todays_sale'), false); ?></span>
              <span class="info-box-number">
                <?php echo e(get_formated_currency($todays_sale_amount), false); ?>

                <a href="<?php echo e(route('admin.kpi'), false); ?>" class="pull-right small" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.detail'), false); ?>" >
                  <i class="icon ion-md-send"></i>
                </a>
              </span>

              <?php
                $difference = $todays_sale_amount - $yesterdays_sale_amount;
                $todays_sale_percents = $todays_sale_amount == 0 ? 0 : round(($difference / $todays_sale_amount) * 100);
              ?>
              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: <?php echo e($todays_sale_percents, false); ?>%"></div>
              </div>
              <span class="progress-description text-muted">
                <?php if($todays_sale_amount == 0): ?>
                  <i class="icon ion-md-hourglass"></i>
                  <?php echo e(trans('messages.no_sale', ['date' => trans('app.today')]), false); ?>

                <?php else: ?>
                  <i class="icon ion-md-arrow-<?php echo e($difference < 0 ? 'down' : 'up', false); ?>"></i>
                  <?php echo e(trans('messages.todays_sale_percents', ['percent' => $todays_sale_percents, 'state' => $difference < 0 ? trans('app.down') : trans('app.up')]), false); ?>

                <?php endif; ?>
              </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-red">
            <i class="icon ion-md-heart"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.visitors_today'), false); ?></span>
              <span class="info-box-number">
                <?php echo e($todays_visitor_count, false); ?>

                <a href="<?php echo e(route('admin.report.visitors'), false); ?>" class="pull-right small" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.detail'), false); ?>" >
                  <i class="icon ion-md-send"></i>
                </a>
              </span>

              <?php
                $last_months = $last_60days_visitor_count - $last_30days_visitor_count;
                $difference = $last_30days_visitor_count - $last_months;
                $last_30_days_percents = $last_months == 0 ? 100 : round(($difference / $last_months) * 100);
              ?>
              <div class="progress">
                <div class="progress-bar progress-bar-info" style="width: <?php echo e($last_30_days_percents, false); ?>%"></div>
              </div>
              <span class="progress-description text-muted">
                <i class="icon ion-md-arrow-<?php echo e($difference > 0 ? 'up' : 'down', false); ?>"></i>
                <?php echo e(trans('messages.last_30_days_percents', ['percent' => $last_30_days_percents, 'state' => $difference > 0 ? trans('app.increase') : trans('app.decrease')]), false); ?>

              </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <div class="col-md-8 col-sm-7 col-xs-12">
      <?php if($pending_verifications > 0 || $pending_approvals > 0): ?>
          <div class="row">
              <div class="col-sm-6 col-xs-12 nopadding-right">
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="icon ion-md-filing"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text"><?php echo e(trans('app.pending_verifications'), false); ?></span>
                      <span class="info-box-number">
                          <?php echo e($pending_verifications, false); ?>

                          <a href="<?php echo e(route('admin.vendor.shop.verifications'), false); ?>" class="pull-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.take_action'), false); ?>" >
                            <i class="icon ion-md-paper-plane"></i>
                          </a>
                      </span>

                      <div class="progress" style="background: transparent;"></div>
                      <span class="progress-description">
                          <i class="icon ion-md-hourglass"></i>
                          <?php echo e(trans_choice('messages.pending_verifications', $pending_verifications, ['count' => $pending_verifications]), false); ?>

                      </span>
                    </div><!-- /.info-box-content -->
                </div>
              </div>

              <div class="col-sm-6 col-xs-12 nopadding-left">
                <div class="info-box bg-aqua">
                  <span class="info-box-icon"><i class="icon ion-md-pulse"></i></span>

                  <div class="info-box-content">
                      <span class="info-box-text"><?php echo e(trans('app.pending_approvals'), false); ?></span>
                      <span class="info-box-number">
                          <?php echo e($pending_approvals, false); ?>

                          <a href="<?php echo e(route('admin.vendor.shop.index'), false); ?>" class="pull-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.take_action'), false); ?>" >
                            <i class="icon ion-md-paper-plane"></i>
                          </a>
                      </span>

                      <div class="progress" style="background: transparent;"></div>
                      <span class="progress-description">
                          <i class="icon ion-md-hourglass"></i>
                          <?php echo e(trans_choice('messages.pending_approvals', $pending_approvals, ['count' => $pending_approvals]), false); ?>

                      </span>
                  </div><!-- /.info-box-content -->
                </div>
            </div>
        </div>
      <?php endif; ?>

      <div class="box">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#visitors_tab" data-toggle="tab">
              <i class="icon ion-md-pulse hidden-sm"></i>
              <?php echo e(trans('app.visitors_graph'), false); ?>

            </a></li>
            <li><a href="#latest_product_tab" data-toggle="tab">
              <i class="fa fa-cubes hidden-sm"></i>
              <?php echo e(trans('app.recently_added_products'), false); ?>

            </a></li>
            <li><a href="#open_ticket_tab" data-toggle="tab">
              <i class="fa fa-ticket hidden-sm"></i>
              <?php echo e(trans('app.open_tickets'), false); ?>

            </a></li>
          </ul>
          <!-- /.nav .nav-tabs -->

          <div class="tab-content">
            <div class="tab-pane active" id="visitors_tab">
              <?php if(\App\SystemConfig::isGgoogleAnalyticEnabled() && ! \App\SystemConfig::isGgoogleAnalyticConfigured()): ?>
                <div class="callout callout-warning">
                  <p>
                    <strong><i class="icon ion-md-nuclear"></i> <?php echo e(trans('app.alert'), false); ?></strong>
                    <?php echo e(trans('messages.misconfigured_google_analytics'), false); ?>

                  </p>
                </div>
              <?php endif; ?>

              <div><?php echo $chart->container(); ?></div>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="latest_product_tab">
              <div class="box-body nopadding">
                <div class="table-responsive">
                  <table class="table no-margin table-condensed">
                      <thead>
                        <tr>
                          <th><?php echo e(trans('app.name'), false); ?></th>
                          <th><?php echo e(trans('app.gtin'), false); ?></th>
                          <th width="20px">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <td>
                                <img src="<?php echo e(get_storage_file_url(optional($product->featuredImage)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.featured_image'), false); ?>">
                                <p class="indent5">
                                  <a href="javascript:void(0)" data-link="<?php echo e(route('admin.catalog.product.show', $product->id), false); ?>"  class="ajax-modal-btn">
                                    <?php echo e($product->name, false); ?>

                                  </a>
                                  <?php if (! ($product->active)): ?>
                                        <span class="label label-default indent10"><?php echo e(trans('app.inactive'), false); ?></span>
                                    <?php endif; ?>
                                </p>
                              </td>
                              <td>
                                <span class="label label-outline"><?php echo e($product->gtin_type, false); ?></span> <?php echo e($product->gtin, false); ?>

                              </td>
                              <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $product)): ?>
                                  <a href="<?php echo e(route('admin.catalog.product.edit', $product->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>
                                <?php endif; ?>
                              </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                            <td colspan="3"><?php echo e(trans('app.no_data_found'), false); ?></td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Product::class)): ?>
                  <a href="<?php echo e(route('admin.catalog.product.index'), false); ?>" class="btn btn-default btn-flat pull-right">
                    <i class="icon ion-md-cube"></i> <?php echo e(trans('app.products'), false); ?>

                  </a>
                <?php endif; ?>
              </div>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="open_ticket_tab">
              <div class="box-body nopadding">
                <div class="table-responsive">
                  <table class="table no-margin table-condensed">
                      <thead>
                        <tr>
                          <th width="65%"><?php echo e(trans('app.subject'), false); ?></th>
                          <th><?php echo e(trans('app.priority'), false); ?></th>
                          <th><i class="icon ion-md-chatbubbles"></i></th>
                          <th><?php echo e(trans('app.updated_at'), false); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $open_tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <td>
                                <span class="label label-outline"> <?php echo e($ticket->category->name, false); ?> </span>
                                <p class="indent5">
                                  <a href="<?php echo e(route('admin.support.ticket.show', $ticket->id), false); ?>"><?php echo e($ticket->subject, false); ?></a>
                                </p>
                              </td>
                              <td><?php echo $ticket->priorityLevel(); ?></td>
                              <td><span class="label label-default"><?php echo e($ticket->replies_count, false); ?></span></td>
                              <td><?php echo e($ticket->updated_at->diffForHumans(), false); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                            <td colspan="3"><?php echo e(trans('app.no_data_found'), false); ?></td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', App\Ticket::class)): ?>
                  <a href="<?php echo e(route('admin.support.ticket.index'), false); ?>" class="btn btn-default btn-flat pull-right">
                    <i class="fa fa-ticket"></i> <?php echo e(trans('app.tickets'), false); ?>

                  </a>
                <?php endif; ?>
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div><!-- /.box -->
    </div><!-- /.col-*-* -->

    <div class="col-md-4 col-sm-5 col-xs-12 nopadding-left">
      <?php if($dispute_count > 0): ?>
        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="icon ion-md-megaphone"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.appealed_disputes'), false); ?></span>
            <span class="info-box-number">
                <?php echo e($dispute_count, false); ?>

                <a href="<?php echo e(route('admin.support.dispute.index'), false); ?>" class="pull-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('app.take_action'), false); ?>" >
                  <i class="icon ion-md-paper-plane"></i>
                </a>
            </span>

            <?php
              $last_months = $last_60days_dispute_count - $last_30days_dispute_count;
              $difference = $last_30days_dispute_count - $last_months;
              $last_30_days_percents = $last_months == 0 ? 100 : round(($difference / $last_months) * 100);
            ?>
            <div class="progress">
              <div class="progress-bar" style="width: <?php echo e($last_30_days_percents, false); ?>%"></div>
            </div>

            <span class="progress-description">
                <i class="icon ion-md-arrow-<?php echo e($difference > 0 ? 'up' : 'down', false); ?>"></i>
                <?php echo e(trans('messages.last_30_days_percents', ['percent' => $last_30_days_percents, 'state' => $difference > 0 ? trans('app.increase') : trans('app.decrease')]), false); ?>

            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
      <?php endif; ?>

      <div class="box">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#top_customer_tab" data-toggle="tab">
              <i class="icon ion-md-people hidden-sm"></i>
              <?php echo e(trans('app.top_customers'), false); ?>

            </a></li>
            <li><a href="#top_merchant_tab" data-toggle="tab">
              <i class="icon ion-md-rocket hidden-sm"></i>
              <?php echo e(trans('app.top_vendors'), false); ?>

            </a></li>
          </ul>
          <!-- /.nav .nav-tabs -->

          <div class="tab-content nopadding">
            <div class="tab-pane active" id="top_customer_tab">
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin table-condensed">
                      <thead>
                        <tr class="text-muted">
                          <th><?php echo e(trans('app.name'), false); ?></th>
                          <th><i class="icon ion-md-cart"></i></th>
                          <th><?php echo e(trans('app.revenue'), false); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $top_customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <tr>
                            <td>
                              <?php if($customer->image): ?>
                                <img src="<?php echo e(get_storage_file_url(optional($customer->image)->path, 'tiny'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
                              <?php else: ?>
                                <img src="<?php echo e(get_gravatar_url($customer->email, 'tiny'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
                              <?php endif; ?>
                              <p class="indent5">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $customer)): ?>
                                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $customer->id), false); ?>" class="ajax-modal-btn modal-btn"><?php echo e($customer->getName(), false); ?></a>
                                <?php else: ?>
                                  <?php echo e($customer->getName(), false); ?>

                                <?php endif; ?>
                              </p>
                            </td>
                            <td>
                              <span class="label label-outline"><?php echo e($customer->orders_count, false); ?></span>
                            </td>
                            <td><?php echo e(get_formated_currency(round($customer->orders->sum('total'))), false); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                            <td colspan="3"><?php echo e(trans('app.no_data_found'), false); ?></td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="top_merchant_tab">
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin table-condensed">
                      <thead>
                        <tr class="text-muted">
                          <th><?php echo e(trans('app.name'), false); ?></th>
                          <th><i class="fa fa-cubes"></i></th>
                          <th><?php echo e(trans('app.revenue'), false); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $top_vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <tr>
                            <td>
                              <img src="<?php echo e(get_storage_file_url(optional($vendor->image)->path, 'tiny'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.logo'), false); ?>">
                              <p class="indent5">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $vendor)): ?>
                                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.vendor.shop.show', $vendor->id), false); ?>" class="ajax-modal-btn modal-btn"><?php echo e($vendor->name, false); ?></a>
                                <?php else: ?>
                                  <?php echo e($vendor->name, false); ?>

                                <?php endif; ?>
                              </p>
                            </td>
                            <td>
                              <span class="label label-outline"><?php echo e($vendor->inventories_count, false); ?></span>
                            </td>
                            <td>
                              <?php echo e(get_formated_currency(round($vendor->revenue->first()['total'])), false); ?>

                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                            <td colspan="3"><?php echo e(trans('app.no_data_found'), false); ?></td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col-*-* -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
  <?php echo $__env->make('plugins.chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $chart->script(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/dashboard/platform.blade.php ENDPATH**/ ?>