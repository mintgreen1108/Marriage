<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['admin_name']) || empty($_SESSION['admin_id'])) header("location: http://127.0.0.1:8002/admin/login");
    }
}
