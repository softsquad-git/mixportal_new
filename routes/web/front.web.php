<?php

use Illuminate\Support\Facades\Route;

Route::get('_/{alias}', 'Front\Pages\PageController@findAlias')
    ->name('front.pages.show');
Route::get('news/{id}', 'Front\News\NewsController@show')
    ->name('front.news.show');