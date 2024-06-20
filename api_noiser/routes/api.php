<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\PublicationsController;
use App\Http\Controllers\RatingsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::resource('users', UsersController::class);
Route::resource('publications', PublicationsController::class);
Route::resource('ratings', RatingsController::class);
