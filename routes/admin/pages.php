<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\PageController::class,'index'   ])->name('index')->middleware("user_roles:Pages,List");
Route::get('/show/{id}',         [App\Http\Controllers\Admin\PageController::class,'show'    ])->name('show')->middleware("user_roles:Pages,Show");
Route::get('/create',       [App\Http\Controllers\Admin\PageController::class,'create'  ])->name('create')->middleware("user_roles:Pages,Create");
Route::post('/store',       [App\Http\Controllers\Admin\PageController::class,'store'   ])->name('store')->middleware("user_roles:Pages,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\PageController::class,'edit'    ])->name('edit')->middleware("user_roles:Pages,Edit");
Route::post('/update/{id}', [App\Http\Controllers\Admin\PageController::class,'update'  ])->name('update')->middleware("user_roles:Pages,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\PageController::class,'destroy'])->name('destroy')->middleware("user_roles:Pages,Destroy");





