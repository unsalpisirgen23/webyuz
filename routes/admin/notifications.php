<?php

use Illuminate\Support\Facades\Route;

Route::get('/',             [App\Http\Controllers\Admin\Notification::class,'index'   ])->name('index')->middleware("user_roles:Notifications,List");
Route::get('/show/{id}',    [App\Http\Controllers\Admin\Notification::class,'show'    ])->name('show')->middleware("user_roles:Notifications,Show");
Route::get('/create',       [App\Http\Controllers\Admin\Notification::class,'create'  ])->name('create')->middleware("user_roles:Notifications,Create");
Route::post('/store',       [App\Http\Controllers\Admin\Notification::class,'store'   ])->name('store')->middleware("user_roles:Notifications,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\Notification::class,'edit'    ])->name('edit')->middleware("user_roles:Notifications,Edit");
Route::post('/update/{id}', [App\Http\Controllers\Admin\Notification::class,'update'  ])->name('update')->middleware("user_roles:Notifications,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\Notification::class,'destroy' ])->name('destroy')->middleware("user_roles:Notifications,Destroy");



