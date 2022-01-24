<?php
use Illuminate\Support\Facades\Route;



Route::get('/',             [App\Http\Controllers\Admin\FaqController::class,'index'   ])->name('index');
Route::get('/show/{id}',    [App\Http\Controllers\Admin\FaqController::class,'show'    ])->name('show');
Route::get('/create',       [App\Http\Controllers\Admin\FaqController::class,'create'  ])->name('create');
Route::post('/store',       [App\Http\Controllers\Admin\FaqController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\FaqController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\FaqController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\FaqController::class,'destroy'])->name('destroy');





