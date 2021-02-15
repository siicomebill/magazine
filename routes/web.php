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

    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::prefix('content')->group(function () {
            Route::middleware('role:writer')->group(function () {
                Route::prefix('articles')->group(function () {
                    Route::get('/', 'ArticleController@managerPage')->name('articles.mine.list');
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

                Route::prefix('pages')->group(function () {
                    Route::get('/', 'PageController@managerPage')->name('pages.list');
    
                    Route::get('write/{id?}', 'PageController@editItemPage')->name('pages.write');
                    Route::get('delete/{id?}', 'PageController@delete')->name('pages.delete');
    
                    Route::post('publish', 'PageController@store')->name('pages.publish');
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

            Route::prefix('users')->group(function () {
                Route::get('only/{role?}', 'UserController@managerPage')->name('user.ofRole');

                Route::prefix('roles')->group(function () {
                    Route::get('edit/{id?}', 'UserRolesController@editItemPage')->name('user.roles.write');
                    Route::post('publish', 'UserRolesController@store')->name('user.roles.publish');
                });

                Route::prefix('{userId}')->group(function () {
                    Route::prefix('articles')->group(function () {
                        Route::get('/', 'ArticleController@managerPage')->name('articles.ofUser.list');
                        Route::get('write/{id?}', 'ArticleController@editOtherItemPage')->name('articles.ofUser.write');
                        Route::get('delete/{id?}', 'ArticleController@deleteFromOther')->name('articles.ofUser.delete');

                        Route::post('publish', 'ArticleController@storeAsOther')->name('articles.ofUser.publish');
                    });
                });

                Route::get('/', 'UserController@managerPage')->name('user.list');

                Route::get('edit/{id?}', 'UserController@editItemPage')->name('user.write');
                Route::get('delete/{id?}', 'UserController@delete')->name('user.delete');

                Route::post('publish', 'UserController@store')->name('user.publish');
            });

            Route::prefix('components')->group(function () {
                Route::get('/', 'ComponentController@managerPage')->name('component.list');

                Route::get('write/{id?}', 'ComponentController@editItemPage')->name('component.write');
                Route::get('delete/{id?}', 'ComponentController@delete')->name('component.delete');

                Route::post('publish', 'ComponentController@store')->name('component.publish');
            });
        });
    });
});
