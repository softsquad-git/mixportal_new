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
Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    \Illuminate\Support\Facades\App::setLocale($locale);
    return redirect()->back();
})->name('change.lang');
include 'web/admin.web.php';
Route::group(['middleware' => 'language'], function () {
    include 'web/front.web.php';
    include 'web/user.web.php';
    Route::get('/', 'HomeController@index')
        ->name('home');

    \Illuminate\Support\Facades\Auth::routes(['verify' => true]);

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/backtosearch', 'HomeController@backtosearch')->name('backtosearch');

    Route::get('/page/{page}', 'HomeController@index')->name('page');

    Route::get('/advert', 'NewAdvertController@index')->name('advert')->middleware('verified');

    Route::get('/profil', 'ProfileController@index')->name('profile');

    Route::post('/user/delete', 'ProfileController@removeUser');

    Route::post('/profil', 'ProfileController@store')->name('profile');

    Route::post('/changeEmail', 'ProfileController@changeEmail')->name('changeEmail');

    Route::get('/success', ['as' => 'success', 'uses' => 'PaymentController@paymentResponse']);


    Route::post('/advert', 'NewAdvertController@create')->middleware('verified');

    Route::get('/payment', ['as' => 'payment', 'uses' => 'PaymentController@payment']);

    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

    Route::match(['get', 'post'], 'create-news', 'NewsController@create')
        ->name('create.news');

    Route::match(['get', 'post'], 'edit-news/{id}', 'NewsController@edit')
        ->name('edit.news');

    Route::get('zgłoś', 'ReportController@index')->name('report');

    Route::post('zgłoś', 'ReportController@sendReport')->name('report');

    Route::get('news/{slug}', 'HomeController@show')->name('news');

    Route::delete('removenews/{id}', 'NewsController@delete')->name('removenews');

    Route::get('listnews', 'NewsController@list')->name('listnews');

    Route::get('ogloszenia', 'AdvertController@listByUser')->name('ogloszenia');

    Route::get('ad', 'HomeController@publicList')->name('publicList');

    Route::get('/_{name}', 'TabsController@index')->name('tabs');

    Route::get('/edytowanieZakladek', 'TabsController@list')->name('edittabs');
    Route::post('/edytowanieZakladek', 'TabsController@list')->name('edittabs');

    Route::get('listadvert', 'AdvertController@list')->name('listadvert')->middleware('admin');

    Route::get('/{slug}', 'HomeController@talent')->name('talent');

    Route::post('/question', 'HomeController@question')->name('question');

    Route::prefix('api')->middleware('auth')->group(function () {
        Route::post('/activeAdvert', 'Api\AdvertController@active');
        Route::post('/disactiveAdvert', 'Api\AdvertController@disactive');
        Route::post('/deleteAdvert', 'Api\AdvertController@delete');
        Route::post('/childCategories', 'HomeController@childCategories');
    });

    Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
        Route::group(['prefix' => 'categories'], function () {
            Route::get('all', 'CategoryController@getCategories')
                ->name('api.categories.all');
            Route::get('sub', 'CategoryController@getSubCategories')
                ->name('api.categories.sub');
        });
        Route::group(['prefix' => 'ads', 'namespace' => 'Ads'], function () {
            Route::get('all', 'AdController@all')
                ->name('api.ads.all');
        });
        Route::get('adverts/amenities', 'AdvertAmenityController@all')
            ->name('api.adverts.amenities');
    });
});