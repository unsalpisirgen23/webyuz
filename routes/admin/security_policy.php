<?php


use Illuminate\Support\Facades\Route;



Route::get('/permission', [App\Http\Controllers\Admin\SecurityPolicyController::class, 'permissionPolicy'])
    ->name('permissionPolicy');

Route::get('/permission/edit/{id}', [App\Http\Controllers\Admin\SecurityPolicyController::class, 'permissionPolicyEdit'])
    ->name('permissionPolicyEdit');

Route::post('/permission/update/{id}', [App\Http\Controllers\Admin\SecurityPolicyController::class, 'permissionPolicyUpdate'])
    ->name('permissionPolicyUpdate');


Route::get('/permission/group/policy/index', [App\Http\Controllers\Admin\SecurityPolicyController::class, 'GroupPolicyIndex'])
    ->name('GroupPolicyIndex');


Route::get('/permission/group/policy/assignment/{id}', [App\Http\Controllers\Admin\SecurityPolicyController::class, 'GroupPolicyAssignment'])
    ->name('GroupPolicyAssignment');


Route::post('/permission/group/policy/update/{id}', [App\Http\Controllers\Admin\SecurityPolicyController::class, 'GroupPolicyUpdate'])
    ->name('GroupPolicyUpdate');



