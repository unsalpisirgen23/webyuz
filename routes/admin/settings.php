<?php

use Illuminate\Support\Facades\Route;



Route::get("/appearance/edit",[\App\Http\Controllers\Admin\SettingController::class,"appearance_edit"])->name("appearance_edit");

Route::post("/appearance/update",[\App\Http\Controllers\Admin\SettingController::class,"appearance_update"])->name("appearance_update");

Route::get("/site_setting/edit",[\App\Http\Controllers\Admin\SettingController::class,"site_setting_edit"])->name("site_setting_edit");

Route::post("/site_setting/update",[\App\Http\Controllers\Admin\SettingController::class,"site_setting_update"])->name("site_setting_update");



