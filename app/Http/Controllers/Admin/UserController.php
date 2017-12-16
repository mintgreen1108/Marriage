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
        $map  = ['性别' => 'sex', '年龄' => 'age', '工作' => 'job', '手机号' => 'mobile', '类型' => 'type', '城市' => 'province'];
        $data = (empty($_POST['class'])) ? UserModel::all() : UserModel::groupBy($map[$_POST['class']])->get();
        return view('admin.user', ['data' => $data]);
    }


    public function destroy(Request $request)
    {
        UserModel::destroy($request->input('user_id'));
        return redirect('/admin/account');
    }
}
