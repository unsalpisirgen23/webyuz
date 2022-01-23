<?php


use Illuminate\Support\Facades\Route;

/**
 *  Create and Store Delete
 */


Route::get('/',             [App\Http\Controllers\Admin\CommentController::class,'index'   ])->name('index')->middleware("user_roles:Comments,List");
Route::get('/show/{id}',         [App\Http\Controllers\Admin\CommentController::class,'show'    ])->name('show')->middleware("user_roles:Comments,Show");
Route::get('/create',       [App\Http\Controllers\Admin\CommentController::class,'create'  ])->name('create')->middleware("user_roles:Comments,Create");
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\CommentController::class,'edit'    ])->name('edit')->middleware("user_roles:Comments,Edit");
Route::post('/store',       [App\Http\Controllers\Admin\CommentController::class,'store'   ])->name('store')->middleware("user_roles:Comments,Create");
Route::post('/update/{id}', [App\Http\Controllers\Admin\CommentController::class,'update'  ])->name('update')->middleware("user_roles:Comments,Edit");
Route::post('/destroy/{id}',[App\Http\Controllers\Admin\CommentController::class,'destroy'])->name('destroy')->middleware("user_roles:Comments,Destroy");



