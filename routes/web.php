<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


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

Auth::routes();

Route::get('/admin2', function () {
    return view('admin2');
});

Route::get('/','HomeController@index')->name('home');
Route::get('/activate/{code}','ActivationController@activateUserAccount')->name('user.activate');
Route::get('/resend/{email}','ActivationController@resendActivationCode')->name('code.resend');

Route::resource('products','ProductController');
Route::get('products/category/{category}','HomeController@getProductByCategory')->name("category.products");

Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/add/cart/{product}','CartController@addProductToCart')->name('add.cart');
Route::delete('/remove/{product}/cart','CartController@removeProductOnCart')->name('remove.cart');
Route::put('/update/{product}/cart','CartController@updateProductOnCart')->name('update.cart');

Route::get('/handle-payment','PaypalPaymentController@handlePayment')->name('make.payment');
Route::get('/cancel-payment','PaypalPaymentController@paymentCancel')->name('cancel.payment');
Route::get('/payment-success','PaypalPaymentController@paymentSuccess')->name('success.payment');

Route::get('/admin','AdminController@index')->name('admin.index');
Route::get('/admin/login','AdminController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login','AdminController@adminlogin')->name('admin.login');
Route::get('/admin/logout','AdminController@adminLogout')->name('admin.logout');
Route::get('/admin/products','AdminController@getProduct')->name('admin.products');
Route::get('/admin/orders','AdminController@getOrder')->name('admin.orders');
Route::get('/admin/create','AdminController@addProduct')->name('admin.create');
Route::resource('orders','orderController');
Route::resource('product','ProductController');

