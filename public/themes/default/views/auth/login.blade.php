@extends('auth.layout')

@section('content')
    <div class="box login-box-body">
        <div class="box-header with-border">
          <h3 class="box-title">{{ trans('theme.account_login') }}</h3>
        </div> <!-- /.box-header -->
        <div class="box-body">
          
                <div class="form-group has-feedback">
                    {!! Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email or Mobile No', 'required','id'=>"loginEmail"]) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <div class="help-block with-errors" id="loginEmailError"></div>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::password('password', ['class' => 'form-control input-lg', 'id' => 'loginPass', 'placeholder' => trans('theme.placeholder.password'), 'data-minlength' => '6', 'required']) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <div class="help-block with-errors" id="loginpassError"></div>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <div class="form-group">
                            <label>
                                {!! Form::checkbox('remember', null, null, ['class' => 'icheck']) !!} {{ trans('theme.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        {!! Form::submit(trans('theme.button.login'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary','onclick'=>"loginSubmit()"] ) !!}
                    </div>
                </div>
         

            <div class="social-auth-links text-center">
                <a href="{{ route('customer.login.social', 'facebook') }}" class="btn btn-block btn-social btn-facebook btn-lg btn-flat"><i class="fa fa-facebook"></i> {{ trans('theme.button.login_with_fb') }}</a>
                <a href="{{ route('customer.login.social', 'google') }}" class="btn btn-block btn-social btn-google btn-lg btn-flat"><i class="fa fa-google"></i> {{ trans('theme.button.login_with_g') }}</a>
            </div>
            <!-- /.social-auth-links -->

        </div>
    </div>


@endsection

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
                url: '{{route("customer.login.submit")}}',
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