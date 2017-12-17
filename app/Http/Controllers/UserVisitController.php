<?php

namespace App\Http\Controllers;

use App\BlogModel;
use App\UserModel;
use App\UserVisitModel;
use Illuminate\Http\Request;

class UserVisitController extends Controller
{
    public function show($userId)
    {
        session_start();
        if ($_SESSION['user_id'] != $userId) {
            $visit                  = new UserVisitModel();
            $visit->user_id         = $_SESSION['user_id'];
            $visit->visited_user_id = $userId;
            $visit->save();
        }

        $user = UserModel::where('id', $userId)->firstOrFail();
        $blog = BlogModel::where('user_id', $userId)->orderBy('id', 'desc')->get();
        return view('visit', ['user' => $user, 'blog' => $blog]);
    }
}
