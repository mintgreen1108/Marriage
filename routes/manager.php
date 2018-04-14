<?php

Route::get('/', function () {
    return view('manager/login');
});
Route::post('login', 'ManagerController@login');

Route::group(['middleware' => 'check.manager'], function () {
    Route::get('index', 'ManagerController@index');
    Route::get('logout', 'ManagerController@logout');
    Route::post('createStudent', 'ManagerController@createStudent');
    Route::get('deleteStudent/{id}', 'ManagerController@deleteStudent');

    Route::get('teacher', 'ManagerController@teacher');
    Route::post('createTeacher', 'ManagerController@createTeacher');
    Route::get('deleteTeacher/{id}', 'ManagerController@deleteTeacher');

    Route::get('course', 'ManagerController@course');
    Route::post('createCourse', 'ManagerController@createCourse');
    Route::get('deleteCourse/{id}', 'ManagerController@deleteCourse');

    Route::get('class', 'ManagerController@class');
    Route::post('createClass', 'ManagerController@createClass');
    Route::get('deleteClass/{id}', 'ManagerController@deleteClass');

    Route::get('message', 'ManagerController@message');
    Route::post('createMessage', 'ManagerController@createMessage');
});

Route::get('test', function () {
    dd(md5('123456'));
});
