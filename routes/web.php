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

Route::get('/','HomeController@index')->name('homepage');

Route::get('/login','Auth\LoginController@showLoginHomePage')->name('show-login');
Route::post('/login','Auth\LoginController@loginHomePage')->name('login');
Route::get('/logout','Auth\LoginController@logoutHomePage')->name('logout');
Route::get('/register','Auth\RegisterController@showSignUpHomePage')->name('show-register');
Route::post('/register','Auth\RegisterController@register')->name('register');
Route::get('/cart', function () {
    return view('cart.cart');
})->name('show-cart');

//Homepage
Route::get('/products','ProductController@index')->name('show-products');
Route::get('/product/{id}/details','ProductController@show')->name('product-details');
Route::get('/contact-us', 'HomeController@showFormContact')->name('form-contact');
Route::post('/contact-us', 'HomeController@contact')->name('contact-us');
Route::get('/categories/{id}/products','CategoryController@listProductByCate')->name('listProductByCate');
Route::get('/news/{id}','NewsController@show')->name('show-news');
Route::get('/brand/{id}/products','BrandController@showProductsByBrand')->name('products-by-brand');
Route::get('/search', 'HomeController@search');
Route::post('/search', 'HomeController@searchFullText')->name('search');
