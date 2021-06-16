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
Route::get('/backend', function () {
    return view('backend.index');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products','App\Http\Controllers\AddController@products');
Route::get('datatables/products', [App\Http\Controllers\crudController::class, 'getProducts']);
Route::post('/addproducts','App\Http\Controllers\crudController@insertData');
Route::get('songs/register','App\Http\Controllers\songController@sIndex');
