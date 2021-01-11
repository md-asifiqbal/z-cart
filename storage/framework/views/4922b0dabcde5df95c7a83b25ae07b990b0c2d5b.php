<div class="modal auth-modal fade" id="loginModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="modal-title"><?php echo e(trans('theme.account_login'), false); ?></span>
      </div>
      <div class="modal-body">
     
          <div class="form-group">
              <input id="loginEmail" name="email"  class="form-control input-lg flat" type="text" placeholder="Email or Mobile No" required/>
              <div class="help-block with-errors" id="loginEmailError"></div>
          </div>
          <div class="form-group">
              <input id="loginPass" name="password"  class="form-control input-lg flat" type="password" placeholder="<?php echo e(trans('theme.placeholder.password'), false); ?>" required/>
              <div class="help-block with-errors" id="loginpassError"></div>
          </div>

          <div class="row">
            <div class="col-xs-7">
              <div class="form-group">
                <label>
                  <input name="remeber" id="remeber" class="i-check-blue" type="checkbox"/> <?php echo e(trans('theme.remember_me'), false); ?>

                </label>
              </div>
            </div>
            <div class="col-xs-5">
                <input class="btn btn-block btn-lg flat btn-primary" onclick="loginSubmit()" type="submit" value="<?php echo e(trans('theme.button.login'), false); ?>">
            </div>
          </div>
      
        <div class="row">
          <a href="javascript:void(0);" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#passwordResetModal"><?php echo e(trans('theme.forgot_password'), false); ?></a>
          <a href="javascript:void(0);" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#createAccountModal"><?php echo e(trans('theme.register_here'), false); ?></a>
        </div>

        <div class="social-auth-links text-center">
          <div class="row">
            <div class="col-xs-6 nopadding-right">
              <a href="<?php echo e(route('customer.login.social', 'facebook'), false); ?>" class="btn btn-block btn-social btn-facebook btn-lg flat"><i class="fa fa-facebook"></i> <?php echo e(trans('theme.button.login_with_fb'), false); ?></a>
            </div>
            <div class="col-xs-6 nopadding-left">
              <a href="<?php echo e(route('customer.login.social', 'google'), false); ?>" class="btn btn-block btn-social btn-google btn-lg flat"><i class="fa fa-google"></i> <?php echo e(trans('theme.button.login_with_g'), false); ?></a>
            </div>
          </div>
        </div>
      </div><!-- /.modal-body -->

      <div class="modal-footer">
        <?php if(config('app.demo') == TRUE): ?>
            <h4>Demo Login::</h4>
            <p>Username: <strong>customer@demo.com</strong> | Password: <strong>123456</strong> </p>
        <?php endif; ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /#loginModal -->

<div class="modal auth-modal fade" id="createAccountModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="modal-title"><?php echo e(trans('theme.create_account'), false); ?></span>
      </div>
      <div class="modal-body">
        <div class="alert">
          <p class="alert-success" id="alert">
            
          </p>
        </div>
          <div class="form-group">
            <input id="name" name="name" class="form-control input-lg flat" placeholder="<?php echo e(trans('theme.placeholder.full_name'), false); ?>" type="text" required/>
            <div class="help-block with-errors" id="nameError"></div>
          </div>
          <div class="form-group">
            <input id="mobiles" name="email" class="form-control input-lg flat" placeholder="Email or Mobile No" type="text" required/>
            <div class="help-block with-errors" id="emailError">
              
            
          </p>
            </div>
          </div>
          <div class="form-group">
            <input id="password" name="password" class="form-control input-lg flat" placeholder="<?php echo e(trans('theme.placeholder.password'), false); ?>" type="password" required/>
            <div class="help-block with-errors id="passwordError""></div>
          </div>
          <div class="form-group">
            <input id="password_confirmation" name="password_confirmation" class="form-control input-lg flat" placeholder="<?php echo e(trans('theme.placeholder.confirm_password'), false); ?>" type="password" required/>
            <div class="help-block with-errors" id="pscError"></div>
          </div>
          <div class="form-group has-feedback otp">
            <?php echo Form::text('otp', null, ['class' => 'form-control input-lg', 'placeholder' => 'OTP','required','id'=>'otp']); ?>

            <div class="help-block with-errors otp-error" id="otpError">
       <button id="regenerateOTP" class="btn btn-danger btn_shadow" style="border-radius: 0;" onclick="sendOtp()" >Resend OTP <span id="timer"></span></button> 
        </div>
      </div>
          <?php if(config('system_settings.ask_customer_for_email_subscription')): ?>
            <div class="form-group">
              <label>
                <input id="subscribe" name="subscribe" class="i-check-blue" type="checkbox"/> <?php echo e(trans('theme.input_label.subscribe_to_the_newsletter'), false); ?>

              </label>
            </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-xs-7">
              <div class="form-group">
                <label>
                  <input id="agree" name="agree" class="i-check-blue" type="checkbox" required/> <?php echo trans('theme.input_label.i_agree_with_terms', ['url' => route('page.open', \App\Page::PAGE_TNC_FOR_CUSTOMER)]); ?>

                </label>
                <div class="help-block with-errors" id="agreeError"></div>
              </div>
            </div>
            <div class="col-xs-5 ">
              <input class="btn btn-block btn-lg flat btn-primary sent-otp" onclick="sendOtp()" type="button" value="<?php echo e(trans('theme.create_account'), false); ?>" />
           
              <input class="btn btn-block btn-lg flat btn-primary otp" type="button" onclick="submit()" value="Verify Account" />
            </div>
          </div>
    

        <div class="row">
          <a href="javascript:void(0);" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#loginModal"><?php echo e(trans('theme.have_account'), false); ?></a>
        </div>

        <div class="social-auth-links text-center">
          <div class="row">
            <div class="col-xs-6 nopadding-right">
              <a href="<?php echo e(route('customer.login.social', 'facebook'), false); ?>" class="btn btn-block btn-social btn-facebook btn-lg flat"><i class="fa fa-facebook"></i> <?php echo e(trans('theme.button.login_with_fb'), false); ?></a>
            </div>
            <div class="col-xs-6 nopadding-left">
              <a href="<?php echo e(route('customer.login.social', 'google'), false); ?>" class="btn btn-block btn-social btn-google btn-lg flat"><i class="fa fa-google"></i> <?php echo e(trans('theme.button.login_with_g'), false); ?></a>
            </div>
          </div>
        </div>
      </div><!-- /.modal-body -->
      <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /#createAccountModal -->

<div class="modal auth-modal fade" id="passwordResetModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="modal-title"><?php echo e(trans('theme.password_recovery'), false); ?></span>
      </div>
      <div class="modal-body">
           <div class="alert">
          <p class="alert-success" id="alertForgot">
            
          </p>
        </div>
          <div class="form-group">
            <input name="email" class="form-control input-lg flat" placeholder="Email or Mobile No" type="text" required id="forgotmobile" />
            <div class="help-block with-errors" id="forgotmobileError"></div>
          </div>
          <input class="btn btn-block flat btn-primary" onclick="forgotPassword()" type="button" value="<?php echo e(trans('theme.button.recover_password'), false); ?>" />
     
      </div><!-- /.modal-body -->
      <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /#passwordResetModal -->

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
                url: '<?php echo e(route("customer.password.otp"), false); ?>',
                type:'post',
                data: {
                  'mobile': $('#forgotmobile').val()
                  
                },
                success:function(data) {
                    $('#alertForgot').text(data)
                     
                     window.location.href="/customer/password/reset/custom/"+$('#forgotmobile').val();

                    
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

</style><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/auth/modals.blade.php ENDPATH**/ ?>