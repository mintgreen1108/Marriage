<?php

Route::post('user/login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::resource('login', 'LoginController');
Route::resource('account', 'AdminController');
Route::resource('user', 'UserController');