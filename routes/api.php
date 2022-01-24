<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::get("/categories/ajax/index",
    [\App\Http\Controllers\Admin\CategoryController::class,"indexAjax"])
    ->name("api.categories.ajax");


Route::get("/categories/ajax/parent_index",
    [\App\Http\Controllers\Admin\CategoryController::class,"parent_index"])
    ->name("api.categories.parent_index");


Route::post("/categories/ajax/option_select",
    [\App\Http\Controllers\Admin\CategoryController::class,"option_select"])
    ->name("api.categories.option_select");


Route::post("/categories/ajax/parent_create",
    [\App\Http\Controllers\Admin\CategoryController::class,"parent_create"])
    ->name("api.categories.parent_create");


