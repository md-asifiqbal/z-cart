<?php $__env->startSection('content'); ?>
  <!-- Info boxes -->
  <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-credit-card"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.monthly_recuring_revenue'), false); ?></span>
              <span class="info-box-number">
                  <?php echo e(get_formated_currency($monthly_recuring_revenue), false); ?>

              </span>
              <div class="progress" style="background: transparent;"></div>
              <span class="progress-description text-muted">
                  <i class="fa fa-clock-o"></i>
                  <?php echo e(trans('app.in_days', ['days' => 30]), false); ?>

              </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-percent"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo e(trans('app.last_30_days_commission'), false); ?></span>
                <span class="info-box-number">
                    <?php echo e(get_formated_currency($last_30_days_commission), false); ?>

                </span>
                <div class="progress" style="background: transparent;"></div>
                <span class="progress-description text-muted">
                  <i class="fa fa-clock-o"></i>
                  <?php echo e(trans('app.in_days', ['days' => 30]), false); ?>

                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-right nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-green">
            <i class="fa fa-user-plus"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.new_vendors'), false); ?></span>
              	<span class="info-box-number">
	                <?php echo e($new_vendor_count, false); ?>

              	</span>
                <div class="progress" style="background: transparent;"></div>
                <span class="progress-description text-muted">
                  <i class="fa fa-clock-o"></i>
                  <?php echo e(trans('app.latest_hrs', ['hrs' => 24]), false); ?>

                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12 nopadding-left">
        <div class="info-box">
          <span class="info-box-icon bg-red">
            <i class="fa fa-users"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text"><?php echo e(trans('app.trialing_vendors'), false); ?></span>
              	<span class="info-box-number">
                	<?php echo e(array_sum(array_column($data['subscribers'], 'trialing')), false); ?>

              	</span>
                <div class="progress" style="background: transparent;"></div>
                <span class="progress-description text-muted"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>
      <!-- /.col -->
  </div> <!-- /.row -->


	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.subscription_plans'), false); ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
    	<div class="row">
      	<div class="col-sm-7 nopadding-right">
					<table class="table table-striped">
						<thead>
							<tr>
								<th><?php echo e(trans('app.name'), false); ?></th>
								<th><?php echo e(trans('app.subscribers'), false); ?></th>
								<th><?php echo e(trans('app.trialing'), false); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $data['subscribers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($subscriber['name'], false); ?></td>
									<td><?php echo e($subscriber['count'], false); ?></td>
									<td><?php echo e($subscriber['trialing'], false); ?></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
      	</div>
      	<div class="col-sm-5 nopadding-left">
      		<?php echo $chartSubscribers->container(); ?>

    		</div>
    	</div> <!-- /.row -->
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
	<?php echo $__env->make('plugins.chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $chartSubscribers->script(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/report/platform/kpi.blade.php ENDPATH**/ ?>