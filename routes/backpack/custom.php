<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
        'role:admin',
    ]   ,
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    Route::crud('article', 'ArticleCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('component', 'ComponentCrudController');
    Route::crud('configuration', 'ConfigurationCrudController');
    Route::crud('page', 'PageCrudController');
    Route::crud('sponsor', 'SponsorCrudController');
}); // 🛑 This should remain the last line of the file. 🛑