<?php

namespace App\Http\Controllers\Admin;

use App\EvaluationModel;
use App\Http\Controllers\Controller;

class EvaluationController extends Controller
{
    public function index()
    {
        return view('admin.evaluation', ['data' => EvaluationModel::with(['user', 'evaluated'])->get()]);
    }
}
