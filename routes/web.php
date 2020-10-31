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



Route::get('/cart', function () {
    return view('cart.cart');
})->name('show-cart');

Route::get('/products', 'ProductController@index')->name('show-products');
Route::get('/product/{id}/details', 'ProductController@show')->name('product-details');
Route::get('/contact-us', 'HomeController@showFormContact')->name('form-contact');
Route::post('/contact-us', 'HomeController@contact')->name('contact-us');
Auth::routes();



#Admin
Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ],
    function () {

        Route::get('/', 'LoginController@show')->name('main');
        // Login
        Route::get('/login', 'LoginController@show')->name('form-login');

        Route::post('/login', 'LoginController@login')->name('login');
        // logout 
        Route::get('/logout', 'LoginController@logout')->name('logout');
        // Route::post('/logout', 'LoginController@logout')->name('logout');

        // main
        Route::get('/main', 'LoginController@show')->name('main');
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

        // Roles
        Route::get('roles','RoleController@showListRole')
        ->name('roles.list');

        Route::get('roles/create','RoleController@createRole')
        ->name('roles.create');

        Route::post('roles','RoleController@storeRole')
        ->name('roles.store');
        
        Route::get('/roles/{id}/edit', 'RoleController@editRole')->name('roles.edit');

        Route::put('/roles/{id}/update', 'RoleController@updateRole')->name('roles.update');

        Route::delete('/roles/{id}', 'RoleController@deleteRole')->name('roles.delete');

        Route::get('/role/{id}/showAssign', 'RoleController@showAssign')->name('roles.assign.list');

        Route::post('/role/{id}/assignPermission', 'RoleController@assignPermission')->name('roles.assign');

        Route::get('/role/{id}/showRevoke', 'RoleController@showRevoke')->name('roles.revoke.list');

        Route::post('/role/{id}/revokePermission', 'RoleController@revokePermission')->name('roles.revoke');

        Route::get('/testNha','RoleController@test' );
        // Permission
        Route::get('permissions','PermissionController@showListPermission')
        ->name('permissions.list');

        Route::get('permissions/create','PermissionController@createPermission')
        ->name('permissions.create');

        Route::post('permissions','PermissionController@storePermission')
        ->name('permissions.store');
        
        Route::get('/permissions/{id}/edit', 'PermissionController@editPermission')->name('permissions.edit');

        Route::put('/permissions/{id}/update', 'PermissionController@updatePermission')->name('permissions.update');

        Route::delete('/permissions/{id}', 'PermissionController@deletePermission')->name('permissions.delete');

     
    }
);
