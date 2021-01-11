<div class="row">
  	<div class="col-md-12">
		@if(is_subscription_enabled())
			@include('admin.partials._subscription_notice')
    	@endif

	    <!-- Error Message -->
		@if (Session::has('error'))
	    	<div class="alert alert-danger">{{ Session::get('error') }}</div>
    	@endif
  	</div>
  	<div class="col-md-8 col-md-offset-2">
		@if(Auth::user()->hasExpiredPlan())
			<div class="alert alert-danger">
				<strong><i class="icon fa fa-info-circle"></i>{{ trans('app.notice') }}</strong>
				{{ trans('messages.subscription_expired') }}
			</div>
		@endif

		@if(Auth::user()->isSubscribed())
			@if($current_plan && ! Auth::user()->isOnGracePeriod())
		  		<div class="panel panel-default">
			  		<div class="panel-body">
						{!! trans('messages.current_subscription', ['plan' => $current_plan->name]) !!}
						@if(Auth::user()->isMerchant())
							{!! Form::open(['route' => ['admin.account.subscription.cancel', $current_plan], 'method' => 'delete', 'class' => 'inline']) !!}
								{!! Form::button(trans('app.calcel_plan'), ['type' => 'submit', 'class' => 'confirm ajax-silent btn btn-sm btn-danger pull-right']) !!}
							{!! Form::close() !!}
				  		@endif
			  		</div>
		  		</div>
	  		@endif
  		@else
			<div class="alert alert-info">
				<strong><i class="icon fa fa-rocket"></i></strong>
				{{ trans('messages.choose_subscription') }}
			</div>
  		@endif

		@unless(Auth::user()->hasBillingInfo())
			<div class="alert alert-info">
				<strong><i class="icon fa fa-credit-card"></i></strong>
				{{ trans('messages.no_billing_info') }}
			</div>
  		@endunless

		@if(Auth::user()->hasBillingInfo() || ! is_billing_info_required())
	  		<div class="panel panel-default">
		  		<div class="panel-body">
					<fieldset>
						<legend>{{ trans('app.subscription_plans') }}</legend>
				  		<table class="table no-border">
				  			<tbody>
						  		@foreach($plans as $plan)
						  			<tr>
						  				<td class="lead">
						  					{{ $plan->name }}
						  				</td>
						  				<td>
				                            <a href="javascript:void(0)" data-link="{{ route('admin.account.subscription.features', $plan->plan_id) }}" class="ajax-modal-btn btn btn-default">
				                                <i class="fa fa-star-o"></i> {{ trans('app.features') }}
				                            </a>
						  				</td>
						  				<td class="lead">
						  					<span class="indent20">{{ get_formated_currency($plan->cost). trans('app.per_month')  }}</span>
						  				</td>
										@if(Auth::user()->isMerchant())
							  				<td class="pull-right">
					                        	@if(optional($current_plan)->stripe_plan == $plan->plan_id || optional($current_plan)->braintree_plan == $plan->plan_id)
													@if(Auth::user()->isOnGracePeriod())
						                                <a href="{{ route('admin.account.subscription.resume') }}" class="confirm btn btn-lg btn-primary">
							                            	<i class="fa fa-rocket"></i> {{ trans('app.resume_subscription') }}
							                            </a>
													@else
							                            <button class="btn btn-lg btn-primary disabled">
							                            	<i class="fa fa-check-circle-o"></i> {{ trans('app.current_plan') }}
							                            </button>
													@endif
					                        	
					                        	@endif
							  				</td>
						  				@endif
						  			</tr>
						  		@endforeach
				  			</tbody>
				  		</table>
                      
                   
                      

						@if((bool) config('system_settings.trial_days'))
							<span class="spacer10"></span>
							<span class="text-info">
								<strong><i class="icon fa fa-info-circle"></i></strong>
								{{ trans('messages.plan_comes_with_trial',['days' => config('system_settings.trial_days')]) }}
							</span>
						@endif
				  	</fieldset>
				</div>
			</div>
  		@endif
		
      
         
                        <div class="panel panel-default">
		  		<div class="panel-body">
			        <form action="{{route('admin.account.billing.update')}}" method="post">
                      {!! csrf_field() !!}
                        <div class="form-group">
                          <label for="plan">Plan:</label>
                          <select class="form-control" id="plan" name="plan" required>
                          
                          @foreach($plans as $plan)
                            @if($plan->cost != 0)
                            <option value="{{$plan->plan_id}}">{{$plan->name}} ({{get_formated_currency($plan->cost). trans('app.per_month')}})</option>
                            @endif
                          @endforeach
                            
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
                url:'{{route("admin.account.billing.sum")}}',
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
                url:'{{route("admin.account.billing.sum")}}',
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

