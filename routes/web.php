<?php

use App\Http\Controllers\Auth\AuthTokenController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Profile\ProfileController;
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
Route::get('/', [HomeController::class, 'index']);

//Route::get('/', function (){
//    return \auth()->user()->activeCode()->create([
//        'code'=>111111,
//        'expired_at'=>now()->addMinute(10)
//    ]);
//});

//google
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::get('/logout', [LogoutController::class, 'logoutForm']);

//Token Two Authenticated
Route::get('/auth/token',[AuthTokenController::class,'getToken'])->name('auth.token');
Route::post('/auth/token',[AuthTokenController::class,'postToken']);

//Profile Front
Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::get('twoFactor', [ProfileController::class, 'twoFactorAuth'])->name('twoFactorAuth');
    Route::post('twoFactor', [ProfileController::class, 'insFactorAuth'])->name('ins.twoFactor');

    Route::get('twoFacto/phone-verify', [ProfileController::class, 'getPhoneVerify'])->name('phone.verify');
    Route::post('twoFacto/phone-verify', [ProfileController::class, 'postPhoneVerify']);

});

//Admin Panel
Route::get('/dashboard', function () {
    return view('dashboard.home');
})->name('dashboard');


Route::prefix('dashboard')->group(function (){
    Route::resource('/users','Admin\UserController');
});
Auth::routes();

