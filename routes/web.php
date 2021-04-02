<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('login', 'login')->middleware('guest');
Route::post('login', LoginController::class);
Route::post('signup', RegisterUserController::class);
Route::get('logout', LogoutController::class);
