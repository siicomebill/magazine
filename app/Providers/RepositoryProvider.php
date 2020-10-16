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
    public $bindings = [
        ResourceRepositoryInterface::class => ResourceRepository::class,
        ArticleRepositoryInterface::class => ArticleRepository::class,
        ResourceRepositoryInterface::class => SponsorRepository::class,
        ResourceRepositoryInterface::class => CategoryRepository::class,
        ResourceRepositoryInterface::class => PageRepository::class,
    ];
}
