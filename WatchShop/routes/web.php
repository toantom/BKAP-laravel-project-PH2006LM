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
Route::get('/loginAdmin','AdminController@login')->name('backend.login');
Route::post('/loginAdmin','AdminController@postLogin')->name('backend.postLogin');
Route::group(['prefix' => 'backend','middleware'=>'admin'], function () {
    Route::get('/','AdminController@index')->name('backend.index');
    //Category
    Route::resource('category', 'CategoryController');
    //Product
    Route::resource('product', 'ProductController');
    //Order
    Route::get('/order','OrderController@index')->name('order.index');
    Route::get('/order/order-detail/{id}','OrderController@detail')->name('order.detail');
    Route::post('/order/order-detail/{id}','OrderController@updateStatus')->name('order.update');
    //Input
    
    //Banner
    Route::resource('banner', 'BannerController');
    //Blog
    Route::resource('blog', 'BlogController');
});
//route frontend
Route::get('/','HomeController@index')->name('frontend.index');
Route::get('category','CategoryController@allpro')->name('frontend.pro');
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
});
//route cart
route::get('add_cart/{id}/{qty}','CartController@addcart')->name('frontend.addcart');
route::get('cart','CartController@show')->name('frontend.cart');
route::get('delete_cart/{id}','CartController@deletecart')->name('frontend.deletecart');
route::get('add_cart_detail','CartController@addcartdetail')->name('frontend.addcartdetail');
route::get('checkout','OrderController@showcheckout')->name('frontend.checkout')->middleware('auth');
route::post('checkout','OrderController@create')->name('frontend.checkout');
//route wish
route::get('wishlist','WishlistController@show_whislist')->name('frontend.wishlist')->middleware('auth');
route::get('wishlist/add/{id}','WishlistController@create')->name('frontend.add-wishlist')->middleware('auth');
route::get('wishlist/delete/{id}','WishlistController@destroy')->name('frontend.delete-wishlist')->middleware('auth');
