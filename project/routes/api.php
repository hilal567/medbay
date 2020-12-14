<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//
//
//});

Route::post('register', 'App\Http\Controllers\AuthController@register');
Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout');
Route::get('user', 'App\Http\Controllers\AuthController@getAuthUser');
Route::post('send/sms/', 'App\Http\Controllers\AuthController@sendVerifyText');
Route::post('verify/sms/code', 'App\Http\Controllers\AuthController@verifyCode');
Route::post('setPin', 'App\Http\Controllers\AuthController@setPin');
Route::post('login_user', 'App\Http\Controllers\AuthController@authenticate');

