<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\UserRoleController::class,'index'   ])->name('index')->middleware("user_roles:UserRoles,List");
Route::get('/create',       [App\Http\Controllers\Admin\UserRoleController::class,'create'  ])->name('create')->middleware("user_roles:UserRoles,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\UserRoleController::class,'edit'    ])->name('edit')->middleware("user_roles:UserRoles,Edit");
Route::post('/store',       [App\Http\Controllers\Admin\UserRoleController::class,'store'   ])->name('store')->middleware("user_roles:UserRoles,Create");
Route::post('/update/{id}', [App\Http\Controllers\Admin\UserRoleController::class,'update'  ])->name('update')->middleware("user_roles:UserRoles,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\UserRoleController::class,'destroy'])->name('destroy')->middleware("user_roles:UserRoles,Destroy");
Route::get("/action/{id}",[App\Http\Controllers\Admin\UserRoleController::class,'action'])->name("action")->middleware("user_roles:UserRoles,Action");
Route::post("/action/save/{id}",[App\Http\Controllers\Admin\UserRoleController::class,'save'])->name("save")->middleware("user_roles:UserRoles,Save");


