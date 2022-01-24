<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\SliderController::class,'index'   ])->name('index')->middleware("user_roles:Sliders,List");
Route::get('/show/{id}',         [App\Http\Controllers\Admin\SliderController::class,'show'    ])->name('show')->middleware("user_roles:Sliders,Show");
Route::get('/create',       [App\Http\Controllers\Admin\SliderController::class,'create'  ])->name('create')->middleware("user_roles:Sliders,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\SliderController::class,'edit'    ])->name('edit')->middleware("user_roles:Sliders,Edit");
Route::post('/store',       [App\Http\Controllers\Admin\SliderController::class,'store'   ])->name('store')->middleware("user_roles:Sliders,Create");
Route::post('/update/{id}', [App\Http\Controllers\Admin\SliderController::class,'update'  ])->name('update')->middleware("user_roles:Sliders,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\SliderController::class,'destroy'])->name('destroy')->middleware("user_roles:Sliders,Destroy");


