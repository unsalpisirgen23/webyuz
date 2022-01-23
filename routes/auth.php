<?php

use Illuminate\Support\Facades\Route;


    Route::get('/login',[App\Http\Controllers\Auth\AuthController::class,"login"])->name("login")->middleware("subAuth");

    Route::post("/login/authentication",[App\Http\Controllers\Auth\AuthController::class,"authentication"])->name("login_authentication");

    Route::post("/logout", [App\Http\Controllers\Auth\AuthController::class,"logout"])->name("logout");

    Route::post("/ajax/user", [App\Http\Controllers\Auth\AuthController::class,"ajaxIsUser"])->name("ajaxIsUser");












