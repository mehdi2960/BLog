<?php

use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Auth\AuthTokenController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Home\CommentController;
use App\Http\Controllers\Home\ProductController;
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

//Products Show
Route::get('/products', [ProductController::class, 'index'])->name('products.show');
Route::get('/products/{product}', [ProductController::class, 'singleProduct'])->name('products.single');
Route::post('/product/comment', [CommentController::class, 'sendComment'])->name('send.comment');

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
    Route::resource('/products','Admin\ProductController');
    Route::resource('/product.discount','Admin\DiscountController');
    Route::resource('/comments','Admin\CommentController');
});
Auth::routes();

