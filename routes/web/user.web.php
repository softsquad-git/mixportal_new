<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'adverts', 'namespace' => 'Adverts'], function () {
        Route::get('all', 'AdvertController@index')
            ->name('user.adverts.index');
        Route::match(['get', 'post'], 'create/{type}', 'AdvertController@create')
            ->name('user.advert.create');
    });
});