<?php

use Illuminate\Support\Facades\Route;

Route::get("/custom/fields/",[App\Http\Controllers\Admin\ServicesTableController::class,"index"])->name("index");
Route::get("/custom/fields/create",[App\Http\Controllers\Admin\ServicesTableController::class,"create"])->name("create");
Route::get("/custom/fields/edit/{id?}",[App\Http\Controllers\Admin\ServicesTableController::class,"edit"])->name("edit");
Route::post("/custom/fields/store",[App\Http\Controllers\Admin\ServicesTableController::class,"store"])->name("store");
Route::post("/custom/fields/update/{id?}",[App\Http\Controllers\Admin\ServicesTableController::class,"update"])->name("update");
Route::post("/custom/fields/destroy/{id}",[App\Http\Controllers\Admin\ServicesTableController::class,"destroy"])->name("destroy");


