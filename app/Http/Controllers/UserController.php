<?php

namespace App\Http\Controllers;

use App\BlogModel;
use App\EvaluationModel;
use App\User;
use App\UserFocusModel;
use App\UserLikeModel;
use App\UserModel;
use App\UserVisitModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{
    public function show($userId)
    {
        try {
            $user = UserModel::where('id', $userId)->firstOrFail();
            $blog = BlogModel::where('user_id', $userId)->orderBy('id', 'desc')->get();

            $visit = UserVisitModel::where('visited_user_id', $userId)->with(['user', 'visitedUser'])->orderBy('id', 'desc')->get()->groupBy('user_id');

            $like = UserLikeModel::select('user_like.user_id')->leftJoin('blog', 'blog.id', '=', 'user_like.blog_id')
                ->where('blog.user_id', $userId)
                ->where('user_like.user_id', '<>', $userId)
                ->with('user')
                ->get()
                ->groupBy('user_id');

            $focus = UserFocusModel::where('user_id', $_SESSION['user_id'])
                ->where('focused_id', '<>', $_SESSION['user_id'])
                ->with('focused_user')
                ->get();

            return view('user', [
                'user'  => $user,
                'blog'  => $blog,
                'visit' => $visit,
                'like'  => $like,
                'focus' => $focus
            ]);
        } catch (\Exception $e) {
            return Response::json(['data' => 'error'], 500);
        }
    }

    public function search(Request $request)
    {
        $users = ((is_numeric($request->input('search'))) ?
            UserModel::where('mobile', 'like', '%' . $request->input('search') . '%') :
            UserModel::where('name', 'like', '%' . $request->input('search') . '%'))
            ->get();
        return Response::json(['users' => $users]);
    }

    public function focus($userId)
    {
        if (!empty(UserFocusModel::where('user_id', $_SESSION['user_id'])->where('focused_id', $userId)->first()))
            return redirect('home/user/' . $_SESSION['user_id']);
        $userFocus             = new UserFocusModel();
        $userFocus->user_id    = $_SESSION['user_id'];
        $userFocus->focused_id = $userId;
        $userFocus->save();
        return redirect('home/user/' . $_SESSION['user_id']);
    }

    public function cancelFocus($userId)
    {
        if (empty($userFocus = UserFocusModel::where('user_id', $_SESSION['user_id'])->where('focused_id', $userId)->first()))
            return redirect('home/user/' . $_SESSION['user_id']);
        $userFocus->delete();
        return redirect('home/user/' . $_SESSION['user_id']);
    }

    public function changePwd(Request $request)
    {
        $user           = UserModel::find($_SESSION['user_id']);
        $user->password = md5($request->input('password'));
        $user->save();
        return Response::json(['success']);
    }

    public function evaluation(Request $request)
    {
        try {
            $user                    = UserModel::where('name', $request->input('name'))->firstOrFail();
            $evaluation              = new EvaluationModel();
            $evaluation->user_id     = $_SESSION['user_id'];
            $evaluation->content     = $request->input('content');
            $evaluation->score       = $request->input('score');
            $evaluation->evaluate_to = $user->id;
            $evaluation->save();
            return Response::json(['status' => 200]);
        } catch (ModelNotFoundException $e) {
            return Response::json(['status' => 404]);
        }
    }
}
