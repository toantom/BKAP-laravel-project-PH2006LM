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
Route::get('/','HomeController@index')->name('frontend.index');
Route::get('category/{id}','CategoryController@index')->name('frontend.category');

Route::group(['prefix' => 'backend'], function () {
    Route::get('/backend','AdminController@index')->name('backend.index');
});



