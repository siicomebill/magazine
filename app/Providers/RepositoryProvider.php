<?php

namespace App\Providers;

use App\Http\Controllers\ArticleController;
use App\Interfaces\Repositories\ArticleRepositoryInterface;
use App\Interfaces\Repositories\ResourceRepositoryInterface;
use App\Repositories\ArticleRepository;
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
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
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
