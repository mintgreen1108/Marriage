<?php

namespace App\Http\Middleware;

use Closure;

class checkAdminLogin
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
        if (empty($_SESSION['admin_name']) || empty($_SESSION['admin_id'])) return redirect('admin/login');
        return $next($request);
    }
}
