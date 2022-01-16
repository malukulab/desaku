<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BusinessProductController;
use App\Http\Controllers\Admin\DocumentationsController;
use App\Http\Controllers\Admin\ToursController;
use App\Http\Controllers\Admin\UploadersController;
use App\Http\Controllers\Admin\CulturesController;
use App\Http\Controllers\Admin\ActivitiesController;

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

    Route::resource('wisata', ToursController::class)
        ->names('tours')
        ->parameters([
            'wisata' => 'id'
        ]);

    Route::resource('ukm', BusinessProductController::class)
        ->names('ukm')
        ->parameters([
            'ukm' => 'id'
        ]);
});

Route::prefix('/galeri')->group(function () {
    Route::resource('budaya', CulturesController::class)
        ->names('cultures')
        ->parameters(([
            'budaya' => 'id'
        ]));

    Route::resource('kegiatan', ActivitiesController::class)
        ->names('activities')
        ->parameters([
            'kegiatan' => 'id'
        ]);

    Route::resource('dokumentasi', DocumentationsController::class)
        ->names('documentation')
        ->parameters([
            'dokumentasi' => 'id'
        ]);
});


Route::resource('uploaders', UploadersController::class)
    ->parameters([
        'uploader' => 'id'
    ]);
