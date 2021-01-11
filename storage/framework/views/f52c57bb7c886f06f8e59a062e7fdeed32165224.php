<div class="row">
  	<div class="col-md-12">
		<?php if(is_subscription_enabled()): ?>
			<?php echo $__env->make('admin.partials._subscription_notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	<?php endif; ?>

	    <!-- Error Message -->
		<?php if(Session::has('error')): ?>
	    	<div class="alert alert-danger"><?php echo e(Session::get('error'), false); ?></div>
    	<?php endif; ?>
  	</div>
  	<div class="col-md-8 col-md-offset-2">
		<?php if(Auth::user()->hasExpiredPlan()): ?>
			<div class="alert alert-danger">
				<strong><i class="icon fa fa-info-circle"></i><?php echo e(trans('app.notice'), false); ?></strong>
				<?php echo e(trans('messages.subscription_expired'), false); ?>

			</div>
		<?php endif; ?>

		<?php if(Auth::user()->isSubscribed()): ?>
			<?php if($current_plan && ! Auth::user()->isOnGracePeriod()): ?>
		  		<div class="panel panel-default">
			  		<div class="panel-body">
						<?php echo trans('messages.current_subscription', ['plan' => $current_plan->name]); ?>

						<?php if(Auth::user()->isMerchant()): ?>
							<?php echo Form::open(['route' => ['admin.account.subscription.cancel', $current_plan], 'method' => 'delete', 'class' => 'inline']); ?>

								<?php echo Form::button(trans('app.calcel_plan'), ['type' => 'submit', 'class' => 'confirm ajax-silent btn btn-sm btn-danger pull-right']); ?>

							<?php echo Form::close(); ?>

				  		<?php endif; ?>
			  		</div>
		  		</div>
	  		<?php endif; ?>
  		<?php else: ?>
			<div class="alert alert-info">
				<strong><i class="icon fa fa-rocket"></i></strong>
				<?php echo e(trans('messages.choose_subscription'), false); ?>

			</div>
  		<?php endif; ?>

		<?php if (! (Auth::user()->hasBillingInfo())): ?>
			<div class="alert alert-info">
				<strong><i class="icon fa fa-credit-card"></i></strong>
				<?php echo e(trans('messages.no_billing_info'), false); ?>

			</div>
  		<?php endif; ?>

		<?php if(Auth::user()->hasBillingInfo() || ! is_billing_info_required()): ?>
	  		<div class="panel panel-default">
		  		<div class="panel-body">
					<fieldset>
						<legend><?php echo e(trans('app.subscription_plans'), false); ?></legend>
				  		<table class="table no-border">
				  			<tbody>
						  		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  			<tr>
						  				<td class="lead">
						  					<?php echo e($plan->name, false); ?>

						  				</td>
						  				<td>
				                            <a href="javascript:void(0)" data-link="<?php echo e(route('admin.account.subscription.features', $plan->plan_id), false); ?>" class="ajax-modal-btn btn btn-default">
				                                <i class="fa fa-star-o"></i> <?php echo e(trans('app.features'), false); ?>

				                            </a>
						  				</td>
						  				<td class="lead">
						  					<span class="indent20"><?php echo e(get_formated_currency($plan->cost). trans('app.per_month'), false); ?></span>
						  				</td>
										<?php if(Auth::user()->isMerchant()): ?>
							  				<td class="pull-right">
					                        	<?php if(optional($current_plan)->stripe_plan == $plan->plan_id || optional($current_plan)->braintree_plan == $plan->plan_id): ?>
													<?php if(Auth::user()->isOnGracePeriod()): ?>
						                                <a href="<?php echo e(route('admin.account.subscription.resume'), false); ?>" class="confirm btn btn-lg btn-primary">
							                            	<i class="fa fa-rocket"></i> <?php echo e(trans('app.resume_subscription'), false); ?>

							                            </a>
													<?php else: ?>
							                            <button class="btn btn-lg btn-primary disabled">
							                            	<i class="fa fa-check-circle-o"></i> <?php echo e(trans('app.current_plan'), false); ?>

							                            </button>
													<?php endif; ?>
					                        	
					                        	<?php endif; ?>
							  				</td>
						  				<?php endif; ?>
						  			</tr>
						  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  			</tbody>
				  		</table>
                      
                   
                      

						<?php if((bool) config('system_settings.trial_days')): ?>
							<span class="spacer10"></span>
							<span class="text-info">
								<strong><i class="icon fa fa-info-circle"></i></strong>
								<?php echo e(trans('messages.plan_comes_with_trial',['days' => config('system_settings.trial_days')]), false); ?>

							</span>
						<?php endif; ?>
				  	</fieldset>
				</div>
			</div>
  		<?php endif; ?>
		
      
         
                        <div class="panel panel-default">
		  		<div class="panel-body">
			        <form action="<?php echo e(route('admin.account.billing.update'), false); ?>" method="post">
                      <?php echo csrf_field(); ?>

                        <div class="form-group">
                          <label for="plan">Plan:</label>
                          <select class="form-control" id="plan" name="plan" required>
                          
                          <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($plan->cost != 0): ?>
                            <option value="<?php echo e($plan->plan_id, false); ?>"><?php echo e($plan->name, false); ?> (<?php echo e(get_formated_currency($plan->cost). trans('app.per_month'), false); ?>)</option>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
  						</select>
                        </div>
                        <div class="form-group">
                          <label for="periods">Package Period:</label>
                          <select class="form-control" id="periods" name="periods" required>
                          
                            <option value="1">1 Months</option>
                            <option value="3">3 Months</option>
                            <option value="6">6 Months</option>
                            <option value="12">1 Years</option>
                            <option value="24">2 Years</option>
                            <option value="36">3 Years</option>
                            <option value="60">5 Years</option>
                         
                            
  						</select>
                        </div>
                      <div class="form-group">
                      <h4 id="sumDetails" style="color:red;">
                        
                        </h4>
                    </div>
                      <div>
                        <p>
            Brac Bank 
ACC : 1304104667580001
Name : Md S Ahmed 
<br>
বিকাশ থেকে যেভাবে ব্র্যাক ব্যাঙ্ক একাউন্টে টাকা পাঠাবেন:

আরো > ট্রান্সফার মানি > ব্যাংক একাউন্ট> ব্র্যাক ব্যাংক
সিলেক্ট - অন্যের তারপর ব্যাঙ্ক একাউন্ট নাম্বার এবং নাম
          </p>
          <p>
            <b>Brac Bank ACC : 1304104667580001</b>
          </p>
                      </div>
                      <div class="form-group">
                      <label for="bkash">Bkash No:</label>
                      <input type="number" class="form-control" id="bkash" name="bkash" placeholder="017XXXXXXXX" required>
                    </div>
                    <div class="form-group">
                      <label for="txtid">Transaction ID:</label>
                      <input type="text" class="form-control" id="txtid" name="txtid" required>
                    </div>
                      
                        <button type="submit" class="btn btn-default">Update</button>
                      </form>
				</div>
			</div>
		


  	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>
      
      
      $("#periods").change(function () {
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // alert($('#mobile').val());
            $.ajax( {
                url:'<?php echo e(route("admin.account.billing.sum"), false); ?>',
                type:'post',
                data: {'plan': $('#plan').val(),'periods': $('#periods').val()},
                success:function(data) {
                    $("#sumDetails").text(data);
                   
                },
                error:function () {
                    console.log('error');
                }
            });
    });
        
      
       $("#plan").change(function () {
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // alert($('#mobile').val());
            $.ajax( {
                url:'<?php echo e(route("admin.account.billing.sum"), false); ?>',
                type:'post',
                data: {'plan': $('#plan').val(),'periods': $('#periods').val()},
                success:function(data) {
                    $("#sumDetails").text(data);
                   
                },
                error:function () {
                    console.log('error');
                }
            });
    });
        
    </script>

<?php /**PATH /home/amraibes/public_html/resources/views/admin/account/_billing.blade.php ENDPATH**/ ?>