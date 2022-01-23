<?php

use Illuminate\Support\Facades\Route;

Route::get('/',             [Modules\Testimonials\Controllers\TestimonialsController::class,'index'   ])->name('index');
Route::get('/show/{id}',         [Modules\Testimonials\Controllers\TestimonialsController::class,'show'    ])->name('show');
Route::get('/create',       [Modules\Testimonials\Controllers\TestimonialsController::class,'create'  ])->name('create');
Route::post('/store',       [Modules\Testimonials\Controllers\TestimonialsController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [Modules\Testimonials\Controllers\TestimonialsController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [Modules\Testimonials\Controllers\TestimonialsController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[Modules\Testimonials\Controllers\TestimonialsController::class,'destroy'])->name('destroy');

