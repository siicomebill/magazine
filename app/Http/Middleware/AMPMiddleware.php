<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $request->SSR = true;

        $originalUri = Str::replaceFirst("/amp", "/", $request->getRequestUri());
        $request->canonicalUrl =  Str::replaceFirst("//", "/", $originalUri);

        return $next($request);
    }
}
