<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class AdminController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.index', ['data' => AdminModel::all()]);
    }

    public function store(Request $request)
    {
        $admin           = new AdminModel();
        $admin->name     = $request->input('name');
        $admin->password = md5($request->input('password'));
        $admin->role     = $request->input('role');
        $admin->save();
        return redirect('/admin/account');
    }

    public function update(Request $request)
    {
        $admin           = AdminModel::find($request->input('admin_id'));
        $admin->name     = $request->input('name');
        $admin->password = md5($request->input('password'));
        $admin->role     = $request->input('role');
        $admin->save();
        return Response::json(['success'], 200);
    }

    public function show($id)
    {
        var_dump($id);
        AdminModel::destroy($id);
        return redirect('admin/account');
    }
}
