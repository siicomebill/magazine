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
        //NOTE This middleware is only needed to individuate AMP pages
        return $next($request);
    }
}
