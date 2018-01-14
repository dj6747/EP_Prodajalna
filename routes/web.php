<?php

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

Route::get('/', 'HomeUnauthorizedController@index')->name('home-unauthorized');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//TODO: nastavi  middleware za admin/customer/seller

Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::get('/waiting', 'OrderController@waitingList')->name('waiting');
    Route::get('/confirmed', 'OrderController@confirmedList')->name('confirmed');
    Route::get('/cancelled', 'OrderController@cancelledList')->name('cancelled');
});

Route::resources([
    'my-profile' => 'MyProfileController',
    'sellers' => 'SellerController',
    'customers' => 'CustomerController',
    'articles' => '\App\Http\Controllers\ArticleController',
    'orders' => 'OrderController',
    'shopping-bag' => 'ShoppingBagController',
]);