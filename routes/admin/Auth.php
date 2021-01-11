<?php
	// Admin User Auth
	Route::auth();
   	Route::get('/register/{plan?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::get('/verify/{token?}', 'Auth\RegisterController@verify')->name('verify');
	Route::get('/logout' , 'Auth\LoginController@logout');
	Route::post('sendOtp', 'Auth\RegisterController@sendOtp')->name('admin.otp');

  
  Route::post('submitBkash', 'Auth\RegisterController@submitBkash')->name('admin.submitBkash');


   Route::post('admin/password/email', 'Auth\ResetPasswordController@sendOtp')->name('password.otp');
     Route::get('password/reset/admin/{email}', 'Auth\ResetPasswordController@showResetForm')->name('custom.password.reset');
      Route::post('password/reset/admin', 'Auth\ResetPasswordController@resetCustomPass');