<?php

use Illuminate\Support\Facades\Route;

Route::get('/',             [App\Http\Controllers\Admin\ContactController::class,'index'   ])->name('index');
Route::get('/show/{id}',         [App\Http\Controllers\Admin\ContactController::class,'show'    ])->name('show');
Route::get('/create',       [App\Http\Controllers\Admin\ContactController::class,'create'  ])->name('create');
Route::post('/store',       [App\Http\Controllers\Admin\ContactController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\ContactController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\ContactController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\ContactController::class,'destroy'])->name('destroy');

