<?php

Route::get('login', 'LoginController@index');
Route::post('user/login', 'LoginController@login');
Route::get('user/logout', 'LoginController@logout');
Route::get('register', 'RegisterController@index');
Route::post('user/register', 'RegisterController@register');


Route::group(['middleware' => 'check.user'], function () {
    Route::resource('user', 'UserController');
});
