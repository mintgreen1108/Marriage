<?php

Route::get('/', function () {
    return view('student/login');
});
Route::post('login', 'StudentController@login');

Route::group(['middleware' => 'check.student'], function () {
    Route::get('index', 'StudentController@index');
    Route::get('logout', 'StudentController@logout');

    Route::get('question', 'StudentController@question');
    Route::post('createQuestion', 'StudentController@createQuestion');

    Route::get('password', 'StudentController@pwd');
    Route::post('modifyPwd', 'StudentController@modifyPwd');
});