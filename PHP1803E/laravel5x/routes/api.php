<?php

use Illuminate\Http\Request;

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

Route::resource('photo','API\PhotoController');
Route::resource('photo/delete','API\PhotoController');
Route::resource('photo/update','API\PhotoController');
Route::resource('user','API\UserController');
Route::resource('user/delete','API\UserController');
Route::resource('user/update','API\UserController');