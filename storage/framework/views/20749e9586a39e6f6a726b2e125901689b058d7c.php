<?php $__env->startSection('content'); ?>
	<div class="box">
	  	<?php if(Auth::user()->isFromPlatform()): ?>
		    <div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-user"></i> <?php echo e(trans('app.profile'), false); ?></h3>
		    </div>
		    <div class="box-body">
	    		<?php echo $__env->make('admin.account._profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	    		<span class="spacer20"></span>
    		</div>
	  	<?php else: ?>
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
					<li class="<?php echo e(Request::is('admin/account/profile') ? 'active' : '', false); ?>"><a href="#profile_tab" data-toggle="tab">
						<i class="fa fa-user hidden-sm"></i>
						<?php echo e(trans('app.profile'), false); ?>

					</a></li>

					<li class="<?php echo e(Request::is('admin/account/billing') ? 'active' : '', false); ?>"><a href="#billing_tab" data-toggle="tab">
						<i class="fa fa-credit-card hidden-sm"></i>
						<?php echo e(trans('app.billing'), false); ?>

					</a></li>

					<li class="<?php echo e(Request::is('admin/account/ticket') ? 'active' : '', false); ?>"><a href="#ticket_tab" data-toggle="tab">
						<i class="fa fa-ticket hidden-sm"></i>
						<?php echo e(trans('app.tickets'), false); ?>

					</a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane <?php echo e(Request::is('admin/account/profile') ? 'active' : '', false); ?>" id="profile_tab">
			    		<?php echo $__env->make('admin.account._profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				    </div>

				    <div class="tab-pane <?php echo e(Request::is('admin/account/billing') ? 'active' : '', false); ?>" id="billing_tab">
			    		<?php echo $__env->make('admin.account._billing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				    </div>

				    <div class="tab-pane <?php echo e(Request::is('admin/account/ticket') ? 'active' : '', false); ?>" id="ticket_tab">
			    		<?php echo $__env->make('admin.account._ticket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				    </div>
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.nav-tabs-custom -->
	  	<?php endif; ?>
	</div> <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>

  <?php echo $__env->make('plugins.stripe-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/admin/account/index.blade.php ENDPATH**/ ?>