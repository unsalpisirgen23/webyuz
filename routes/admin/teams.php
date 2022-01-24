<?php

use Illuminate\Support\Facades\Route;
Route::get("/",[App\Http\Controllers\Admin\TeamsController::class,"index"])->name("index");
Route::get("/create",[App\Http\Controllers\Admin\TeamsController::class,"create"])->name("create");
Route::get("/edit/{id?}",[App\Http\Controllers\Admin\TeamsController::class,"edit"])->name("edit");
Route::post("/store",[App\Http\Controllers\Admin\TeamsController::class,"store"])->name("store");
Route::post("/update/{id?}",[App\Http\Controllers\Admin\TeamsController::class,"update"])->name("update");
Route::post("/destroy/{id}",[App\Http\Controllers\Admin\TeamsController::class,"destroy"])->name("destroy");


