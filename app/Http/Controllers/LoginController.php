<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Response;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        try {
            session_start();
            $user = UserModel::where('name', $request->input('name'))->firstOrFail();
            if (md5($request->input('password')) != $user->password) throw new \Exception('error');
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_id']   = $user->id;
            return redirect('/home/index');
        } catch (\Throwable $e) {
            return Response::json(['msg' => '用户名或密码错误'], 500);
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
        return redirect('/login');
    }
}
