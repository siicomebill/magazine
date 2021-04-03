<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Resources')->group(function () {
    Route::middleware(["shared"])->group(function () {
        Route::get('/', 'PublicPagesController@index')->name('home');
        Route::get('~/{slug}', 'PublicPagesController@page')->name('page');

        Route::feeds();

        Route::prefix("sitemap")->group(function () {
            Route::get('/', 'SitemapController@main');
        });

        Route::prefix('c')->group(function () {
            Route::get('/', 'CategoryController@getMinimal')->name('categories');
            Route::get('{id}', 'CategoryController@articlesOfCategory')->name('categories.articles');
        });

        Route::prefix('u')->group(function () {
            Route::get('{id}', 'PublicPagesController@userPage')->name('user.page');
        });

        Route::prefix('a')->group(function () {
            Route::get('{id}', 'ArticleController@read')->name('articles.read');
        });
    });

    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::middleware('role:reader')->group(function () {
            Route::prefix('react')->group(function () {
                Route::post('article', 'ArticleController@react');
            });
        });
    });
});
