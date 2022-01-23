<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\PermissionController::class,'index'   ])->name('index');
Route::get('/create',       [App\Http\Controllers\Admin\PermissionController::class,'create'  ])->name('create');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\PermissionController::class,'edit'    ])->name('edit');
Route::post('/store',       [App\Http\Controllers\Admin\PermissionController::class,'store'   ])->name('store');
Route::post('/update/{id}', [App\Http\Controllers\Admin\PermissionController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\PermissionController::class,'destroy'])->name('destroy');





