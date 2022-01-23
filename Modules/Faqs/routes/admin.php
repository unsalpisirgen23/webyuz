<?php

use Illuminate\Support\Facades\Route;



Route::get('/',             [Modules\Faqs\Controllers\FaqController::class,'index'   ])->name('index');
Route::get('/show/{id}',         [Modules\Faqs\Controllers\FaqController::class,'show'    ])->name('show');
Route::get('/create',       [Modules\Faqs\Controllers\FaqController::class,'create'  ])->name('create');
Route::post('/store',       [Modules\Faqs\Controllers\FaqController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [Modules\Faqs\Controllers\FaqController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [Modules\Faqs\Controllers\FaqController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[Modules\Faqs\Controllers\FaqController::class,'destroy'])->name('destroy');





