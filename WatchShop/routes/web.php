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
    // Route::resource('product', 'ProductController');
    Route::get('/product', 'ProductController@indexBE')->name('backend.product');
    Route::get('/product/create', 'ProductController@create')->name('backend.product.create');
    Route::post('/product', 'ProductController@store')->name('backend.product.store');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('backend.product.edit');
    Route::put('/product/update', 'ProductController@update')->name('backend.product.update');
    Route::delete('/product/destroy/{id}', 'ProductController@destroy')->name('backend.product.destroy');
    Route::resource('product', 'ProductController');
});

//route frontend
Route::get('/','HomeController@index')->name('frontend.index');
route::get('category/{id}','CategoryController@showpro')->name('frontend.category');
route::get('product/{id}','ProductController@show_pro')->name('frontend.product');
Route::group(['prefix' => 'user'], function () {
    //Hien thi form dang ky
    route::get('login-register','UserController@register_form')->name('frontend.login-register');
    //Nhan du lieu form va thuc hien dang ky
    route::post('login-register/register','UserController@create')->name('frontend.register');
    //Thuc hien dang nhap
    route::post('login-register/login','UserController@login')->name('frontend.login');
    //Thuc hien dang xuat
    route::get('login-register/logout','UserController@logout')->name('frontend.logout');
    //Thong tin tai khoan
    route::get('information','UserController@infor')->name('frontend.information')->middleware('auth');
});
//route cart
route::get('add_cart/{id}/{qty}','CartController@addcart')->name('frontend.addcart');
route::get('cart','CartController@show')->name('frontend.cart');
route::get('delete_cart/{id}','CartController@deletecart')->name('frontend.deletecart');
route::get('add_cart_detail','CartController@addcartdetail')->name('frontend.addcartdetail');
route::post('update_cart','CartController@updatecart')->name('frontend.updatecart');
route::get('checkout','OrderController@showcheckout')->name('frontend.checkout')->middleware('auth');
route::post('checkout','OrderController@create')->name('frontend.checkout');
//route wish
route::get('wishlist','WishlistController@show_whislist')->name('frontend.wishlist')->middleware('auth');
route::get('wishlist/add/{id}','WishlistController@create')->name('frontend.add-wishlist')->middleware('auth');
route::get('wishlist/delete/{id}','WishlistController@destroy')->name('frontend.delete-wishlist')->middleware('auth');
//route feedbacks
route::post('feedback','FeedbackController@create')->name('frontend.feedback')->middleware('auth');