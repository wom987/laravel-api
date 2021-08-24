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
Route::get('/menu','App\Http\Controllers\MenuController@index');
Route::post('/menu/store','App\Http\Controllers\MenuController@store');
Route::put('/menu/{id}','App\Http\Controllers\MenuController@update');
Route::delete('/menu/{id}','App\Http\Controllers\MenuController@destroy');