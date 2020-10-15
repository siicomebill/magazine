<?php

namespace App\Http\Middleware;

use App\Repositories\CategoryRepository;
use App\Repositories\ConfigurationRepository;
use Closure;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class SharedData
{
    public function __construct(ConfigurationRepository $config, CategoryRepository $category)
    {
        $this->config = $config;
        $this->category = $category;
    }

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
            'configuration' => $this->config->get(['footer', 'logo']),
            'navbar' => [
                'categories' => $this->category->important()->get(),
            ],
        ]);

        return $next($request);
    }
}
