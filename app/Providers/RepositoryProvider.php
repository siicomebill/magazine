<?php

namespace App\Providers;

use App\Interfaces\Repositories\ResourceRepositoryInterface;
use App\Repositories\ResourceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResourceRepositoryInterface::class, ResourceRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
