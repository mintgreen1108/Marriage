<?php

namespace App\Http\Middleware;

use Closure;

class CheckTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isset($_SESSION)) session_start();
        if (empty($_SESSION['teacher_name']) || empty($_SESSION['teacher_id'])) return redirect('student/');
        return $next($request);
    }
}
