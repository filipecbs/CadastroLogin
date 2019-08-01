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

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group( ['middleware' => 'auth:api'], function() {
	Route::get('logout', 'API\PassportController@logout');
	Route::post('get-details', 'API\PassportController@getDetails');
});

Route::get('reserva', 'ReservaController@index');
Route::get('reserva/{$id}', 'ReservaController@show');
Route::post('reserva', 'ReservaController@store');
Route::put('reserva', 'ReservaController@update');
Route::delete('reserva/{$id}', 'ReservaController@destroy');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
