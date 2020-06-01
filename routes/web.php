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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'UserController@destroy');

Auth::routes();

Route::view('/welcome', 'welcome');

Route::get('/home', 'HomeController@index')->name('inicioemprendedor');

Route::get('inicioemprendedor', function () {
    return view('inicioemprendedor');
});

Route::get('store_image', 'StoreImageController@index');

Route::post('store_image/insert_image', 'StoreImageController@insert_image');

Route::resource('categories','CategoryController');

Route::resource('products','ProductController');

Route::resource('users','UserController');

//Route::get('store_image/fetch_image/{id}', 'StoreImageController@fetch_image');






