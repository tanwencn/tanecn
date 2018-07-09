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


//Route::post('comments/submit', 'CommentController@submit')->name('comments.submit')->middleware('auth');;

Auth::routes();

Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('post/{slug}', 'PostController@detail')->name('posts.detail');
Route::post('post-comment', 'PostController@comment')->middleware('auth')->name('posts.comment');
Route::get('category/{slug}', 'PostController@category')->name('posts.category');

Route::get('page/{slug}', 'PageController@detail')->name('page.detail');

/*Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/{id}', 'ProductController@detail')->name('product.detail');
Route::get('product-category/{id}', 'ProductController@category')->name('product.category');*/

/*Route::get('add-to-cart/{id}', 'CartController@add')->name('cart.add');
Route::post('cart/update', 'CartController@update')->name('cart.update');
Route::get('cart', 'CartController@index')->name('cart.index');

Route::get('wishlist/toggle', 'CartController@wishlistToggle')->name('wishlist.toggle');*/
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
