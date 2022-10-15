<?php

Route::group(['namespace' => 'Deliveryman'], function() {
    Route::get('/', 'HomeController@index')->name('deliveryman.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('deliveryman.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('deliveryman.logout');

    // Register
    /* Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('deliveryman.register');
    Route::post('register', 'Auth\RegisterController@register'); */

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('deliveryman.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('deliveryman.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('deliveryman.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('deliveryman.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('deliveryman.verification.notice');
    Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('deliveryman.verification.verify');

    /* Update edited Deliveryman Profile */
    Route::post('/updateProfile','HomeController@updateProfile')->name('deliveryman.updateProfile');
    Route::get('/myOrder','HomeController@myOrder')->name('deliveryman.myOrder');
    Route::get('/completeOrder/orderId/{orderId}','HomeController@completeOrder')->name('deliveryman.completeOrder');
});