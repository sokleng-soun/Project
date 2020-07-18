<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;

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

// Route::get('/', function () {
// 	return view('index');
// });


Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/codes', 'HomeController@codes')->name('codes');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/icons', 'HomeController@icons')->name('icons');
Route::get('/index', 'HomeController@index')->name('index');
Route::get('/mail', 'HomeController@mail')->name('mail');
Route::get('/products', 'HomeController@products')->name('products');
Route::get('/products1', 'HomeController@products1')->name('products1');
Route::get('/products2', 'HomeController@products2')->name('products2');
Route::get('/single', 'HomeController@single')->name('single');

Route::name('cart.')->prefix('cart')->group(function(){
	Route::get('/', 'CartController@CartList')->name('list');
	Route::get('/product/{slug}/add', 'CartController@addToCart')->name('product.add');
	Route::get('/product/remove', 'CartController@removeFromCart')->name('product.remove');
	Route::get('/product/update', 'CartController@updateCart')->name('product.update');
	Route::get('/checkout', 'CartController@checkout')->name('checkout');
	Route::post('/order/store', 'CartController@storeOrder')->name('order.store');

});

Auth::routes();

Route::namespace('Admin')->name('admin.')->prefix(RouteServiceProvider::ADMIN)->middleware(['admin'])->group(function(){
	Route::get('/','AdminController@index')->name('dashboard');

	Route::name('product.')->prefix('product')->group(function(){
		Route::get('/','ProductController@index')->name('index');
		Route::get('/add','ProductController@add')->name('add');
		Route::post('/store','ProductController@store')->name('store');
		Route::get('/{slug}/edit','ProductController@edit')->name('edit');
		Route::post('/{slug}/update','ProductController@update')->name('update');
		Route::get('/delete/{slug}','ProductController@delete')->name('delete');
		Route::get('/image/delete','ProductController@deleteImage')->name('image.delete');
	});

	Route::name('orders.')->prefix('orders')->group(function(){
		Route::get('/','OrderController@index')->name('index');
		Route::get('/{order_number}/details','OrderController@orderDetails')->name('details');
	});

});
