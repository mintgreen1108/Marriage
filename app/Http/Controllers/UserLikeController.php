<?php

namespace App\Http\Controllers;

use App\UserLikeModel;
use Illuminate\Http\Request;
use Response;

class UserLikeController extends Controller
{
    public function store(Request $request)
    {
        $userLike          = new UserLikeModel();
        $userLike->user_id = $_SESSION['user_id'];
        $userLike->blog_id = $request->input('blog_id');
        $userLike->save();
        return Response::json(['success']);
    }
}
