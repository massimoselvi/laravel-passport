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

Route::group(['namespace' => 'Api'], function () {
	Route::get('/login', 'UserController@login');
	Route::post('/login', 'UserController@login');
});

Route::get('/user', function (Request $request) {
	dd($request->user());
	// dd(__FILE__ . ' - ' . __LINE__);
	return $request->user();
})->middleware('auth:api');
