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
Auth::routes(['register' => false, 'verify' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::post('getQuote', 'HomeController@getQuote')->name('quote');

Route::group(['prefix' => 'posts'], function() {
    Route::get('/', 'BlogController@index')->name('posts');
    Route::get('{id}', 'BlogController@show')->name('post.show');
});

Route::post('setCart', 'ProductController@setCart');
Route::get('getCart', 'ProductController@getCart')->name('shoppingCart');
Route::resource('products', 'ProductController');
Route::post('checkout', 'ProductController@checkout')->name('shop.checkout');

Route::get('createIntent/{total}', function($total) {
    \Stripe\Stripe::setApiKey('sk_test_51GzRrlCOrb9xObT3mTSlaEpGNzSkJBYUzTvYvIhOHAGUwB9GpClojkhGdcYvRnWa6cxET5otugExTBlx6DoNOTrK00NK7rvf6t');
    
    $intent = \Stripe\PaymentIntent::create([
      'amount' => $total,
      'currency' => 'usd',
    ]);
    return json_encode(array('client_secret' => $intent->client_secret));
});

Route::post('order', 'ProductController@order')->name('order');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', function() {
        return "user";
    })->name('admin');
});

