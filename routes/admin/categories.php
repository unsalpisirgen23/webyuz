<?php
/**
 * Created by PhpStorm.
 * User: backend
 * Date: 21.12.2021
 * Time: 14:43
 */

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\CategoryController::class,'index'   ])->name('index');
Route::get('/show/{id}',    [App\Http\Controllers\Admin\CategoryController::class,'show'    ])->name('show')->middleware("user_roles:Categories,Show");
Route::get('/create',       [App\Http\Controllers\Admin\CategoryController::class,'create'  ])->name('create')->middleware("user_roles:Categories,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\CategoryController::class,'edit'    ])->name('edit')->middleware("user_roles:Categories,Edit");
Route::post('/store',       [App\Http\Controllers\Admin\CategoryController::class,'store'   ])->name('store');
Route::post('/update/{id}', [App\Http\Controllers\Admin\CategoryController::class,'update'  ])->name('update')->middleware("user_roles:Categories,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('destroy')->middleware("user_roles:Categories,Destroy");
Route::post('/all/delete',[App\Http\Controllers\Admin\CategoryController::class,'all_delete'])->name('all_delete')->middleware("user_roles:Categories,All_Destroy");

