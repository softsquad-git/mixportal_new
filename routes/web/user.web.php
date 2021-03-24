<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'adverts', 'namespace' => 'Adverts'], function () {
        Route::get('all', 'AdvertController@index')
            ->name('user.adverts.index');
        Route::match(['get', 'post'], 'create/{type}', 'AdvertController@create')
            ->name('user.advert.create');
        Route::match(['get', 'post'], 'update/{id}', 'AdvertController@update')
            ->name('user.advert.update');
        Route::get('payment/{adId}', 'AdvertController@payment')
            ->name('user.advert.payment');
        Route::get('get-payment/{adId}/{type}', 'AdvertController@getPayment')
            ->name('user.advert.get_payment');
        Route::get('payment/success/{token}', 'AdvertController@success')
            ->name('payment.success');
    });
});