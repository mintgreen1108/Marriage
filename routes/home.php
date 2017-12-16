<?php

Route::post('user/login', 'LoginController@login');
Route::get('user/logout', 'LoginController@logout');
Route::post('user/register', 'RegisterController@register');

Route::group([], function () {
    Route::resource('user', 'UserController');
    Route::resource('index', 'HomeController');
    Route::resource('blog', 'BlogController');
});
