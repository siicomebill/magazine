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

Route::get('/', 'PublicPagesController@index');

Route::prefix('categories')->group(function () {
    Route::get('/', 'CategoryController@getMinimal')->name('categories');
    Route::get('{id}', 'CategoryController@articlesOfCategory')->name('categories.articles');
});

Route::prefix('articles')->group(function () {
    Route::get('{id}', 'ArticleController@read')->name('articles.read');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::prefix('content')->group(function () {
            Route::middleware('role:writer')->group(function () {
                Route::prefix('articles')->group(function () {
                    Route::get('/', 'ArticleController@managerPage')->name('articles.list.mine');
                    Route::get('write/{id?}', 'ArticleController@editItemPage')->name('articles.write');
                    Route::get('delete/{id?}', 'ArticleController@delete')->name('articles.delete');

                    Route::post('publish', 'ArticleController@store')->name('articles.publish');
                });
            });

            Route::middleware('role:admin')->group(function () {
                Route::prefix('sponsors')->group(function () {
                    Route::get('/', 'SponsorController@managerPage')->name('sponsors.list');

                    Route::get('write/{id?}', 'SponsorController@editItemPage')->name('sponsors.write');
                    Route::get('delete/{id?}', 'SponsorController@delete')->name('sponsors.delete');

                    Route::post('publish', 'SponsorController@store')->name('sponsors.publish');
                });

                Route::prefix('categories')->group(function () {
                    Route::get('/', 'CategoryController@managerPage')->name('categories.list');
                    Route::get('write/{id?}', 'CategoryController@editItemPage')->name('categories.write');
                    Route::get('delete/{id?}', 'CategoryController@delete')->name('categories.delete');

                    Route::post('publish', 'CategoryController@store')->name('categories.publish');
                });
            });
        });

        Route::middleware('role:admin')->group(function () {
            Route::prefix('configuration')->group(function () {
                Route::get('/', 'ConfigurationController@managerPage')->name('config.list');

                Route::get('write/{id?}', 'ConfigurationController@editItemPage')->name('config.write');
                Route::get('delete/{id?}', 'ConfigurationController@delete')->name('config.delete');

                Route::post('publish', 'ConfigurationController@store')->name('config.publish');
            });
        });
    });
});
