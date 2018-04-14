<?php

namespace App\Http\Controllers;


use App\ClassModel;
use App\ManagerModel;
use App\StudentModel;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager/index', ['data' => StudentModel::all(), 'classes' => ClassModel::all()]);
    }

    public function login(Request $request)
    {
        try {
            session_start();
            $user = ManagerModel::where('name', $request->input('name'))->firstOrFail();
            if (md5($request->input('password')) != $user->password) throw new \Exception('error');
            $_SESSION['manager_name'] = $user->name;
            $_SESSION['manager_id']   = $user->id;
            return redirect('manager/index');
        } catch (\Throwable $e) {
            return \Response::json(['msg' => '用户名或密码错误'], 500);
        }
    }

    public function logout()
    {
        unset($_SESSION['manager_name']);
        unset($_SESSION['manager_name']);
        return redirect('manager/');
    }

    public function createStudent(Request $request)
    {
        $student           = empty($request->input('id')) ? new StudentModel() : StudentModel::where('id', $request->input('id'))->first();
        $student->name     = $request->input('name');
        $student->password = md5('123456');
        $student->sex      = $request->input('sex');
        $student->age      = $request->input('age');
        $student->class_id = $request->input('class_id');
        $student->save();
        return redirect('manager/index');
    }

    public function deleteStudent($id)
    {
        StudentModel::where('id', $id)->delete();
        return redirect('manager/index');
    }
}
