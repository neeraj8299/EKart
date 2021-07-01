<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HaveUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!is_null(auth()->user()) && auth()->user()->is_admin == 'yes') {
            abort(401);
        }
        return $next($request);
    }
}
