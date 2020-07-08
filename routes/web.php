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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['register' => false, 'verify' => false]);

Route::get('posts/{id}', 'BlogController@show')->name('post.show');

Route::resource('products', 'ProductController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', function() {
        return "user";
    });
});

