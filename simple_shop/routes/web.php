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

Route::get('/fff', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/search', 'HomeController@search')->name('search');



//Route::get('/product-details', function () {
//    return view('product-details');
//});


Route::get('/product-details/{id}/User-id/{ProductsUserID}', 'ProductController@show')->name('show.product');

Route::post('/product-details/{ProductsID}/User-id/{id}', 'ReviewController@store')->name('review.add');


//
//Route::get('/profile/edit', 'ProfileController@create');
//Route::post('/profile', 'ProfileController@store');
//Route::get('/profile/{id}',"ProfileController@show");






Route::middleware('auth')->group(function (){

    Route::get('/product/add','ProductController@create')->name('add.products');
    Route::post('/product/add','ProductController@store');
    Route::get('/products','ProductController@index')->name('view.products');
    Route::get('/products-edit/{id}','ProductController@edit')->name('edit.products');
    Route::put('/products-edit/{id}','ProductController@update')->name('update.products');
    Route::delete('/products-delete/{id}','ProductController@destroy')->name('delete.products');

    Route::get('/user/{id}/profile','UserController@show')->name('profile.show');
    Route::get('/user/{id}/edit','UserController@edit')->name('profile.edit');
    Route::put('/user/{id}/profile','UserController@update')->name('profile.update');


});

