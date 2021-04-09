<?php

use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\DeleteRecipeController;
use App\Http\Controllers\EditRecipeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ViewProfileController;
use App\Http\Controllers\ViewRecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);
Route::get('recipes/{recipe}/view', ViewRecipeController::class);
Route::get('logout', LogoutController::class)->middleware('auth');
Route::get('recipes/{recipe}/edit', [EditRecipeController::class, 'get'])->middleware('auth');
Route::get('users/{user}/view', ViewProfileController::class);

Route::view('login', 'login')->middleware('guest')->name('login');
Route::view('signup', 'signup')->middleware('guest')->name('signup');
Route::view('create-recipe', 'create-recipe')->middleware('auth');

Route::post('login', LoginController::class);
Route::post('signup', RegisterUserController::class);
Route::post('create-recipe', CreateRecipeController::class)->middleware('auth');

Route::put('recipes/{recipe}/edit', [EditRecipeController::class, 'edit'])->middleware('auth');

Route::delete('recipes/{recipe}/delete', DeleteRecipeController::class)->middleware('auth');
