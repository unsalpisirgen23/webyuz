<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [Modules\ScrollingPictures\Controllers\ScrollingPicturesController::class,'index'   ])->name('index');
Route::get('/show/{id}',         [Modules\ScrollingPictures\Controllers\ScrollingPicturesController::class,'show'    ])->name('show');
Route::get('/create',       [Modules\ScrollingPictures\Controllers\ScrollingPicturesController::class,'create'  ])->name('create');
Route::post('/store',       [Modules\ScrollingPictures\Controllers\ScrollingPicturesController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [Modules\ScrollingPictures\Controllers\ScrollingPicturesController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [Modules\ScrollingPictures\Controllers\ScrollingPicturesController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[Modules\ScrollingPictures\Controllers\ScrollingPicturesController::class,'destroy'])->name('destroy');



