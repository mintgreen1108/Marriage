<?php

Route::post('user/login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::get('login', 'LoginController@index');

Route::group(['middleware' => 'check.admin'], function () {
    Route::resource('account', 'AdminController');
    Route::resource('user', 'UserController');
    Route::resource('advice', 'AdviceController');
    Route::resource('evaluation', 'EvaluationController');
});