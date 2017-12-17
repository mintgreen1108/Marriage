<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\UserModel;
use Illuminate\Http\Request;
use Response;

class UserController extends BaseController
{
    public function index()
    {
        return view('admin.user', ['data' => UserModel::all()]);
    }

    public function classification(Request $request)
    {
        $map     = ['性别' => 'sex', '年龄' => 'age', '工作' => 'job', '地区' => 'area'];
        $classes = UserModel::all()->groupBy($map[$request->input('class')]);
        foreach ($classes as $class) {
            foreach ($class as $value)
                $user[] = $value;
        }
        return view('admin.user', ['data' => $user]);
    }


    public function destroy($userId)
    {
        UserModel::destroy($userId);
        return redirect('/admin/user');
    }
}
