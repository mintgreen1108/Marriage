<?php

Route::get('/', function () {
    return view('teacher/login');
});
Route::post('login', 'TeacherController@login');

Route::group(['middleware' => 'check.teacher'], function () {
    Route::get('index', 'TeacherController@index');
    Route::get('logout', 'TeacherController@logout');


    Route::get('password', 'TeacherController@pwd');
    Route::post('modifyPwd', 'TeacherController@modifyPwd');

    Route::get('reply', 'TeacherController@reply');
    Route::post('createReply', 'TeacherController@createReply');

    Route::get('score', 'TeacherController@score');
    Route::post('createScore', 'TeacherController@createScore');
    Route::post('search', 'TeacherController@search');
});