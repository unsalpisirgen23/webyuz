<?php

use Illuminate\Support\Facades\Route;



// settlements

Route::group(['prefix'=>"/settlements",'as'=>"settlements."],function (){

    Route::get('/index',[App\Http\Controllers\Admin\SettlementController::class,'index'])->name('index');


});

Route::group(['prefix'=>"/design",'as'=>"design."],function (){

    Route::get('/index',[App\Http\Controllers\Admin\DesignController::class,'index'])->name('index');


});



Route::group(['prefix'=>"/menus",'as'=>"menus."],function (){

    Route::get('/index',[App\Http\Controllers\Admin\AppearanceMenuController::class,'index'])->name('index');
    Route::get('/create',[App\Http\Controllers\Admin\AppearanceMenuController::class,'create'])->name('create');
    Route::post('/store',[App\Http\Controllers\Admin\AppearanceMenuController::class,'store'])->name('store');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\AppearanceMenuController::class,'edit'])->name('edit');
    Route::post('/update',[App\Http\Controllers\Admin\AppearanceMenuController::class,'update'])->name('update');
    Route::post('/destroy/{id}',[App\Http\Controllers\Admin\AppearanceMenuController::class,'destroy'])->name('destroy');




});



Route::group(['prefix'=>"/temps",'as'=>"temps."],function (){

    Route::get('/index',[App\Http\Controllers\Admin\TemplateController::class,'index'])->name('index');

    Route::post('/update',[App\Http\Controllers\Admin\TemplateController::class,'update'])->name('update');

});
