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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/edit/{id}', 'homeController@edit')->name('edit'); 
Route::get('/add', 'homeController@add')->name('add');
Route::get('/view', 'productsController@show')->name('view');
Route::post('/addaction', 'productsController@addproduct');
Route::post('/editaction', 'productsController@editproduct');
Route::post('/deleteaction', 'productsController@destroy');
Route::post('/downloadaction', 'productsController@download'); 