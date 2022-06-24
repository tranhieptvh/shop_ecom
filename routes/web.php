<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Client\HomeController@index')->name('/');

Route::get('/danh-muc/{slug}', 'Client\ProductController@category')->name('client.product.category');
Route::get('/san-pham', 'Client\ProductController@index')->name('client.product.index');
Route::get('/san-pham/{slug}', 'Client\ProductController@detail')->name('client.product.detail');




// ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard.index');
    })->name('admin');

    Route::get('login', 'Admin\AuthController@index');
    Route::post('login', 'Admin\AuthController@login');
    Route::get('logout', 'Admin\AuthController@logout');

    Route::group(['middleware' => ['auth.admin']], function() {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard.index');
        });

        Route::prefix('user')->group(function () {
            Route::get('/', 'Admin\UserController@index')->name('admin.user.index');
            Route::get('/create', 'Admin\UserController@create')->name('admin.user.create');
            Route::post('/store', 'Admin\UserController@store')->name('admin.user.store');
            Route::get('/edit/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
            Route::put('/update/{id}', 'Admin\UserController@update')->name('admin.user.update');
            Route::delete('/destroy/{id}', 'Admin\UserController@destroy')->name('admin.user.destroy');
        });

        Route::prefix('category')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.category.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
            Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
            Route::put('/update/{id}', 'Admin\CategoryController@update')->name('admin.category.update');
            Route::delete('/destroy/{id}', 'Admin\CategoryController@destroy')->name('admin.category.destroy');
        });

        Route::prefix('brand')->group(function () {
            Route::get('/', 'Admin\BrandController@index')->name('admin.brand.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brand.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brand.store');
            Route::get('/edit/{id}', 'Admin\BrandController@edit')->name('admin.brand.edit');
            Route::put('/update/{id}', 'Admin\BrandController@update')->name('admin.brand.update');
            Route::delete('/destroy/{id}', 'Admin\BrandController@destroy')->name('admin.brand.destroy');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('admin.product.index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.product.create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.product.store');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
            Route::put('/update/{id}', 'Admin\ProductController@update')->name('admin.product.update');
            Route::delete('/destroy/{id}', 'Admin\ProductController@destroy')->name('admin.product.destroy');
            Route::post('/upload-ckeditor', 'Admin\ProductController@upload_ckeditor');
            Route::get('/file-browser', 'Admin\ProductController@file_browser');
        });
    });
});
