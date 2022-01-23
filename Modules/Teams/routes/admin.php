<?php

use Illuminate\Support\Facades\Route;
Route::get("/",[\Modules\Teams\Controllers\TeamsController::class,"index"])->name("index");
Route::get("/create",[\Modules\Teams\Controllers\TeamsController::class,"create"])->name("create");
Route::get("/edit/{id?}",[\Modules\Teams\Controllers\TeamsController::class,"edit"])->name("edit");
Route::post("/store",[\Modules\Teams\Controllers\TeamsController::class,"store"])->name("store");
Route::post("/update/{id?}",[\Modules\Teams\Controllers\TeamsController::class,"update"])->name("update");
Route::post("/destroy/{id}",[\Modules\Teams\Controllers\TeamsController::class,"destroy"])->name("destroy");


