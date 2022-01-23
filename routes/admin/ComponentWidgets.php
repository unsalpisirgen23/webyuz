<?php

use Illuminate\Support\Facades\Route;

Route::get("/",[\App\Http\Controllers\Admin\ComponentWidgetController::class,"index"])->name("index");




Route::get("/create",[\App\Http\Controllers\Admin\ComponentWidgetController::class,"create"])->name("create");
Route::get("/edit/{id?}",[\App\Http\Controllers\Admin\ComponentWidgetController::class,"edit"])->name("edit");
Route::post("/store",[\App\Http\Controllers\Admin\ComponentWidgetController::class,"store"])->name("store");
Route::post("/update/{id?}",[\App\Http\Controllers\Admin\ComponentWidgetController::class,"update"])->name("update");
Route::post("/destroy/{id}",[\App\Http\Controllers\Admin\ComponentWidgetController::class,"destroy"])->name("destroy");



Route::get("/get/iframe",[\App\Http\Controllers\Admin\ComponentWidgetController::class,"getIframe"])->name("getIframe");

