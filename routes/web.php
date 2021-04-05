<?php

use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('login', 'login')->middleware('guest')->name('login');
Route::view('signup', 'signup')->middleware('guest')->name('signup');
Route::post('login', LoginController::class);
Route::post('signup', RegisterUserController::class);
Route::post('create-recipe', CreateRecipeController::class)->middleware('auth')->name('create-recipe');
Route::get('logout', LogoutController::class)->middleware('auth');
