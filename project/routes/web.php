<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\appointmentRequestController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::view('/', 'auth/login')->middleware('guest'); // access if guest


//resource routes
Route::resource('projects', ProjectController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/p', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
// appointment controller
Route::resource('appointment_request', appointmentRequestController::class);

//userRoutes
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::delete('/delete_user/{id}',[\App\Http\Controllers\UserController::class, 'destroy']);
Route::post('/restore_user/{id}', [\App\Http\Controllers\UserController::class, 'restore']);
/*Route::get('/users', '\App\Http\Controllers\UserController@index');
Route::patch('/user/{id}', '\App\Http\Controllers\UserController@update');
Route::delete('/user/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);*/

// Suspend doctor controller
Route::get('/suspend_doctor', [\App\Http\Controllers\SuspendDoctorController::class, 'index'])->middleware('auth');

//Mpesa Payments controller
Route::get('/mpesa_payments', [\App\Http\Controllers\MPesaPaymentsController::class, 'index'])->middleware('auth');

// Pending Payments controller
Route::get('/pending_payments', [\App\Http\Controllers\PendingPaymentsController::class, 'index']);

//Settled Payments controller
Route::get('/settled_payments', [\App\Http\Controllers\SettledPaymentsController::class, 'index']);

//Blogs controller
Route::get('/blogs', [\App\Http\Controllers\BlogsController::class, 'index']);
Route::get('/add_blog', [\App\Http\Controllers\BlogsController::class, 'addBlog']);
Route::post('/create_blog', [\App\Http\Controllers\BlogsController::class, 'create']);

// appointment request
Route::get('/appointment_request', [appointmentRequestController::class, 'index']);
Route::delete('/delete_request/{id}', [appointmentRequestController::class, 'destroy']);
Route::post('/reassign_doctor/{id}', [appointmentRequestController::class, 'reassignDoctor']);

// appointments
Route::get('/appointments', [\App\Http\Controllers\AppointmentController::class, 'index']);
