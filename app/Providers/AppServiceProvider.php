<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        App\Interfaces\Services\ImageServiceInterface::class => App\Services\CloudinaryImageService::class,
    ];
}
