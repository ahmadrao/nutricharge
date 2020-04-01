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
Route::get('/contact-us', 'HomeController@showContactPage');
Route::post('/contact-us', 'HomeController@submitContactPage');
Route::get('/about-us', 'HomeController@aboutUs');
Route::get('/frequently-asked-questions', 'HomeController@faq');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{slug}', ['as' => 'home.product', 'uses' => 'AdminProductsController@product']);
Route::get('/videos/{slug}', 'VideoController@videos');



Auth::routes();




// If Admin Visiting the Admin Page is Super Admin
Route::group(['middleware' => 'admin'], function () {

    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/products', 'AdminProductsController');
    Route::resource('/admin/categories', 'AdminCategoriesController');
    Route::resource('/admin/videos/categories', 'VideoCategoryController');
    Route::resource('/admin/product_goals', 'AdminProductGoalsController');
    Route::get('/admin/contacts', 'ContactController@index');

    Route::resource('/admin/media', 'AdminMediaController');
    Route::resource('/admin/pic', 'PicController');
    Route::resource('/admin/videos', 'VideoController');
    Route::get('/admin/delete/media', 'AdminMediaController@deleteMedia');
    Route::resource('/admin/reviews', 'ProductReviewsController');
    Route::resource('/admin/review/replies', 'ReviewRepliesController');
});

// If Admin Visiting the Admin Page is Simple User
Route::group(['middleware' => 'admin' || ''], function () {

    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/orders/delivered', 'OrderController@delivered');
    Route::resource('/admin/orders', 'OrderController');
});




Route::group(['middleware' => 'auth'], function () {

    Route::post('/review/reply', 'ReviewRepliesController@createreply');
});
