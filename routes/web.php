<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('login');
});

Route::post('login', function (Request $request) {
    try {
        switch ($request->input('type')) {
            case 1:
                \App\ManagerModel::login($request->input('name'), $request->input('password'));
                return redirect('manager/index');
            case 2:
                \App\TeacherModel::login($request->input('name'), $request->input('password'));
                return redirect('teacher/index');
            case 3:
                \App\StudentModel::login($request->input('name'), $request->input('password'));
                return redirect('student/index');
            default:
                return false;
        }
    } catch (\Throwable $e) {
        die('用户名或密码错误');
    }
});
