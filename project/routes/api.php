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
Route::post('appointment_request', 'App\Http\Controllers\AuthController@appointmentRequest');
Route::post('doctor_appointment_request', 'App\Http\Controllers\AuthController@viewDoctorAppointmentRequests');
Route::post('view_doctor_appointments', 'App\Http\Controllers\AuthController@viewDoctorAppointments');
Route::post('view_patient_appointments', 'App\Http\Controllers\AuthController@viewPatientAppointments');
Route::get('fetch_blogs','App\Http\Controllers\AuthController@fetchblogs');

Route::post('accept_request', 'App\Http\Controllers\AuthController@acceptRequest');
Route::post('reject_request', 'App\Http\Controllers\AuthController@rejectRequest');


//Media Routes
Route::post('set/national/id', 'App\Http\Controllers\DoctorMediaController@storeID');
Route::post('media_upload/pdf/', 'App\Http\Controllers\DoctorMediaController@storePdf');
Route::post('media_upload/image/', 'App\Http\Controllers\DoctorMediaController@storeAvatar');
Route::post('media_download', 'App\Http\Controllers\MediaController@download');

//Payment Routes
Route::post('v1/access/token', 'App\Http\Controllers\MpesaController@generateAccessToken');
Route::post('v1/hlab/stk/push', 'App\Http\Controllers\MPesaPaymentsController@pay');
Route::post('v1/hlab/validation', 'App\Http\Controllers\MpesaController@mpesaValidation');
Route::post('v1/hlab/transaction/confirmation', 'App\Http\Controllers\MpesaController@mpesaConfirmation');
Route::post('v1/hlab/stk/confirmation', 'App\Http\Controllers\STKPushController@confirm');
Route::post('v1/hlab/register/url', 'App\Http\Controllers\MpesaController@mpesaRegisterUrls'); //laravel 8 sucks
Route::post('v1/hlab/simulate/c2b', 'App\Http\Controllers\MpesaController@simulate');

