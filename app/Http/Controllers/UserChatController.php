<?php

namespace App\Http\Controllers;

use App\UserChatModel;
use App\UserFocusModel;
use App\UserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserChatController extends Controller
{
    public function index()
    {
        $users = UserFocusModel::where('user_id', $_SESSION['user_id'])->with('focused_user')->get();
        return view('chat', ['users' => $users]);
    }

    public function show($sendId)
    {
        $list = UserChatModel::where(function ($query) use ($sendId) {
            return $query->where('user_id', $_SESSION['user_id'])
                ->where('send_to', $sendId);
        })->orWhere(function ($query) use ($sendId) {
            return $query->where('user_id', $sendId)
                ->where('send_to', $_SESSION['user_id']);
        })->with(['user', 'send_to'])
            ->get();
        return view('chat_temp', ['list' => $list, 'send_to' => $sendId]);
    }

    public function store(Request $request)
    {
        $chat          = new UserChatModel();
        $chat->user_id = $_SESSION['user_id'];
        $chat->content = $request->input('content');
        $chat->send_to = $request->input('send_to');
        $chat->save();
        return \Response::json([
            'user'       => $_SESSION['user_name'],
            'created_at' => Carbon::now()->toDateTimeString(),
            'content'    => $chat->content
        ]);
    }
}
