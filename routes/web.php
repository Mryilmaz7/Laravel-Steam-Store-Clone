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

Route::get('/','FrontController@index')->name('notlogin.index');
Route::get('/','FrontController@Games')->name('notlogin.index');

Route::get('/category/{genre}','FrontController@genres')->name('category');
Route::post('/category/{genre}','FrontController@Showgenres')->name('category');

Route::prefix('home')->group(function (){
    Route::get('/add-product','AdminController@Showaddproduct')->name('admin.addproduct');
    Route::post('/add-product','AdminController@addproduct');
    Route::get('/add-post','AdminController@Showaddpost')->name('admin.addpost');
    Route::get('/add-balance','AdminController@ShowAddbalance')->name('admin.addbalance');
    Route::post('/add-post','AdminController@addPost');
    Route::post('/add-balance','AdminController@addbalance');
    Route::get('/buy','AdminController@buy')->name('admin.buy');
    Route::post('/buy','AdminController@buy')->name('admin.buy');
    Route::get('/','AdminController@home')->name('admin.index');
    Route::get('/bag/{product}','CartController@add')->name('cart');
    Route::get('/library','AdminController@library')->name('admin.library');
    Route::get('/userpage/{id}','AdminController@userpage')->name('admin.userpagee');
    Route::get('/myprofile','AdminController@myprofile')->name('admin.myprofile');
    Route::get('/cart','CartController@index')->name('cart.index');
    Route::get('/cart/destroy/{itemId}','CartController@destroy')->name('cart.destroy');
    Route::get('/cart/destroy','CartController@alldestroy')->name('cart.alldestroy');
    Route::get('/market','AdminController@market')->name('admin.market');
    Route::get('/inventory','AdminController@inventory')->name('admin.inventory');
    Route::post('/inventory','AdminController@inventory')->name('admin.inventory');
    Route::post('/add-item','AdminController@additem')->name('admin.additem');
    Route::get('/add-item','AdminController@Showadditem')->name('admin.additem');
    Route::get('/sold/{inventory}','AdminController@sold')->name('sold');
    Route::get('/mymarket','AdminController@mymarket')->name('mymarket');
    Route::get('/buyitem/{item}','AdminController@buyitem')->name('buyitem');
    Route::get('/removeitem/{item}','AdminController@removemarket')->name('removemarket');
    Route::get('/game/{game}','AdminController@game')->name('game');
    Route::post('/game/{game}','AdminController@showgame')->name('game');

});


