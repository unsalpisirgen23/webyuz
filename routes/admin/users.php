<?php

use Illuminate\Support\Facades\Route;



Route::get('/',             [App\Http\Controllers\Admin\UserController::class,'index'   ])->name('index')->middleware("user_roles:Users,List");
Route::get('/show/{id}',    [App\Http\Controllers\Admin\UserController::class,'show'    ])->name('show')->middleware("user_roles:Users,Show");
Route::get('/create',       [App\Http\Controllers\Admin\UserController::class,'create'  ])->name('create')->middleware("user_roles:Users,Create");
Route::post('/store',       [App\Http\Controllers\Admin\UserController::class,'store'   ])->name('store')->middleware("user_roles:Users,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\UserController::class,'edit'    ])->name('edit')->middleware("user_roles:Users,Edit");
Route::post('/update/{id}', [App\Http\Controllers\Admin\UserController::class,'update'  ])->name('update')->middleware("user_roles:Users,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\UserController::class,'destroy' ])->name('destroy')->middleware("user_roles:Users,Destroy");
Route::get('/profile/{id}',[App\Http\Controllers\Admin\UserController::class,'profile' ])->name('profile')->middleware("user_roles:Users,Profiles");
Route::post('/selected/all/delete',[App\Http\Controllers\Admin\UserController::class,'all_delete' ])->name('all_delete')->middleware("user_roles:Users,All Destroy");
Route::get('/notifications/status/all/',    [App\Http\Controllers\Admin\UserController::class,'notifications'])->name('notifications');
