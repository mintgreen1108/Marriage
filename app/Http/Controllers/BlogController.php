<?php

namespace App\Http\Controllers;

use App\BlogModel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        $blog          = new BlogModel();
        $blog->user_id = $request->input('user_id');
        $blog->content = $request->input('content');
        $blog->save();
        return redirect('home/user/' . $blog->user_id);
    }
}
