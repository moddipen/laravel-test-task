<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/login',[AuthController::class,'index'])->name("login");
Route::get('/logout',[AuthController::class,'logout'])->name("logout");
Route::get('/dashboard',[AuthController::class,'dashboard'])->name("dashboard")->middleware("verified");
Route::post('/login/action',[AuthController::class,'login_action'])->name("login.action");
Route::get('/register',[AuthController::class,'registation'])->name("registration");
Route::post('/register',[AuthController::class,'registation_create'])->name("registration.create");
Route::get('/products',[ProductController::class,'product_list'])->name("products");
Route::get('/user/products',[UserProductController::class,'list'])->name("user.products");
Route::post('/purchase',[ProductController::class,'purchase'])->name("purchase");

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/admin/dashboard',[AuthController::class,'admin_dashboard'])->name("admin.dashboard");
    Route::get('/admin/products',[ProductController::class,'admin_product_list'])->name("admin.products");
});

Route::get('/email/verify', function (){
    return view("auth.verify_email");
})->middleware('auth')->name('verification.message');

Route::get('/email/verify/{id}/{hash}',function(EmailVerificationRequest $request){
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['signed'])->name('verification.verify');

Route::get('/email/verify-note', function (Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->withSuccess("Verification link is sent!");
})->middleware(['auth','throttle:6,1'])->name('verification.notice');