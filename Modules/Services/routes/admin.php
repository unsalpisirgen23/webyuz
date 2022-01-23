<?php

use Illuminate\Support\Facades\Route;

Route::get("/custom/fields/",[\Modules\Services\Controllers\ServicesController::class,"index"])->name("index");
Route::get("/custom/fields/create",[\Modules\Services\Controllers\ServicesController::class,"create"])->name("create");
Route::get("/custom/fields/edit/{id?}",[\Modules\Services\Controllers\ServicesController::class,"edit"])->name("edit");
Route::post("/custom/fields/store",[\Modules\Services\Controllers\ServicesController::class,"store"])->name("store");
Route::post("/custom/fields/update/{id?}",[\Modules\Services\Controllers\ServicesController::class,"update"])->name("update");
Route::post("/custom/fields/destroy/{id}",[\Modules\Services\Controllers\ServicesController::class,"destroy"])->name("destroy");


