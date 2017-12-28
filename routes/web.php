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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//TODO: nastavi  middleware za admin/customer/seller

Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::get('/waiting', 'OrderController@waitingList')->name('waiting');
    Route::get('/confirmed', 'OrderController@confirmedList')->name('confirmed');
});

Route::resources([
    'my-profile' => 'MyProfileController',
    'sellers' => 'SellerController',
    'customers' => 'CustomerController',
    'articles' => 'ArticleController',
    'orders' => 'OrderController',
]);