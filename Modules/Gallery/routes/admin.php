<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [Modules\Gallery\Controllers\GalleryController::class,'index'   ])->name('index');
Route::get('/show/{id}',    [Modules\Gallery\Controllers\GalleryController::class,'show'    ])->name('show');
Route::get('/create',       [Modules\Gallery\Controllers\GalleryController::class,'create'  ])->name('create');
Route::post('/store',       [Modules\Gallery\Controllers\GalleryController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [Modules\Gallery\Controllers\GalleryController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [Modules\Gallery\Controllers\GalleryController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[Modules\Gallery\Controllers\GalleryController::class,'destroy'])->name('destroy');



Route::group(['prefix'=>"gallery/categories","as"=>"galleryCategories."],function (){
    Route::get('/',             [Modules\Gallery\Controllers\GalleryCategoriesController::class,'index'   ])->name('index');
    Route::get('/show/{id}',    [Modules\Gallery\Controllers\GalleryCategoriesController::class,'show'    ])->name('show');
    Route::get('/create',       [Modules\Gallery\Controllers\GalleryCategoriesController::class,'create'  ])->name('create');
    Route::post('/store',       [Modules\Gallery\Controllers\GalleryCategoriesController::class,'store'   ])->name('store');
    Route::get('/edit/{id}',    [Modules\Gallery\Controllers\GalleryCategoriesController::class,'edit'    ])->name('edit');
    Route::post('/update/{id}', [Modules\Gallery\Controllers\GalleryCategoriesController::class,'update'  ])->name('update');
    Route::post('/destroy/{id}',[Modules\Gallery\Controllers\GalleryCategoriesController::class,'destroy'])->name('destroy');
});







