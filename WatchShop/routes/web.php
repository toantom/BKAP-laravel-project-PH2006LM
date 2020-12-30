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

// Route::get('category', function () {
//     return view('frontend.category');
// });
//FE
Route::get('/','HomeController@index')->name('frontend.index');
Route::get('category/{id}','CategoryController@index')->name('frontend.category');


//BE
Route::group(['prefix' => 'backend'], function () {
    Route::get('/','AdminController@index')->name('backend.index');
    //Category
    
    Route::get('/category', 'CategoryController@indexBE')->name('backend.category');
    Route::get('/category/create', 'CategoryController@create')->name('backend.category.create');
    Route::post('/category', 'CategoryController@store')->name('backend.category.store');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('backend.category.edit');
    Route::put('/category/update', 'CategoryController@update')->name('backend.category.update');
    Route::delete('/category/destroy/{id}', 'CategoryController@destroy')->name('backend.category.destroy');
    //Product
    Route::resource('product', 'ProductController');
    // Route::get('/product', 'ProductController@indexBE')->name('backend.product');
    // Route::get('/product/create', 'ProductController@create')->name('backend.product.create');
    // Route::post('/product', 'ProductController@store')->name('backend.product.store');
    // Route::get('/product/edit/{id}', 'ProductController@edit')->name('backend.product.edit');
    // Route::put('/product/update', 'ProductController@update')->name('backend.product.update');
    // Route::delete('/product/destroy/{id}', 'ProductController@destroy')->name('backend.product.destroy');
    // Route::resource('product', 'ProductController');
});



