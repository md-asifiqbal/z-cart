<?php
   // Auth route for customers
   Route::group(['as' => 'customer.', 'prefix' => 'customer'], function() {
      Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
      Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.social');
      Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.social.callback');
      Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
      Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

   	// Register
      Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
      Route::post('/register', 'Auth\RegisterController@register')->name('register.submit');
      Route::get('/verify/{token?}', 'Auth\RegisterController@verify')->name('verify');
      Route::post('/sendOtp-customer', 'Auth\RegisterController@sendOtp');

      // Forgot Password
      Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
     
     

     
      Route::post('password/email', 'Auth\ResetPasswordController@sendOtp')->name('password.otp');
     Route::get('password/reset/custom/{email}', 'Auth\ResetPasswordController@showResetForm')->name('custom.password.reset');
      Route::post('password/reset/custom', 'Auth\ResetPasswordController@resetCustomPass');
   });