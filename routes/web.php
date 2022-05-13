<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Front
Route::get('/', [HomeController::class,'index']);
Route::get('/auth/google', [GoogleAuthController::class,'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class,'callback']);
Route::get('/logout', [LogoutController::class ,'logoutForm']);

//Admin
Route::get('/dashboard', [\App\Http\Controllers\Admin\HomeController::class,'index']);

Auth::routes();

