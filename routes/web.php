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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicioemprendedor');

Route::get('/', 'HomeController2@index')->name('welcome');

Route::get('inicioemprendedor', function () {
    return view('inicioemprendedor');
});

Route::get('store_image', 'StoreImageController@index');

Route::post('store_image/insert_image', 'StoreImageController@insert_image');

Route::resource('proposals','ProposalController');

Route::resource('categories','CategoryController');

Route::resource('products','ProductController');

Route::resource('users','UserController');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::get('admin/products', 'HomeController@adminproducts')->name('admin.products')->middleware('is_admin');

Route::get('admin/categories', 'HomeController@admincategories')->name('admin.categories')->middleware('is_admin');

Route::get('admin/proposes', 'HomeController@adminproposes')->name('admin.proposes')->middleware('is_admin');

Route::put('update','UserController@update2')->name('admin.update');

Route::post('create','UserController@create')->name('admin.create');

Route::delete('destroy','UserController@destroy')->name('admin.destroy');

Route::post('createcategorie','CategoryController@storeadmin')->name('admin.createcategorie');

Route::post('updatecategorie','CategoryController@adminupdate')->name('admin.updatecategorie');

Route::delete('deletecategorie','CategoryController@admindestroy')->name('admin.deletecategorie');

Route::post('createproduct','ProductController@adminstore')->name('admin.createproduct');

Route::post('updateproduct','ProductController@adminupdate')->name('admin.updateproduct');

Route::delete('deleteproduct','ProductController@admindestroy')->name('admin.deleteproduct');

Route::post('createpropose','ProposalController@adminstore')->name('admin.createpropose');

Route::post('updatepropose','ProposalController@adminupdate')->name('admin.updatepropose');

Route::delete('deletepropose','ProposalController@admindestroy')->name('admin.deletepropose');

Route::delete('destroy','UserController@admindestroy')->name('admin.destroy2');


//Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//Route::get('store_image/fetch_image/{id}', 'StoreImageController@fetch_image');






