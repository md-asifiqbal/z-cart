

<?php $__env->startSection('content'); ?>
  <div class="box login-box-body">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo e(trans('app.form.register'), false); ?></h3>
    </div> <!-- /.box-header -->
    <div class="box-body">
      <div class="alert">
      <p class="alert-success" id="alert">
        
        </p>
      </div>
      <?php echo Form::open(['route' => 'register', 'id' => config('system_settings.required_card_upfront') ? 'stripe-form' : 'registration-form', 'data-toggle' => 'validator']); ?>


        <?php if(is_subscription_enabled()): ?>
          <div class="form-group has-feedback">
            <?php echo e(Form::select('plan', $plans, isset($plan) ? $plan : Null, ['id' => 'plans' , 'class' => 'form-control input-lg', 'required']), false); ?>

              
          </div>
        <?php endif; ?>
      
        <div class="form-group" id="periods_form">
                          <label for="periods">Package Period:</label>
                          <select class="form-control" id="periods" name="periods">
                          
                           
                         
                            
  						</select>
                        </div>

        <div class="form-group has-feedback">
          <?php echo Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder' =>'Email or Mobile No', 'required','type'=>'text','id'=>'mobile']); ?>

          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <div class="help-block with-errors" id="emailError"></div>
        </div>
        
        <div class="form-group has-feedback">
            <?php echo Form::password('password', ['class' => 'form-control input-lg', 'id' => 'password', 'placeholder' => trans('app.placeholder.password'), 'data-minlength' => '6', 'required']); ?>

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group has-feedback">
            <?php echo Form::password('password_confirmation', ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.confirm_password'), 'data-match' => '#password', 'required']); ?>

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group has-feedback">
            <?php echo Form::text('shop_name', null, ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.shop_name'), 'required']); ?>

            <i class="glyphicon glyphicon-equalizer form-control-feedback"></i>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group has-feedback otp">
            <?php echo Form::text('otp', null, ['class' => 'form-control input-lg', 'placeholder' => 'OTP','required','id'=>'otp']); ?>

            <div class="help-block with-errors otp-error" id="otpError">
       <button id="regenerateOTP" class="btn btn-danger btn_shadow" style="border-radius: 0;" onclick="sendOtp()" >Resend OTP <span id="timer"></span></button> 
        </div>
      </div>
       

        <div class="row">
          <div class="col-xs-8">
            <div class="form-group">
                <label>
                    <?php echo Form::checkbox('agree', null, null, ['class' => 'icheck', 'required']); ?> <?php echo trans('app.form.i_agree_with_merchant_terms', ['url' => route('page.open', \App\Page::PAGE_TNC_FOR_MERCHANT)]); ?>

                </label>
                <div class="help-block with-errors"></div>
            </div>
          </div>

          <div class="col-xs-4">
            <input class="btn btn-block btn-lg flat btn-primary sent-otp" onclick="sendOtp()" type="button" value="<?php echo e(trans('app.form.register'), false); ?>" />
            <?php echo Form::submit('Verify Account', ['id' => 'card-button', 'class' => 'btn btn-block btn-lg btn-flat btn-primary otp']); ?>

          </div>
        </div>
      <?php echo Form::close(); ?>


      <a href="<?php echo e(route('login'), false); ?>" class="btn btn-link"><?php echo e(trans('app.form.merchant_login'), false); ?></a>
    </div>
  </div>
  <!-- /.form-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('timer').innerHTML = m + ':' + s;
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
  }
}

function disableResend()
{
 $("#regenerateOTP").attr("disabled", true);
 timer(60);
  $('#regenerateOTP').show();
  setTimeout(function() {
  
 $('#regenerateOTP').removeAttr("disabled");
      $('#timer').hide();
   
  }, 60000); 
}
      
      $(document).ready(function(){
        
        var val=$('#plans').prop('selectedIndex');
            if(val == 0){
               
              var option = $('<option></option>').attr("value", "1").text("1 Months");
             $("#periods").html(option);
              $('#periods_form').hide();
            }else{
               var option = $('<option></option>').attr("value", "1").text("1 Months");
              var option1 = $('<option></option>').attr("value", "3").text("3 Months");
              var option2 = $('<option></option>').attr("value", "6").text("6 Months");
              var option3 = $('<option></option>').attr("value", "12").text("1 Years");
              var option4 = $('<option></option>').attr("value", "24").text("2 Years");
              var option5 = $('<option></option>').attr("value", "36").text("3 Years");
              var option6 = $('<option></option>').attr("value", "60").text("5 Years");
             $("#periods").html(option);
              $("#periods").append(option1);
              $("#periods").append(option2);
              $("#periods").append(option3);
              $("#periods").append(option4);
              $("#periods").append(option5);
              $("#periods").append(option6);
               
			$('#periods_form').show();
               $('#periods_form').attr("required", "1");
            }
        
        
          $("#plans").change(function () {
          var val=$('#plans').prop('selectedIndex');
            if(val == 0){
              var option = $('<option></option>').attr("value", "1").text("1 Months");
             $("#periods").html(option);
              $('#periods_form').hide();
            }else{
               var option = $('<option></option>').attr("value", "1").text("1 Months");
              var option1 = $('<option></option>').attr("value", "3").text("3 Months");
              var option2 = $('<option></option>').attr("value", "6").text("6 Months");
              var option3 = $('<option></option>').attr("value", "12").text("1 Years");
              var option4 = $('<option></option>').attr("value", "24").text("2 Years");
              var option5 = $('<option></option>').attr("value", "36").text("3 Years");
              var option6 = $('<option></option>').attr("value", "60").text("5 Years");
             $("#periods").html(option);
              $("#periods").append(option1);
              $("#periods").append(option2);
              $("#periods").append(option3);
              $("#periods").append(option4);
              $("#periods").append(option5);
              $("#periods").append(option6);
               
			$('#periods_form').show();
             $('#periods_form').attr("required", "1");
            }
              
      });
        
        
  $('.otp').hide();
         $('#regenerateOTP').hide();
         $("#alert").hide();
         $("#alertss").hide();
        $(".alert").hide();
});
       
        function sendOtp() {
			disableResend();
          
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // alert($('#mobile').val());
            $.ajax( {
                url:'<?php echo e(route('admin.otp'), false); ?>',
                type:'post',
                data: {'mobile': $('#mobile').val()},
                success:function(data) {
                   $(".alert").show();
                  $("#alert").show();
                    $("#alert").text(data);
                    if(data != 0){
                        $('.otp').show();
                        $('.sent-otp').hide();
                    }else{
                        alert('Mobile No or Email not found');
                    }
                },
                error:function (error) {
                    if(error.responseJSON.email){
                     $('#emailError').text(error.responseJSON.email);
                  }else if(error.responseJSON.otp){
                     $('#otpError').text(error.responseJSON.otp);
                  }
                }
            });
        }
</script>

<style>
.alert-success {
    padding: 10px !important;
    text-align: center !important;
}
.alert {
    margin-bottom: 10px !important;
}
 .with-errors{
   color:red !important;
 }
</style>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>