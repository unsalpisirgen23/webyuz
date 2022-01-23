<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\MultimediaController::class,'index'   ])->name('index')->middleware("user_roles:Multimedia,List");
Route::get('/show/{id}',         [App\Http\Controllers\Admin\MultimediaController::class,'show'    ])->name('show')->middleware("user_roles:Multimedia,Show");
Route::get('/create',       [App\Http\Controllers\Admin\MultimediaController::class,'create'  ])->name('create')->middleware("user_roles:Multimedia,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\MultimediaController::class,'edit'    ])->name('edit')->middleware("user_roles:Multimedia,Edit");
Route::post('/store',       [App\Http\Controllers\Admin\MultimediaController::class,'store'   ])->name('store')->middleware("user_roles:Multimedia,Create");
Route::post('/update/{id}', [App\Http\Controllers\Admin\MultimediaController::class,'update'  ])->name('update')->middleware("user_roles:Multimedia,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\MultimediaController::class,'destroy'])->name('destroy')->middleware("user_roles:Multimedia,destroy");



