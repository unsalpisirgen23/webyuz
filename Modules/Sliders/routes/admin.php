<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [Modules\Sliders\Controllers\SliderController::class,'index'   ])->name('index');
Route::get('/show/{id}',         [Modules\Sliders\Controllers\SliderController::class,'show'    ])->name('show');
Route::get('/create',       [Modules\Sliders\Controllers\SliderController::class,'create'  ])->name('create');
Route::get('/edit/{id}',    [Modules\Sliders\Controllers\SliderController::class,'edit'    ])->name('edit');
Route::post('/store',       [Modules\Sliders\Controllers\SliderController::class,'store'   ])->name('store');
Route::post('/update/{id}', [Modules\Sliders\Controllers\SliderController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[Modules\Sliders\Controllers\SliderController::class,'destroy'])->name('destroy');
