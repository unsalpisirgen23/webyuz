<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\PostController::class,'index'   ])->name('index')->middleware("user_roles:Posts,List");
Route::get('/show/{id}',         [App\Http\Controllers\Admin\PostController::class,'show'    ])->name('show')->middleware("user_roles:Posts,Show");
Route::get('/create',       [App\Http\Controllers\Admin\PostController::class,'create'  ])->name('create')->middleware("user_roles:Posts,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\PostController::class,'edit'    ])->name('edit')->middleware("user_roles:Posts,Edit");
Route::post('/store',       [App\Http\Controllers\Admin\PostController::class,'store'   ])->name('store')->middleware("user_roles:Posts,Create");
Route::post('/update/{id}', [App\Http\Controllers\Admin\PostController::class,'update'  ])->name('update')->middleware("user_roles:Posts,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\PostController::class,'destroy'])->name('destroy')->middleware("user_roles:Posts,Destroy");


