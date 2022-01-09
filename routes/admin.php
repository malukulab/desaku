<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BusinessProductController;
use App\Http\Controllers\Admin\UploadersController;

Route::get('/', DashboardController::class)
    ->name('index');

Route::resource('berita', NewsController::class)
    ->names('news')
    ->parameters([
        'berita' => 'id'
    ]);

Route::prefix('/potensi')->group(function () {

    Route::resource('produk', ProductController::class)
        ->names('products')
        ->parameters([
            'produk' => 'id'
        ]);

    Route::resource('ukm', BusinessProductController::class)
        ->names('ukm')
        ->parameters([
            'ukm' => 'id'
        ]);
});


Route::resource('uploaders', UploadersController::class)
    ->parameters([
        'uploader' => 'id'
    ]);
