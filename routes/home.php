<?php

Route::post('user/login', 'LoginController@login');
Route::get('user/logout', 'LoginController@logout');
Route::post('user/register', 'RegisterController@register');

Route::resource('user/visit', 'UserVisitController');

Route::group(['middleware' => 'check.user'], function () {
    Route::resource('user', 'UserController');
    Route::post('user/search', 'UserController@search');
    Route::get('user/focus/{id}', 'UserController@focus');
    Route::get('user/cancelFocus/{id}', 'UserController@cancelFocus');
    Route::post('user/changePwd', 'UserController@changePwd');
    Route::post('user/evaluation', 'UserController@evaluation');
    Route::resource('index', 'HomeController');
    Route::resource('blog', 'BlogController');
    Route::post('user/visit/like', 'UserLikeController@store');
    Route::resource('chat', 'UserChatController');
});
