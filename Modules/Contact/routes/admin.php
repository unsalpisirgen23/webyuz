<?php

use Illuminate\Support\Facades\Route;

Route::get('/',             [Modules\Contact\Controllers\ContactController::class,'index'   ])->name('index');
Route::get('/show/{id}',         [Modules\Contact\Controllers\ContactController::class,'show'    ])->name('show');
Route::get('/create',       [Modules\Contact\Controllers\ContactController::class,'create'  ])->name('create');
Route::post('/store',       [Modules\Contact\Controllers\ContactController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [Modules\Contact\Controllers\ContactController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [Modules\Contact\Controllers\ContactController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[Modules\Contact\Controllers\ContactController::class,'destroy'])->name('destroy');

