<?php


use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
Route::get('/show/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'show'])->name('show');
Route::get('/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('store');
Route::get('/edit/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('update');
Route::post('/destroy/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('destroy');


Route::group(['prefix' => "/categories", "as" => "galleryCategories."], function () {
    Route::get('/', [App\Http\Controllers\Admin\GalleryCategoriesController::class, 'index'])->name('index');
    Route::get('/show/{id}', [App\Http\Controllers\Admin\GalleryCategoriesController::class, 'show'])->name('show');
    Route::get('/create', [App\Http\Controllers\Admin\GalleryCategoriesController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\Admin\GalleryCategoriesController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\GalleryCategoriesController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\GalleryCategoriesController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [App\Http\Controllers\Admin\GalleryCategoriesController::class, 'destroy'])->name('destroy');
});







