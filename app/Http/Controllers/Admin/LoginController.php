<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class LoginController extends Controller
{
    public function create()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        try {
            session_start();
            $admin = AdminModel::where('name', $request->input('name'))->firstOrFail();
            if (md5($request->input('password')) != $admin->password) throw new \Exception('error');
//            setcookie('admin_name', $admin->admin_name, 60 * 60 * 24, '/');
//            setcookie('admin_id', $admin->admin_id, 60 * 60 * 24, '/');
            session(['admin_name' => $admin->name]);
            session(['admin_id' => $admin->id]);
            return redirect('/admin/account');
        } catch (\Throwable $e) {
            return Response::json(['msg' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request)
    {
        session(['admin_name' => null]);
        session(['admin_id' => null]);
        return view('admin.login');
    }
}
