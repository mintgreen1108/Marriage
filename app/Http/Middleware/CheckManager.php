<?php

namespace App\Http\Middleware;

use Closure;

class CheckManager
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
        if (empty($_SESSION['manager_name']) || empty($_SESSION['manager_id'])) return redirect('manager/');
        return $next($request);
    }
}
