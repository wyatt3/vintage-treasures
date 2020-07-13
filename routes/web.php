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

Route::resource('products', 'ProductController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', function() {
        return "user";
    })->name('admin');
});

