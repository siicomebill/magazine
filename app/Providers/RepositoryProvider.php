<?php

namespace App\Providers;

use App\Interfaces\Repositories\ArticleRepositoryInterface;
use App\Interfaces\Repositories\ResourceRepositoryInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ResourceRepository;
use App\Repositories\SponsorRepository;
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
        $this->app->bind(ResourceRepositoryInterface::class, SponsorRepository::class);
        $this->app->bind(ResourceRepositoryInterface::class, CategoryRepository::class);
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
