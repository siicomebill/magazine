<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AMPMiddleware
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
        $request->AMP = true;

        return $next($request);
    }
}
