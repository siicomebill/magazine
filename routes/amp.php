<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ssr Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "ssr" middleware group. Now create something great!
|
*/

Route::get('/', 'PublicPagesController@index')->name('ssr.home');
Route::get('~/{slug}', 'PublicPagesController@page')->name('ssr.page');

Route::prefix('c')->group(function () {
    Route::get('/', 'CategoryController@getMinimal')->name('ssr.categories');
    Route::get('{id}', 'CategoryController@articlesOfCategory')->name('ssr.categories.articles');
});

Route::prefix('u')->group(function () {
    Route::get('{id}', 'PublicPagesController@userPage')->name('ssr.user.page');
});

Route::prefix('a')->group(function () {
    Route::get('{id}', 'ArticleController@read')->name('ssr.articles.read');
});