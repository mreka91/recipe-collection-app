<?php

use App\Http\Controllers\AddCommentController;
use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\DeleteCommentController;
use App\Http\Controllers\DeleteRecipeController;
use App\Http\Controllers\EditRecipeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ViewProfileController;
use App\Http\Controllers\ViewRecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class); // tested
Route::get('recipes/{recipe}/view', ViewRecipeController::class); // tested
Route::get('logout', LogoutController::class)->middleware('auth'); // tested
Route::get('recipes/{recipe}/edit', [EditRecipeController::class, 'get'])->middleware('auth'); // tested
Route::get('users/{user}/view', ViewProfileController::class); // tested

Route::view('login', 'login')->middleware('guest')->name('login'); // tested
Route::view('signup', 'signup')->middleware('guest')->name('signup'); // tested
Route::view('create-recipe', 'create-recipe')->middleware('auth');  // tested

Route::post('login', LoginController::class); // tested
Route::post('signup', RegisterUserController::class); // tested
Route::post('create-recipe', CreateRecipeController::class)->middleware('auth'); // tested
Route::post('recipes/{recipe}/comment', AddCommentController::class)->middleware('auth'); // tested

Route::put('recipes/{recipe}/edit', [EditRecipeController::class, 'edit'])->middleware('auth'); // tested
Route::delete('recipes/{recipe}/delete', DeleteRecipeController::class)->middleware('auth'); // tested
Route::delete('comments/{comment}/delete', DeleteCommentController::class)->middleware('auth'); // tested
