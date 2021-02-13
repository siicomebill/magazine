<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AMP Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "amp" middleware group. Now create something great!
|
*/

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
