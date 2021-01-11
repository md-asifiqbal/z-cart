<?php $__env->startSection('content'); ?>
  <!-- Info boxes -->
  <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-credit-card"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.revenue'), false); ?></span>
              <span class="info-box-number">
                  <?php echo e(get_formated_currency($sales_total), false); ?>

              </span>
              <div class="progress" style="background: transparent;"></div>
              <span class="progress-description text-muted">
                  <i class="fa fa-clock-o"></i> <?php echo e(trans('app.latest_months', ['months' => config('charts.default.months')]), false); ?>

              </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-percent"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo e(trans('app.conversion_rate'), false); ?></span>
                <span class="info-box-number">
                  <?php if($orders_count): ?>
                    <?php echo e(get_formated_decimal(( $orders_count / ($orders_count + $abandoned_carts_count) ) * 100, true, 1), false); ?> <?php echo e(trans('app.percent'), false); ?>

                  <?php else: ?>
                    0
                  <?php endif; ?>
                </span>
                <div class="progress" style="background: transparent;"></div>
                <span class="progress-description text-muted">
                  <i class="fa fa-clock-o"></i> <?php echo e(trans('app.latest_months', ['months' => config('charts.default.months')]), false); ?>

                </span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-red">
            <i class="fa fa-cart-arrow-down"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.abandoned_carts'), false); ?></span>
                <span class="info-box-number">
                  <?php echo e($abandoned_carts_count, false); ?>

                </span>
                <div class="progress" style="background: transparent;"></div>
                <span class="progress-description text-muted">
                  <i class="fa fa-clock-o"></i> <?php echo e(trans('app.latest_months', ['months' => config('charts.default.months')]), false); ?>

                </span>
          </div><!-- /.info-box-content -->
        </div>
      </div><!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-green">
            <i class="fa fa-calculator"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.avg_order_value'), false); ?></span>
                <span class="info-box-number">
                  <?php if($orders_count): ?>
                    <?php echo e(get_formated_currency($sales_total/$orders_count), false); ?>

                  <?php else: ?>
                    0
                  <?php endif; ?>
                </span>
                <div class="progress" style="background: transparent;"></div>
                <span class="progress-description text-muted">
                  <i class="fa fa-clock-o"></i> <?php echo e(trans('app.latest_months', ['months' => config('charts.default.months')]), false); ?>

                </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <div class="col-sm-8 nopadding-right">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title text-warning">
            <i class="fa fa-calendar"></i> <?php echo e(trans('app.sales_by_months'), false); ?>

          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <p class="text-muted"><span class="lead"> <?php echo e(trans('app.total'), false); ?>: <?php echo e(get_formated_currency($sales_total), false); ?> </span><span class="pull-right"><?php echo e($orders_count . ' ' . trans('app.orders'), false); ?></span></p>
            <div><?php echo $chart->container(); ?></div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-sm-4">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title text-warning">
            <i class="fa fa-money"></i> <?php echo e(trans('app.finances'), false); ?>

          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-default">
              <tbody>
                <tr>
                  <td><?php echo e(trans('app.sales_total'), false); ?></td>
                  <td class="pull-right"><?php echo e(get_formated_currency($sales_total), false); ?></td>
                </tr>
                <tr>
                  <td><?php echo e(trans('app.discounts'), false); ?></td>
                  <td class="pull-right">-<?php echo e(get_formated_currency($discount_total, config('system_settings.decimals')), false); ?></td>
                </tr>
                <tr>
                  <td><?php echo e(trans('app.refunds'), false); ?></td>
                  <td class="pull-right">-<?php echo e(get_formated_currency($latest_refund_total, config('system_settings.decimals')), false); ?></td>
                </tr>
                <tr>
                  <td><?php echo e(trans('app.net_sales'), false); ?></td>
                  <td class="pull-right"><span class="lead"><?php echo e(get_formated_currency($sales_total - ($discount_total + $latest_refund_total)), false); ?></span></td>
                </tr>
              </tbody>
            </table>
            <div class="clearfix spacer20"></div>
            <small class="text-muted pull-right"><i class="fa fa-info-circle"></i> <?php echo e(trans('app.latest_months', ['months' => config('charts.default.months')]), false); ?></small>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!--
  Top Selling Items
   -->
  <div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="icon ion-md-rocket"></i> <?php echo e(trans('app.top_selling_items'), false); ?></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
          <table class="table no-margin table-condensed table-no-sort">
              <thead>
                <tr class="text-muted">
                    <th width="60px">&nbsp;</th>
                    <th><?php echo e(trans('app.listing'), false); ?></th>
                    <th><?php echo e(trans('app.attributes'), false); ?></th>
                    <th class="text-center" width="8%"><?php echo e(trans('app.units_sold'), false); ?></th>
                    <th class="text-center"><?php echo e(trans('app.gross_sales'), false); ?></th>
                    <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $top_listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                        <img src="<?php echo e(get_storage_file_url(optional($inventory->image)->path, 'tiny'), false); ?>" class="img-md" alt="<?php echo e(trans('app.image'), false); ?>">
                    </td>
                    <td>
                        <h5 class="nopadding">
                          <small><?php echo e(trans('app.sku') . ': ', false); ?></small>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $inventory)): ?>
                                <a href="javascript:void(0)" data-link="<?php echo e(route('admin.stock.inventory.show', $inventory->id), false); ?>" class="ajax-modal-btn modal-btn"><?php echo e($inventory->sku, false); ?></a>
                            <?php else: ?>
                              <?php echo e($inventory->sku, false); ?>

                            <?php endif; ?>
                        </h5>

                        <span class="text-muted">
                            <?php echo e($inventory->name, false); ?>

                        </span>
                    </td>
                    <td>
                      <?php echo e(implode(' | ', array_column($inventory->attributeValues->toArray(), 'value') ), false); ?>

                    </td>
                    <td class="text-center"><?php echo e($inventory->sold_qtt, false); ?></td>
                    <td class="text-center"><?php echo e(get_formated_currency($inventory->gross_sales), false); ?></td>
                    <td>&nbsp;</td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  <!--
  End Top Selling Items
   -->

  <!--
  Top Customers
   -->
  <div class="row">
    <div class="col-sm-6 nopadding-right">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title text-warning">
            <i class="fa fa-user-secret"></i> <?php echo e(trans('app.top_customers'), false); ?>

          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin table-condensed">
                  <thead>
                    <tr class="text-muted">
                      <th width="60px">&nbsp;</th>
                      <th><?php echo e(trans('app.name'), false); ?></th>
                      <th class="text-center"><i class="fa fa-shopping-cart"></i></th>
                      <th class="text-center"><?php echo e(trans('app.revenue'), false); ?></th>
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
                        </td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $customer)): ?>
                                <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $customer->id), false); ?>" class="ajax-modal-btn modal-btn"><?php echo e($customer->getName(), false); ?></a>
                            <?php else: ?>
                              <?php echo e($customer->getName(), false); ?>

                            <?php endif; ?>
                        </td>
                        <td class="text-center"><?php echo e($customer->orders_count, false); ?></td>
                        <td class="text-center"><?php echo e(get_formated_currency(round($customer->orders->sum('total'))), false); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <tr>
                        <td colspan="3"><?php echo e(trans('app.no_data_found'), false); ?></td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
              </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-sm-6 nopadding-left">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title text-warning">
            <i class="fa fa-user-secret"></i> <?php echo e(trans('app.returning_customers'), false); ?>

          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin table-condensed">
                  <thead>
                    <tr class="text-muted">
                      <th width="60px">&nbsp;</th>
                      <th><?php echo e(trans('app.name'), false); ?></th>
                      <th class="text-center"><i class="fa fa-shopping-cart"></i></th>
                      <th class="text-center"><?php echo e(trans('app.revenue'), false); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $returning_customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <tr>
                        <td>
                          <?php if($customer->image): ?>
                            <img src="<?php echo e(get_storage_file_url(optional($customer->image)->path, 'tiny'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
                          <?php else: ?>
                            <img src="<?php echo e(get_gravatar_url($customer->email, 'tiny'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
                          <?php endif; ?>
                        </td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $customer)): ?>
                                <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $customer->id), false); ?>" class="ajax-modal-btn modal-btn"><?php echo e($customer->getName(), false); ?></a>
                            <?php else: ?>
                              <?php echo e($customer->getName(), false); ?>

                            <?php endif; ?>
                        </td>
                        <td class="text-center"><?php echo e($customer->orders_count, false); ?></td>
                        <td class="text-center"><?php echo e(get_formated_currency(round($customer->orders->sum('total'))), false); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <tr>
                        <td colspan="3"><?php echo e(trans('app.no_data_found'), false); ?></td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
              </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  <!--
  End Top Customers
   -->

  <div class="row">
    <div class="col-sm-6 nopadding-right">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title text-warning">
            <i class="fa fa-code-fork"></i> <?php echo e(trans('app.top_categories'), false); ?>

          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                      <tr class="text-muted">
                          <th><?php echo e(trans('app.name'), false); ?></th>
                          <th class="text-center"><?php echo e(trans('app.items'), false); ?></th>
                          <th class="text-center"><?php echo e(trans('app.status'), false); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $top_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($category->name, false); ?></td>
                          <td class="text-center"><?php echo e($category->listings_count, false); ?></td>
                          <td class="text-center"><?php echo e(($category->active) ? trans('app.active') : trans('app.inactive'), false); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-sm-6 nopadding-left">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title text-warning">
            <i class="fa fa-truck"></i> <?php echo e(trans('app.top_suppliers'), false); ?>

          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin table-condensed">
                    <thead>
                      <tr class="text-muted">
                          <th width="60px">&nbsp;</th>
                          <th><?php echo e(trans('app.name'), false); ?></th>
                          <th class="text-center"><?php echo e(trans('app.items'), false); ?></th>
                          <th class="text-center"><?php echo e(trans('app.status'), false); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $top_suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                              <img src="<?php echo e(get_storage_file_url(optional($supplier->image)->path, 'tiny'), false); ?>" class="img-circle img-sm" alt="<?php echo e(trans('app.logo'), false); ?>">
                          </td>
                          <td><?php echo e($supplier->name, false); ?></td>
                          <td class="text-center"><?php echo e($supplier->inventories_count, false); ?></td>
                          <td class="text-center"><?php echo e(($supplier->active) ? trans('app.active') : trans('app.inactive'), false); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
  <?php echo $__env->make('plugins.chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $chart->script(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/report/merchant/kpi.blade.php ENDPATH**/ ?>