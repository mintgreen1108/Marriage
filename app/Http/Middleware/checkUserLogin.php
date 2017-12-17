<?php

namespace App\Http\Middleware;

use Closure;

class checkUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isset($_SESSION)) session_start();
        if (empty($_SESSION['user_name']) || empty($_SESSION['user_id'])) return redirect('/user/login');
        return $next($request);
    }
}
