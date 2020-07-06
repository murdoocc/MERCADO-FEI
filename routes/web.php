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

Route::get('/home', 'HomeController@index')->name('inicioemprendedor')->middleware('exist_something');

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

Route::get('admin/proposals', 'HomeController@adminproposals')->name('admin.proposals')->middleware('is_admin');

Route::post('update','UserController@update2')->name('admin.update');

Route::post('create','UserController@create')->name('admin.create');

Route::delete('destroy','UserController@destroy')->name('admin.destroy');

Route::post('createcategory','CategoryController@storeadmin')->name('admin.createcategory');

Route::post('updatecategory','CategoryController@adminupdate')->name('admin.updatecategory');

Route::delete('deletecategory','CategoryController@admindestroy')->name('admin.deletecategory');

Route::post('createproduct','ProductController@adminstore')->name('admin.createproduct');

Route::post('updateproduct','ProductController@adminupdate')->name('admin.updateproduct');

Route::delete('deleteproduct','ProductController@admindestroy')->name('admin.deleteproduct');

Route::post('createpropose','ProposalController@adminstore')->name('admin.createpropose');

Route::post('updatepropose','ProposalController@adminupdate')->name('admin.updatepropose');

Route::delete('deletepropose','ProposalController@admindestroy')->name('admin.deletepropose');
Route::delete('deletepropose2','ProposalController@admindestroy2')->name('empre.deletepropose');

Route::delete('destroy','UserController@admindestroy')->name('admin.destroy2');


//Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//Route::get('store_image/fetch_image/{id}', 'StoreImageController@fetch_image');






