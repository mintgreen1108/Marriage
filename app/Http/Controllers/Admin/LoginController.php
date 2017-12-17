<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        try {
            session_start();
            $admin = AdminModel::where('name', $request->input('name'))->firstOrFail();
            if (md5($request->input('password')) != $admin->password) throw new \Exception('error');
            $_SESSION['admin_name'] = $admin->name;
            $_SESSION['admin_id']   = $admin->id;
            return redirect('/admin/account');
        } catch (\Throwable $e) {
            return Response::json(['msg' => '用户名或密码错误'], 500);
        }
    }

    public function logout(Request $request)
    {
        session(['admin_name' => null]);
        session(['admin_id' => null]);
        return view('admin.login');
    }
}
