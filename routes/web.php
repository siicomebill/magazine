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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::prefix('content')->middleware('role:writer')->group(function () {
            Route::prefix('articles')->group(function () {
                Route::get('/', 'ArticleController@mine')->name('articles.list.mine');
                Route::get('write/{id?}', 'ArticleController@newArticlePage')->name('articles.write');
                Route::get('delete/{id?}', 'ArticleController@delete')->name('articles.delete');

                Route::post('publish', 'ArticleController@store')->name('articles.publish');
            });
        });
    });
});
