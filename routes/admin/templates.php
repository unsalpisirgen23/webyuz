<?php

use Illuminate\Support\Facades\Route;



Route::get('/',             [App\Http\Controllers\Admin\TemplatesController::class,'index'   ])->name('index');
Route::get('/create',       [App\Http\Controllers\Admin\TemplatesController::class,'create'  ])->name('create');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\TemplatesController::class,'edit'    ])->name('edit');
Route::post('/store',       [App\Http\Controllers\Admin\TemplatesController::class,'store'   ])->name('store');
Route::post('/update/{id}', [App\Http\Controllers\Admin\TemplatesController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\TemplatesController::class,'destroy'])->name('destroy');



