<?php

use Illuminate\Support\Facades\Route;



Route::domain('{domain}.'.env('APP_URL'))->as("domain.")->group(function () {

Route::get('/', [\App\Http\Controllers\HomeController::class,'subdomain'])->name("site");


Route::get('/admin',[App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin')->middleware("auth");

Route::post("/login/authentication",[App\Http\Controllers\Auth\AuthController::class,"authentication"])->name("login_authentication");



});



Route::group(['middleware'=>"web"],base_path('routes/auth.php'));

// Route::fallback([\App\Http\Controllers\NotFoundController::class,"index"]);

Route::get('/',[\App\Http\Controllers\HomeController::class,"index"])->name("home");

