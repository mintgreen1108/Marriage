<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user               = new UserModel();
        $user->name         = $request->input('name');
        $user->password     = md5($request->input('name'));
        $user->mobile       = $request->input('mobile');
        $user->sex          = $request->input('sex');
        $user->type         = $request->input('type');
        $user->area         = $request->input('area');
        $user->job          = $request->input('job');
        $user->want         = $request->input('want');
        $user->introduction = $request->input('introduction');
        $user->save();
        dd(200);
    }
}
