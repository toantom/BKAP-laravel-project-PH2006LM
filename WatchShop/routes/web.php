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
route::get('/logoutAdmin','AdminController@logout')->name('backend.logout');
Route::group(['prefix' => 'backend','middleware'=>'admin'], function () {
    Route::get('/','AdminController@index')->name('backend.index');
    //Category
    Route::resource('category', 'CategoryController');
    //Input
    route::get('/input','InputController@index')->name('backend.input');
    route::get('/input/create','InputController@create')->name('backend.input.create');
    route::post('/input','InputController@store')->name('backend.input.store');
    route::delete('/input/delete/{id}','InputController@destroy')->name('backend.input.delete');
    route::get('/input/edit/{id}','InputController@edit')->name('backend.input.edit');
    route::post('/input/edit/{id}','InputController@update')->name('backend.input.update');

    

    Route::get('/product', 'ProductController@indexBE')->name('backend.product');
    Route::get('/product/create', 'ProductController@create')->name('backend.product.create');
    Route::post('/product', 'ProductController@store')->name('backend.product.store');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('backend.product.edit');
    Route::put('/product/update', 'ProductController@update')->name('backend.product.update');
    Route::delete('/product/destroy/{id}', 'ProductController@destroy')->name('backend.product.destroy');
    Route::resource('product', 'ProductController');


    Route::get('/product/editPic/{id}','ProductController@editPic')->name('backend.product.editPic');
    Route::put('/product/updatePic/{id}','ProductController@updatePic')->name('backend.product.updatePic');

  
    //Order
    Route::get('/order','OrderController@index')->name('order.index');
    Route::get('/order/order-detail/{id}','OrderController@detail')->name('order.detail');
    Route::post('/order/order-detail/{id}','OrderController@updateStatus')->name('order.update');

});
//route frontend
Route::get('/','HomeController@index')->name('frontend.index');
Route::get('category','CategoryController@allpro')->name('frontend.pro');
route::get('category/{id}','CategoryController@showpro')->name('frontend.category');
route::get('product/{id}','ProductController@show_pro')->name('frontend.product');
route::get('about','HomeController@about')->name('frontend.about');

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
    //Xem chi tiet don hang
    route::get('order_detail/{id}','OrderController@showdetail')->name('frontend.orderdetail')->middleware('auth');
    //Sua thong tin tai khoan
    route::post('information/{id}','UserController@update')->name('frontend.updateinfo')->middleware('auth');
    //Lay lai mat khau
    route::get('resetpass','UserController@reset')->name('frontend.view.resetpass');
    route::post('resetpass','UserController@resetpass')->name('frontend.resetpass');
    //Thay doi mat khau
    route::get('updatepass/{id}','UserController@updatepass')->name('frontend.view.updatepass')->middleware('auth');
    route::post('updatepass/{id}','UserController@updatepassword')->name('frontend.updatepass')->middleware('auth');
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
// route contact
route::get('contact','ContactController@form')->name('frontend.contact');
route::post('sentcontact','ContactController@post')->name('frontend.postcontact');