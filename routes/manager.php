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
});

Route::get('test', function () {
    dd(md5('123456'));
});
