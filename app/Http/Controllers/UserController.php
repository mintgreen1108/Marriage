<?php

namespace App\Http\Controllers;

use App\BlogModel;
use App\UserModel;
use App\UserVisitModel;
use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{
    public function show($userId)
    {
        try {
            session_start();
            $user = UserModel::where('id', $userId)->firstOrFail();
            $blog = BlogModel::where('user_id', $userId)->get();

            if ($_SESSION['user_id'] != $userId) {
                $visit                  = new UserVisitModel();
                $visit->user_id         = $_SESSION['user_id'];
                $visit->visited_user_id = $userId;
                $visit->save();
            }

            $visit = UserVisitModel::where('visited_user_id', $userId)->with(['user', 'visitedUser'])->get()->groupBy('user_id');

            return view('user', [
                'user'  => $user,
                'blog'  => $blog,
                'visit' => $visit
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Response::json(['data' => 'error'], 500);
        }
    }
}
