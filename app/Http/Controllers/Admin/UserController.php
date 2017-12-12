<?php

namespace App\Http\Controllers\Admin;

use App\UserModel;
use Illuminate\Http\Request;
use Response;

class UserController extends BaseController
{
    public function index()
    {
        return view('admin.user',['data'=>UserModel::all()]);
    }

    public function destroy(Request $request)
    {
        UserModel::destroy($request->input('user_id'));
        return redirect('/admin/account');
    }
}
