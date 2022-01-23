<?php

use Illuminate\Support\Facades\Route;


    Route::get('/',[App\Http\Controllers\Admin\AdminController::class,'index'])->name('home');


    Route::group(['prefix'=>"/users",'as'=>"users."],base_path('routes/admin/users.php'));

    Route::group(['prefix'=>"/user_roles",'as'=>"user_roles."],base_path("routes/admin/user_roles.php"));

    Route::group(['prefix'=>"/permissions",'as'=>"permissions."],base_path("routes/admin/permissions.php"));

    Route::group(['prefix'=>"/pages",'as'=>"pages."],base_path('routes/admin/pages.php'));

    Route::group(['prefix'=>"/categories",'as'=>"categories."],base_path('routes/admin/categories.php'));

    Route::group(['prefix'=>"/posts",'as'=>"posts."],base_path('routes/admin/posts.php'));

    Route::group(['prefix'=>"/tags",'as'=>"tags."],base_path('routes/admin/tags.php'));

    Route::group(['prefix'=>"/comments",'as'=>"comments."],base_path('routes/admin/comments.php'));

    Route::group(['prefix'=>"/menus",'as'=>"menus."],base_path('routes/admin/menus.php'));

    Route::group(['prefix'=>"/multimedia",'as'=>"multimedia."],base_path('routes/admin/multimedia.php'));

    Route::group(['prefix'=>"/appearance",'as'=>"appearance."],base_path("routes/admin/appearance.php"));

    Route::group(['prefix'=>"/settings",'as'=>"settings."],base_path("routes/admin/settings.php"));

    Route::group(['prefix'=>"/modules",'as'=>"base_modules."],base_path("routes/admin/modules.php"));

    Route::group(['prefix'=>"/templates",'as'=>"templates."],base_path("routes/admin/templates.php"));

    Route::group(['prefix'=>"/site-builder",'as'=>"site_builder."],base_path("routes/admin/site_builder.php"));

    Route::group(['prefix'=>"/security/policy",'as'=>"security_policy."],base_path("routes/admin/security_policy.php"));

