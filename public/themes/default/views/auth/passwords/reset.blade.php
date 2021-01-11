@extends('auth.layout')

@section('content')
<div class="box login-box-body">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('theme.password_reset') }}</h3>
    </div> <!-- /.box-header -->
    <div class="box-body">
      <div class="alert">
        <p class="alert-success">
          OTP send to your mobile or email.
        </p>
      </div>

        {!! Form::open(['url' => 'customer/password/reset/custom', 'id' => 'form', 'data-toggle' => 'validator','method'=>'post']) !!}
            {!! Form::hidden('email', $email) !!}
            <div class="form-group has-feedback">
                {!! Form::text('otp', null, ['class' => 'form-control input-lg', 'placeholder' => 'OTP', 'required']) !!}
                <span class="glyphicon glyphicon-mobile form-control-feedback"></span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
              {!! Form::password('password', ['class' => 'form-control input-lg', 'id' => 'password', 'placeholder' => trans('theme.placeholder.password'), 'data-minlength' => '6', 'required']) !!}
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
              {!! Form::password('password_confirmation', ['class' => 'form-control input-lg', 'placeholder' => trans('theme.placeholder.confirm_password'), 'data-match' => '#password', 'required']) !!}
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <div class="help-block with-errors"></div>
            </div>

            {!! Form::submit(trans('theme.password_reset'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
