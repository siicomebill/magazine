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

Route::get('/', 'PublicPagesController@index')->name('amp.home');
Route::get('~/{slug}', 'PublicPagesController@page')->name('amp.page');

Route::prefix('c')->group(function () {
    Route::get('/', 'CategoryController@getMinimal')->name('amp.categories');
    Route::get('{id}', 'CategoryController@articlesOfCategory')->name('amp.categories.articles');
});

Route::prefix('u')->group(function () {
    Route::get('{id}', 'PublicPagesController@userPage')->name('amp.user.page');
});

Route::prefix('a')->group(function () {
    Route::get('{id}', 'ArticleController@read')->name('amp.articles.read');
});