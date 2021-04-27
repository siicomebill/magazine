<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ServerSideRenderMiddleware
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
        $request->SSR = true;
        
        return $next($request);
    }
}
