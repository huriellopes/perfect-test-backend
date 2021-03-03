<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', 'Web\DashboardController@index')->name('dashboard');

    Route::prefix('sales')->group(function () {
        Route::get('/', 'Web\SalesController@create')->name('sales/create');

        Route::prefix('api')->group(function () {
            Route::post('/store', 'Api\SalesController@store')->name('sales.store');
        });
    });

    Route::prefix('products')->group(function () {
        Route::get('/', 'Web\ProductsController@create')->name('products/create');
        Route::get('/{product}', 'Web\ProductsController@show')->name('products/show');

        Route::prefix('api')->group(function () {
            Route::post('/store', 'Api\ProductsController@store')->name('products.store');
            Route::post('/show', 'Api\ProductsController@show')->name('products.show');
            Route::post('/update/{product}', 'Api\ProductsController@update')->name('products.update');
            Route::post('/delete/{product}', 'Api\ProductsController@delete')->name('products.delete');
        });
    });
});
