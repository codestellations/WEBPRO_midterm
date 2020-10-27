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

/* CATEGORY */ 
Route::get('/category', 'App\Http\Controllers\CategoryController@index'); // read category
Route::post('/category/create', 'App\Http\Controllers\CategoryController@create'); // create new category
Route::get('/category/{id_category}/edit', 'App\Http\Controllers\CategoryController@edit'); // edit category
Route::post('/category/{id_category}/update', 'App\Http\Controllers\CategoryController@update'); // update category
Route::get('/category/{id_category}/delete', 'App\Http\Controllers\CategoryController@delete'); // delete category
