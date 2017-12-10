<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class AdminController extends Controller
{

    public function index()
    {
        return Response::json(['data' => AdminModel::all()], 200);
    }

    public function store(Request $request)
    {
        $admin           = new AdminModel();
        $admin->name     = $request->input('name');
        $admin->password = md5($request->input('password'));
        $admin->role     = $request->input('role');
        $admin->save();
        return Response::json(['success'], 200);
    }
}
