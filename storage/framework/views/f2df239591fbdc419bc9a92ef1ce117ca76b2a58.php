

<?php $__env->startSection('content'); ?>
  <?php if(session('status')): ?>
    <div class="alert alert-success">
      <?php echo e(session('status'), false); ?>

    </div>
  <?php endif; ?>
  <div class="box login-box-body">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo e(trans('app.form.password_reset'), false); ?></h3>
    </div> <!-- /.box-header -->
    <div class="box-body">
      
        <div class="form-group has-feedback">
          <?php echo Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email or Mobile No', 'required', 'id'=>"forgotmobile"]); ?>

          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <div class="help-block with-errors" id="forgotmobileError"></div>
        </div>

        <?php echo Form::submit('Send OTP', ['class' => 'btn btn-block btn-lg btn-flat btn-primary','onclick'=>"forgotPassword()"]); ?>

   
      <a href="<?php echo e(route('login'), false); ?>" class="btn btn-link"><?php echo e(trans('app.login'), false); ?></a>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

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
                url:'customer/sendOtp-customer',
                type:'post',
                data: {'mobile': $('#mobiles').val()},
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
                  }
                }
            });
        }
      
      function forgotPassword(){
         if( $('#forgotmobile').val()==''){
            $('#forgotmobileError').text('Field is Required.');
           return;
         }
           
        $('#forgotmobileError').text('');
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
            $.ajax( {
                url: '<?php echo e(route("password.otp"), false); ?>',
                type:'post',
                data: {
                  'mobile': $('#forgotmobile').val()
                  
                },
                success:function(data) {
                    $('#alertForgot').text(data)
                     
                     window.location.href="/password/reset/admin/"+$('#forgotmobile').val();

                    
                },
                error:function (error) {
                  if(error.responseJSON.email){
                     $('#forgotmobileError').text(error.responseJSON.email);
                  }
                  else if(error.responseJSON.errors){
                    
                  $('#forgotmobileError').text(error.responseJSON.errors.email);
                  }
                  
                }
            });
      }
      
      function submit() {
          
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // alert($('#mobile').val());
            $.ajax( {
                url:'customer/register',
                type:'post',
                data: {
                  'name': $('#name').val(),
                  'email': $('#mobiles').val(),
                  'password': $('#password').val(),
                  'password_confirmation': $('#password_confirmation').val(),
                  'otp': $('#otp').val(),
                  'agree': $('#agree').val(),
                  'subscribe': $('#subscribe').val()
                  
                },
                success:function(data) {
                   $(".alert").show();
                  $("#alert").show();
                  
                    $("#alert").text(data);
                     $("#alertss").hide();
                     window.location.href="/";

                    
                },
                error:function (error) {
                  if(error.responseJSON.email){
                     $('#emailError').text(error.responseJSON.email);
                  }
                  else if(error.responseJSON.otp){
                     $('#otpError').text(error.responseJSON.otp);
                  }else{
                  $('#nameError').text(error.responseJSON.errors.name);
                  $('#emailError').text(error.responseJSON.errors.email);
                  $('#otpError').text(error.responseJSON.errors.otp);
                  $('#agreeError').text(error.responseJSON.errors.agree);
                  $('#pscError').text(error.responseJSON.errors.password);
                  }
                  
                }
            });
        }
      
      
      
      
      
      
      function loginSubmit(){
        $('#loginEmailError').text('');
        $('#loginpassError').text('');
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
            $.ajax( {
                url: '<?php echo e(route("customer.login.submit"), false); ?>',
                type:'post',
                data: {
                  'email': $('#loginEmail').val(),
                  'password': $('#loginPass').val(),
                  'remember': $('#remeber').val()
                  
                },
                success:function(data) {
                     window.location.href="/";

                    
                },
                error:function (error) {
                  if(error.responseJSON.email){
                     $('#loginEmailError').text(error.responseJSON.email);
                  }
                  else if(error.responseJSON.errors){
                    
                  $('#loginEmailError').text(error.responseJSON.errors.email);
                  $('#loginpassError').text(error.responseJSON.errors.password);
                  }
                  
                }
            });
      }
      
    </script>
<style>
  .help-block{
    color:red !important;
  }

.alert-success {
    padding: 10px !important;
    text-align: center !important;
}
.alert {
    margin-bottom: 10px !important;
}

</style>
<?php echo $__env->make('auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>