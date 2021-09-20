<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'ItemController@index')->name('home');

Route::prefix('roles')->group(function () {

    Route::get('/', 'RoleController@index');
    
    Route::get('/create', 'RoleController@create')->name('role.create');
    Route::post('/store', 'RoleController@store');
    
    Route::get('/{role}/edit', 'RoleController@edit');
    Route::patch('/{role}/edit', 'RoleController@update');
    
    Route::delete('/{role}/delete', 'RoleController@delete')->name('role.delete');
});

Route::prefix('users')->group(function() {
    Route::get('/', 'UserController@index');

    Route::get('/create', 'UserController@create')->name('user.create');
    Route::post('/store', 'UserController@store');

    Route::get('/{user}/edit', 'UserController@edit');
    Route::patch('/{user}/edit', 'UserController@update');

    Route::delete('/{user}/delete', 'UserController@delete');
});

Route::prefix('rooms')->group(function() {
    Route::get('/', 'RoomController@index');

    Route::get('/create', 'RoomController@create')->name('room.create');
    Route::post('/store', 'RoomController@store');

    Route::get('/{room}/edit', 'RoomController@edit');
    Route::patch('/{room}/edit', 'RoomController@update');
    
    Route::delete('/{room}/delete', 'RoomController@delete')->name('room.delete');
});

Route::prefix('items')->group(function() {
    Route::get('/', 'ItemController@index');
    Route::get('/cetak_items', 'ItemController@cetak_pdf');
    Route::get('/cetak_excel', 'ItemController@export_excel');

    Route::get('/create', 'ItemController@create')->name('item.create');
    Route::post('/store', 'ItemController@store');

    Route::get('/{item}/edit', 'ItemController@edit');
    Route::patch('/{item}/edit', 'ItemController@update');

    Route::delete('/{item}/delete', 'ItemController@delete');
});

Route::prefix('categories')->group(function() {
    Route::get('/', 'CategoryController@index');
    
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/store', 'CategoryController@store');
    
    Route::get('/{category}/edit', 'CategoryController@edit');
    Route::patch('/{category}/edit', 'CategoryController@update');
    
    Route::delete('/{category}/delete', 'CategoryController@delete')->name('category.delete');
});

Auth::routes();


