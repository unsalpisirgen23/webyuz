<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\MenuController::class,'index'   ])->name('index')->middleware("user_roles:Menus,List");
Route::get('/{id}',         [App\Http\Controllers\Admin\MenuController::class,'show'    ])->name('show')->middleware("user_roles:Menus,Show");
Route::get('/create',       [App\Http\Controllers\Admin\MenuController::class,'create'  ])->name('create')->middleware("user_roles:Menus,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\MenuController::class,'edit'    ])->name('edit')->middleware("user_roles:Menus,Edit");
Route::post('/store',       [App\Http\Controllers\Admin\MenuController::class,'store'   ])->name('store')->middleware("user_roles:Menus,Create");
Route::post('/update/{id}', [App\Http\Controllers\Admin\MenuController::class,'update'  ])->name('update')->middleware("user_roles:Menus,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\MenuController::class,'destroy'])->name('destroy')->middleware("user_roles:Menus,Destroy");


