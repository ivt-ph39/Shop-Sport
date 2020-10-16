<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('homepage');

Route::get('/signin', function () {
    return view('auth.login');
})->name('show-login');
Route::get('/signup', function () {
    return view('auth.register');
})->name('show.register');

#Customer
Route::get('/test', 'RoleController@index');

Route::get('/login1', function () {
    return view('auth.login-register');
})->name('show.login');

Route::get('/cart', function () {
    return view('cart.cart');
})->name('show-cart');

Route::get('/products', 'ProductController@index')->name('show-products');
Route::get('/product/{id}/details', 'ProductController@show')->name('product-details');
Route::get('/contact-us', 'HomeController@showFormContact')->name('form-contact');
Route::post('/contact-us', 'HomeController@contact')->name('contact-us');
Auth::routes();



Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
    ],
    function () {
        Route::get('/login', 'Auth\LoginController@show')->name('form-login');
        Route::get('/', 'Auth\LoginController@show');
        Route::post('/login', 'Auth\LoginController@login')->name('login');
        // logout 
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('/home', 'HomeController@index')->name('home')->middleware(['can:canAuthenAdmin']);
        // main
        Route::get('/main', 'Auth\LoginController@show')->name('main')->middleware('is.admin');
    }
);

Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ],
    function () {
        // categories
        Route::get('/categories', 'CategoryController@index')->name('categories.list');
        // Form create cate
        Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
        // Store cate
        Route::post('/categories', 'CategoryController@store')->name('categories.store');
        // form edit cate 
        Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');

        Route::put('/categories/{id}/update', 'CategoryController@update')->name('categories.update');

        Route::get('/categories/{id}/products', 'CategoryController@listProductByCategoryID')
            ->name('categories.list-product');

        Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.delete');
        // products 




    }
);
