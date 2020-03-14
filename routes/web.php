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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DashboardController@index');
Route::get('/struktur', 'DashboardController@struktur');
Route::get('/galery', 'DashboardController@galery');

Route::get('/profile/{user}/show', 'ProfileController@index');
Route::post('/profile/{user}/addborrow', 'ProfileController@store');
Route::post('/profile/{user}/update', 'ProfileController@update');

Route::group(['middleware' => ['auth', 'Role:admin']], function(){

	Route::get('/user', 'UsersController@index');
	Route::get('/user/{user}/show', 'UsersController@show');
	Route::post('/user/{user}/addborrow', 'UsersController@store');
	Route::post('/user/{user}/update', 'UsersController@update');
	Route::delete('/user/{user}/delete', 'UsersController@destroy');

	Route::get('/staff', 'EmployeesController@index');
	Route::post('/staff/add', 'EmployeesController@store');

	Route::get('/mahasiswa', 'StudentsController@index');
	Route::post('/mahasiswa/add', 'StudentsController@store');

	Route::get('/device', 'DevicesController@index');
	Route::post('/device/add', 'DevicesController@store');

	Route::get('/category', 'CategoriesController@index');
	Route::post('/category/add', 'CategoriesController@store');
	Route::get('/category/{category}/show', 'CategoriesController@show');
	Route::post('/category/{category}/update', 'CategoriesController@update');
	Route::get('/places/{place}/category/{category}', 'PlacesController@placeInventory');


	Route::get('/inventory', 'InventoriesController@index');
	Route::get('/inventory/{inventory}/show', 'InventoriesController@show');
	Route::post('/inventory/add', 'InventoriesController@store');
	Route::post('/inventory/{inventory}/update', 'inventoriesController@update');
	Route::get('/inventory/export', 'inventoriesController@export');
	Route::delete('/inventory/{inventory}/delete', 'inventoriesController@destroy');

	Route::get('/borrow', 'BorrowsController@index');
	Route::get('/borrow/{borrow}/edit', 'BorrowsController@edit');
	Route::post('/borrow/{borrow}/update', 'BorrowsController@update');
	Route::delete('/borrow/{borrow}/delete', 'BorrowsController@destroy');
});

Route::get('/user/{user}/inventory', 'InventoriesController@borrowIndex');
Route::get('/user/{user}/inventory/{inventory}', 'BorrowsController@create');
Route::post('/user/{user}/inventory/{inventory}/addborrow', 'BorrowsController@store');

Route::get('/borrow/{borrow}/pdf', 'BorrowsController@pdf');

Route::get('/places', 'PlacesController@index');
Route::post('/places/add', 'PlacesController@store');
Route::get('/places/{place}/show', 'PlacesController@show');
Route::post('/places/{place}/update', 'PlacesController@update');
Route::get('/category/{category}/places/{place}', 'CategoriesController@categoryInventory');

Route::get('/inventaris', 'InventarisController@amount');
Route::get('/inventaris/{category}/ready', 'InventarisController@ready');
Route::get('/inventaris/{category}/borrow', 'InventarisController@borrow');
Route::get('/inventaris/{category}/repair', 'InventarisController@repair');



