<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register()
    {
        $user               = new UserModel();
        $user->name         = $_POST['name'];
        $user->password     = md5($_POST['password']);
        $user->mobile       = $_POST['mobile'];
        $user->age          = $_POST['age'];
        $user->sex          = ($_POST['sex']) ? 1 : 2;
        $user->area         = $_POST['area'];
        $user->job          = $_POST['job'];
        $user->want         = $_POST['want'];
        $user->introduction = $_POST['introduction'];
        $user->save();
        session_start();
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_id']   = $user->id;
        return redirect('home/index');
    }
}
