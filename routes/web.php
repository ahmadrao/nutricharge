<?php

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

Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@search');
Route::post('/product/order', 'HomeController@store');
Route::post('/product/review', 'HomeController@review');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product/{id}', ['as' => 'home.product', 'uses' => 'AdminProductsController@product']);



Auth::routes();

Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', 'AdminController@index');

    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/products', 'AdminProductsController');
    Route::resource('/admin/categories', 'AdminCategoriesController');
    Route::resource('/admin/product_goals', 'AdminProductGoalsController');
    Route::get('/admin/orders/delivered', 'OrderController@delivered');
    Route::resource('/admin/orders', 'OrderController');

    Route::resource('/admin/media', 'AdminMediaController');
    Route::get('/admin/delete/media', 'AdminMediaController@deleteMedia');
    Route::resource('/admin/reviews', 'ProductReviewsController');
    Route::resource('/admin/review/replies', 'ReviewRepliesController');
});

Route::group(['middleware' => 'auth'], function () {

    Route::post('/review/reply', 'ReviewRepliesController@createreply');
});
