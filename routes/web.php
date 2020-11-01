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


Route::get('/login', 'Auth\LoginController@showLoginForm')
->name('form-login');

Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@showRegisterForm')
->name('show.register');

#Customer
Route::get('/test', 'RoleController@index');



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
        'namespace' => 'Admin'
    ],
    function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('form-login');

        Route::post('/login', 'LoginController@login')
            ->name('login');

        // logout 
        Route::get('/logout', 'LoginController@logout')->name('logout');
        // main
        Route::get('/main', 'LoginController@show')->name('main')->middleware('is.admin');
    
    
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

        Route::get('/products', 'ProductController@index')->name('products.list');

        Route::get('/products/{id}/edit','ProductController@edit')->name('products.edit');
        
        Route::put('/products/{id}/update', 'ProductController@update')->name('products.update');
        
        Route::get('/products/create','ProductController@create')->name('products.create');
        
        Route::post('/products', 'ProductController@store')->name('products.store');
        
        Route::delete('/products/{id}', 'ProductController@destroy')->name('products.delete');
        
        Route::get('products/{id}', 'ProductController@productDetail')->name('products.detail');


    }
);
