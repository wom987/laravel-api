<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/menu','App\Http\Controllers\MenuController@index');
Route::post('/menu/store','App\Http\Controllers\MenuController@store');
Route::put('/menu/{id}','App\Http\Controllers\MenuController@update');
Route::delete('/menu/{id}','App\Http\Controllers\MenuController@destroy');