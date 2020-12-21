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
    Route::get('/category', 'CategoryController@indexBE')->name('backend.category');
    Route::get('/category/create', 'CategoryController@create')->name('backend.category.create');
    Route::post('/category', 'CategoryController@store')->name('backend.category.store');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('backend.category.edit');
    Route::put('/category/update', 'CategoryController@update')->name('backend.category.update');
    Route::delete('/category/destroy/{id}', 'CategoryController@destroy')->name('backend.category.destroy');
    // Route::get('/product', 'ProductController@indexBE')->name('backend.product');
    // Route::resource('product', 'ProductController');
});



