<?php

namespace App\Http\Controllers\Admin;

use App\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdviceController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($search = $request->input('search', ''))) {
            $user = UserModel::where(function ($query) use ($search) {
                return $query->where('name', $search)->orWhere('mobile', $search);
            })->first();
            return view('admin.advice', ['data' => UserModel::where('introduction', 'like', '%' . $user->want . '%')->get()]);
        }
        return view('admin.advice', ['data' => []]);
    }
}
