<?php if(Auth::user()->isSubscribed() && ! Auth::user()->shop->hide_trial_notice): ?>
	<?php
		$subscription = Auth::user()->getCurrentPlan();
	?>
	<?php if(Auth::user()->isOnTrial()): ?>
		<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong><i class="icon fa fa-info-circle"></i><?php echo e(trans('app.notice'), false); ?></strong>
          <?php echo e('Notice! Your package ends in '.\Carbon\Carbon::now()->diffInDays($subscription->trial_ends_at).' days! Add billing information and choose a plan to continue. ', false); ?>

		</div>
	<?php elseif(Auth::user()->isOnGracePeriod()): ?>
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong><i class="icon fa fa-info-circle"></i><?php echo e(trans('app.notice'), false); ?></strong>
			<?php echo e(trans('messages.resume_subscription', ['ends' => \Carbon\Carbon::now()->diffInDays($subscription->ends_at)]), false); ?>


			<?php if(Auth::user()->isMerchant()): ?>
				<span class="pull-right">
		    		<a href="<?php echo e(route('admin.account.subscription.resume'), false); ?>" class="confirm btn bg-navy"><i class="fa fa-rocket"></i>  <?php echo e(trans('app.resume_subscription'), false); ?></a>
				</span>
			<?php endif; ?>
		</div>
	<?php elseif(Auth::user()->isOnGenericTrial()): ?>
		<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong><i class="icon fa fa-info-circle"></i><?php echo e(trans('app.notice'), false); ?></strong>
            <?php echo e(' Your package ends in '.\Carbon\Carbon::now()->diffInDays(Auth::user()->shop->trial_ends_at).' days! Please renew or upgrade the package. ', false); ?>


          
          <?php if (! (Request::is('admin/account/billing'))): ?>
				<span class="pull-right">
		    		<a href="<?php echo e(route('admin.account.billing'), false); ?>" class="btn bg-navy"><i class="fa fa-rocket"></i>  <?php echo e(trans('app.choose_plan'), false); ?></a>
				</span>
			<?php endif; ?>
		</div>
	<?php endif; ?>
<?php elseif(Auth::user()->hasExpiredOnGenericTrial()): ?>
	<div class="alert alert-danger">
		<strong><i class="icon fa fa-info-circle"></i><?php echo e(trans('app.notice'), false); ?></strong>
		<?php echo e(trans('messages.trial_expired'), false); ?>

		<?php if (! (Request::is('admin/account/billing'))): ?>
			<span class="pull-right">
	    		<a href="<?php echo e(route('admin.account.billing'), false); ?>" class="btn bg-navy"><i class="fa fa-rocket"></i>  <?php echo e(trans('app.choose_plan'), false); ?></a>
			</span>
		<?php endif; ?>
	</div>
<?php endif; ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_subscription_notice.blade.php ENDPATH**/ ?>