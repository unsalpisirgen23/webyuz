<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\Layout\MenuController::class,'index'   ])->name('index');
Route::get('/show/{id}',         [App\Http\Controllers\Admin\Layout\MenuController::class,'show'    ])->name('show');
Route::get('/create',       [App\Http\Controllers\Admin\Layout\MenuController::class,'create'  ])->name('create');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\Layout\MenuController::class,'edit'    ])->name('edit');
Route::post('/store',       [App\Http\Controllers\Admin\Layout\MenuController::class,'store'   ])->name('store');
Route::post('/update/{id}', [App\Http\Controllers\Admin\Layout\MenuController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\Layout\MenuController::class,'destroy'])->name('destroy');





