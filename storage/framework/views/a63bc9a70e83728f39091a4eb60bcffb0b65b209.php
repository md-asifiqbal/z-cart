<?php $__env->startSection('content'); ?>
    <?php if(config('system_settings.google_analytic_report') && \App\SystemConfig::isGgoogleAnalyticConfigured()): ?>
      	<div class="box">
	        <div class="nav-tabs-custom" style="box-shadow: none;">
	          	<ul class="nav nav-tabs nav-justified">
		            <li class="active"><a href="#visitors_tab" data-toggle="tab">
		              <i class="fa fa-users hidden-sm"></i>&nbsp;
		              <?php echo e(trans('app.visitors'), false); ?>

		            </a></li>
		            <li><a href="#referrals_tab" data-toggle="tab">
		              <i class="fa fa-anchor hidden-sm"></i>&nbsp;
		              <?php echo e(trans('app.top_referrals'), false); ?>

		            </a></li>
		            <li><a href="#behavior_tab" data-toggle="tab">
		              <i class="fa fa-compass hidden-sm"></i>&nbsp;
		              <?php echo e(trans('app.behavior'), false); ?>

		            </a></li>
	          	</ul>
	          	<!-- /.nav .nav-tabs -->

	          	<div class="tab-content">
		            <div class="tab-pane active" id="visitors_tab">
		              <div><?php echo $chartVisitors->container(); ?></div>
		            </div>
		            <!-- /.tab-pane -->

		            <div class="tab-pane" id="referrals_tab">
		              <div><?php echo $chartReferrers->container(); ?></div>
		            </div>
		            <!-- /.tab-pane -->

		            <div class="tab-pane" id="behavior_tab">
		            	<div class="row">
			            	<div class="col-sm-6 nopadding-right">
			            		<?php echo $chartVisitorTypes->container(); ?>

			            	</div>
			            	<div class="col-sm-6 nopadding-left">
			            		<?php echo $chartDevices->container(); ?>

		            		</div>
		            	</div>
		            </div>
		            <!-- /.tab-pane -->
	          	</div>
	          	<!-- /.tab-content -->
	        </div>
	        <!-- /.nav-tabs-custom -->

	        <div class="box-footer clearfix text-muted">
				<i class="fa fa-info-circle"></i> <?php echo e(trans('app.latest_months', ['months' => config('charts.google_analytic.period')]), false); ?>

				<?php echo e(trans('app.data_from_google') . '. You can change this value from config/charts.php page.', false); ?>

	        </div>
      	</div>
      	<!-- /.box -->
    <?php endif; ?>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo e(trans('app.visitors'), false); ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover" id="all-visitors-table">
				<thead>
					<tr>
						<th><?php echo e(trans('app.flag'), false); ?></th>
						<th><?php echo e(trans('app.ip'), false); ?></th>
						<th><?php echo e(trans('app.hits'), false); ?></th>
						<th><?php echo e(trans('app.page_views'), false); ?></th>
						<th><?php echo e(trans('app.last_visits'), false); ?></th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <?php if(config('system_settings.google_analytic_report') && \App\SystemConfig::isGgoogleAnalyticConfigured()): ?>
		<?php echo $__env->make('plugins.chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php echo $chartVisitors->script(); ?>

		<?php echo $chartReferrers->script(); ?>

		<?php echo $chartVisitorTypes->script(); ?>

		<?php echo $chartDevices->script(); ?>

	<?php endif; ?>

	<script type="text/javascript">
		$('#all-visitors-table').DataTable({
		  	// "aaSorting": [],
		    "aaSorting": [[ 1, "desc" ]],
		    "iDisplayLength": <?php echo e(getPaginationValue(), false); ?>,
	        "processing": true,
	        "serverSide": true,
	        "ajax": "<?php echo e(route('admin.report.visitors.getMore'), false); ?>",
			"columns": [
	            { 'data': 'flag', 'name': 'flag', 'searchable': false },
	            { 'data': 'ip', 'name': 'ip' },
	            { 'data': 'hits', 'name': 'hits', 'searchable': false },
	            { 'data': 'page_views', 'name': 'page_views', 'searchable': false },
	            { 'data': 'last_visits', 'name': 'last_visits', 'searchable': false },
	            { 'data': 'option', 'name': 'option', 'orderable': false, 'searchable': false, 'exportable': false, 'printable': false }
	        ],
		    "oLanguage": {
		        "sInfo": "_START_ to _END_ of _TOTAL_ entries",
		        "sLengthMenu": "Show _MENU_",
		        "sSearch": "",
		        "sEmptyTable": "No data found!",
		        "oPaginate": {
		          "sNext": '<i class="fa fa-hand-o-right"></i>',
		          "sPrevious": '<i class="fa fa-hand-o-left"></i>',
		        },
		    },
		    "aoColumnDefs": [{
		        "bSortable": false,
		        "aTargets": [ -1 ]
		     }],
			"lengthMenu": [
				[10, 25, 50, -1],
				[ '10 rows', '25 rows', '50 rows', 'Show all' ]
			],     // page length options
		    dom: 'Bfrtip',
		    buttons: [
		        	'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
		    	]
	    });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/report/platform/visitors.blade.php ENDPATH**/ ?>