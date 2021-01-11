

<?php $__env->startSection('content'); ?>
    <div class="box login-box-body">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('theme.account_login'), false); ?></h3>
        </div> <!-- /.box-header -->
        <div class="box-body">
          
                <div class="form-group has-feedback">
                    <?php echo Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email or Mobile No', 'required','id'=>"loginEmail"]); ?>

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <div class="help-block with-errors" id="loginEmailError"></div>
                </div>
                <div class="form-group has-feedback">
                    <?php echo Form::password('password', ['class' => 'form-control input-lg', 'id' => 'loginPass', 'placeholder' => trans('theme.placeholder.password'), 'data-minlength' => '6', 'required']); ?>

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <div class="help-block with-errors" id="loginpassError"></div>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <div class="form-group">
                            <label>
                                <?php echo Form::checkbox('remember', null, null, ['class' => 'icheck']); ?> <?php echo e(trans('theme.remember_me'), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <?php echo Form::submit(trans('theme.button.login'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary','onclick'=>"loginSubmit()"] ); ?>

                    </div>
                </div>
         

            <div class="social-auth-links text-center">
                <a href="<?php echo e(route('customer.login.social', 'facebook'), false); ?>" class="btn btn-block btn-social btn-facebook btn-lg btn-flat"><i class="fa fa-facebook"></i> <?php echo e(trans('theme.button.login_with_fb'), false); ?></a>
                <a href="<?php echo e(route('customer.login.social', 'google'), false); ?>" class="btn btn-block btn-social btn-google btn-lg btn-flat"><i class="fa fa-google"></i> <?php echo e(trans('theme.button.login_with_g'), false); ?></a>
            </div>
            <!-- /.social-auth-links -->

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
<?php echo $__env->make('auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/public/themes/default/views/auth/login.blade.php ENDPATH**/ ?>