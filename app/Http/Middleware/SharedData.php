<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

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
        Inertia::share([
            'app' => [
                'name' => env('APP_NAME', 'BILL')
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
        ]);

        return $next($request);
    }
}
