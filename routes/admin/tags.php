<?php

use Illuminate\Support\Facades\Route;



Route::get('/',             [App\Http\Controllers\Admin\TagController::class,'index'   ])->name('index')->middleware("user_roles:Tags,List");
Route::get('/show/{id}',         [App\Http\Controllers\Admin\TagController::class,'show'    ])->name('show')->middleware("user_roles:Tags,Show");
Route::get('/create',       [App\Http\Controllers\Admin\TagController::class,'create'  ])->name('create')->middleware("user_roles:Tags,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\TagController::class,'edit'    ])->name('edit')->middleware("user_roles:Tags,Edit");
Route::post('/store',       [App\Http\Controllers\Admin\TagController::class,'store'   ])->name('store')->middleware("user_roles:Tags,Create");
Route::post('/update/{id}', [App\Http\Controllers\Admin\TagController::class,'update'  ])->name('update')->middleware("user_roles:Tags,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\TagController::class,'destroy'])->name('destroy')->middleware("user_roles:Tags,Destroy");



