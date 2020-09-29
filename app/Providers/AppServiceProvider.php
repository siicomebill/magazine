<?php

namespace App\Providers;

use App\Repositories\ConfigurationRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ConfigurationRepository $config)
    {
        Inertia::share([
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
    }
}
