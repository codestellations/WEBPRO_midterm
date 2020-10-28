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


/* PROMO */
Route::get('/promo', 'App\Http\Controllers\PromoController@index');                     // read promo
Route::post('/promo/create', 'App\Http\Controllers\PromoController@create');            // create new promo
Route::get('/promo/{id_promo}/edit', 'App\Http\Controllers\PromoController@edit');      // edit promo
Route::post('/promo/{id_promo}/update', 'App\Http\Controllers\PromoController@update'); // update promo
Route::get('/promo/{id_promo}/delete', 'App\Http\Controllers\PromoController@delete');  // delete promo