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


Route::get('/search', 'SearchController@index')->name('search.index');
Route::get('search-results', 'SearchController@search')->name('search.result');

#Admin
Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ],
    function () {

        // Login
        Route::get('/login', 'LoginController@show')->name('form-login');
        Route::post('/login', 'LoginController@login')->name('login');
        // logout 
        Route::get('/logout', 'LoginController@logout')->name('logout');
        // main
        Route::get('/main', 'LoginController@show')->name('main')->middleware('is.admin');
        // Categories
        Route::get('/categories', 'CategoryController@index')->name('categories.list');
        // Form create cate
        Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
        // Store cate
        Route::post('/categories', 'CategoryController@store')->name('categories.store');
        // Form edit cate 
        Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');

        Route::put('/categories/{id}/update', 'CategoryController@update')->name('categories.update');

        Route::get('/categories/{id}/products', 'CategoryController@listProductByCategoryID')
            ->name('categories.list-product');

        Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.delete');

        // products 

        Route::get('/products', 'ProductController@index')->name('products.list');

        Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');

        Route::put('/products/{id}/update', 'ProductController@update')->name('products.update');

        Route::get('/products/create', 'ProductController@create')->name('products.create');

        Route::post('/products', 'ProductController@store')->name('products.store');

        Route::delete('/products/{id}', 'ProductController@destroy')->name('products.delete');

        Route::get('/products/{id}', 'ProductController@productDetail')->name('products.detail');


        //User

        Route::get('/users', 'UserController@index')->name('users.list');

        Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');

        Route::put('/users/{id}/update', 'UserController@update')->name('users.update');

        Route::get('/users/create', 'UserController@create')->name('users.create');

        Route::post('/users', 'UserController@store')->name('users.store');

        Route::delete('/users/{id}', 'UserController@destroy')->name('users.delete');

        Route::get('/users/{id}', 'UserController@show');

        Route::get('/search/name', 'UserController@searchByName');

        Route::get('/search/email', 'UserController@searchByEmail');

        // Upload 
        Route::post('file', 'Productcontroller@doUpload');


        Route::get('full-text-search', 'UserController@indexSearch');

        Route::post('full-text-search/action', 'UserController@action')
            ->name('full-text-search.action');

        Route::get('full-text-search/normal-search', 'Full_text_search_Controller@normal_search')
            ->name('full-text-search.normal-search');
    }
);
