<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Meta;

class SharedData
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
        $originalUri = Str::replaceFirst("/amp", "/", $request->getRequestUri());
        $request->canonicalUrl =  Str::replaceFirst("//", "/", $originalUri);

        $shared = [
            'app' => [
                'name' => config('app.name', 'BILL')
            ],
            'auth' => function () {
                return auth()->check();
            },
            'csrf_token' => function () {
                return session()->get('_token');
            },
            'errors' => function () {
                if (Session::get('errors')) {
                    $bags = [];

                    foreach (Session::get('errors')->getBags() as $bag => $error) {
                        $bags[$bag] = $error->getMessages();
                    }

                    return $bags;
                }

                return (object)[];
            },
        ];

        Inertia::share($shared);
        View::share($shared);

        return $next($request);
    }
}
