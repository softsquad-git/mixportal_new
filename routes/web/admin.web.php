<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('', 'AdminController@index')
        ->name('admin.index');

    #CATEGORIES
    Route::group(['prefix' => 'categories', 'namespace' => 'Categories'], function () {
        Route::get('all', 'CategoryController@index')
            ->name('admin.categories.index');
        Route::match(['post', 'get'], 'create', 'CategoryController@create')
            ->name('admin.categories.create');
        Route::match(['post', 'get'], 'update/{id}', 'CategoryController@update')
            ->name('admin.categories.update');
        Route::delete('remove/{id}', 'CategoryController@delete')
            ->name('admin.categories.delete');
    });

    #PAGES
    Route::group(['prefix' => 'pages', 'namespace' => 'Pages'], function () {
        Route::get('all', 'PageController@index')
            ->name('admin.pages.index');
        Route::match(['get', 'post'], 'create', 'PageController@create')
            ->name('admin.pages.create');
        Route::match(['get', 'post'], 'update/{id}', 'PageController@update')
            ->name('admin.pages.update');
        Route::delete('remove/{id}', 'PageController@delete')
            ->name('admin.pages.delete');
    });

    #NEWS
    Route::group(['prefix' => 'news', 'namespace' => 'News'], function () {
        Route::get('all', 'NewsController@index')
            ->name('admin.news.index');
        Route::match(['get', 'post'], 'create', 'NewsController@create')
            ->name('admin.news.create');
        Route::match(['get', 'post'], 'update/{id}', 'NewsController@update')
            ->name('admin.news.update');
        Route::delete('remove/{id}', 'NewsController@delete')
            ->name('admin.news.delete');
    });

    #USERS
    Route::group(['prefix' => 'users', 'namespace' => 'Users'], function () {
        Route::get('all', 'UserController@index')
            ->name('admin.users.index');
    });

    #SETTINGS
    Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function () {
        Route::get('', 'SettingController@index')
            ->name('admin.settings.index');
        Route::post('update-data', 'SettingController@save')
            ->name('admin.settings.save');
        Route::post('setting-page/{id?}', 'SettingController@saveSettingPage')
            ->name('admin.settings.page');
    });
});