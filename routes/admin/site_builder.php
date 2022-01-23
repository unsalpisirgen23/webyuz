<?php
use Illuminate\Support\Facades\Route;


Route::get("/",[\App\Http\Controllers\Admin\SiteBuilderController::class,"index"])->name("index");


Route::get("/create",[\App\Http\Controllers\Admin\SiteBuilderController::class,"create"])->name("create");


Route::get("/edit/{id}",[\App\Http\Controllers\Admin\SiteBuilderController::class,"edit"])->name("edit");


Route::post("/update/{id}",[\App\Http\Controllers\Admin\SiteBuilderController::class,"update"])->name("update");


Route::post("/store",[\App\Http\Controllers\Admin\SiteBuilderController::class,"store"])->name("store");


Route::post("/destroy/{id}",[\App\Http\Controllers\Admin\SiteBuilderController::class,"destroy"])->name("destroy");
