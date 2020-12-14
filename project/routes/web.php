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

Route::get('/', function () {
    return view('welcome');
});

//resource routes
Route::resource('projects', ProjectController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/p', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('appointment_request', appointmentRequestController::class);

//userRoutes
Route::get('/users', '\App\Http\Controllers\UserController@index');
