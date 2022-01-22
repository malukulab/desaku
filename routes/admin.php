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
use App\Http\Controllers\Admin\ApparatusController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Settings\ChangeCarousellController;
use App\Http\Controllers\Admin\Settings\ChangeLogoController;
use App\Http\Controllers\Admin\Village\EducationsController;
use App\Http\Controllers\Admin\Village\GeneralController;
use App\Http\Controllers\Admin\Village\TrantibController;

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

Route::prefix('desa')->as('village.')->group(function () {
    Route::get('/umum', [GeneralController::class, 'index'])
        ->name('general');

    Route::get('/trantib', [TrantibController::class, 'index'])
        ->name('trantib');

    Route::get('/pendidikan', [EducationsController::class, 'index'])
        ->name('education');
});

Route::resource('aparatur-desa', ApparatusController::class)
    ->names('apparatus')
    ->parameters([
        'aparatur-desa' => 'id'
    ]);

Route::resource('uploaders', UploadersController::class)
    ->parameters([
        'uploader' => 'id'
    ]);

Route::prefix('/pengaturan')->as('settings.')->group(function () {
    Route::get('/logo', [ChangeLogoController::class, 'index'])
        ->name('logo.index');

    Route::put('/logo', [ChangeLogoController::class, 'update'])
        ->name('logo.update');

    Route::resource('banner', ChangeCarousellController::class)
        ->names('carousell')
        ->only(['index', 'store', 'destroy'])
        ->parameters([
            'banner' => 'id'
        ]);

});


Route::view('/login', 'auth.login')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');
