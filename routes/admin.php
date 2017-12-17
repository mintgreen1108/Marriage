<?php

Route::post('user/login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::get('login', 'LoginController@index');

Route::group(['middleware' => 'check.admin'], function () {
    Route::resource('account', 'AdminController');
    Route::resource('user', 'UserController');
    Route::get('user/delete/{id}', 'UserController@destroy');
    Route::post('user/classification', 'UserController@classification');
    Route::resource('advice', 'AdviceController');
    Route::resource('evaluation', 'EvaluationController');
});