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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::prefix('users')->group(function () {
    Route::get('getUsers', 'UserController@index');
    Route::post('setUsers', 'UserController@store');
    Route::post('delUsers', 'UserController@destroy');
    Route::post('upUsers', 'UserController@update');
    Route::post('resUsers', 'UserController@restore');
});