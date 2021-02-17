<?php

use Illuminate\Support\Facades\Route;

Route::get('_/{alias}', 'Front\Pages\PageController@findAlias')
    ->name('front.pages.show');