<?php

use App\Http\Controllers\Admin\About\InfoController;
use App\Http\Controllers\Admin\About\OrganizationController;
use App\Http\Controllers\Admin\About\VillagesController;
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
use App\Http\Controllers\Admin\BusinnesProductSettingController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Settings\ChangeRunningTextController;
use App\Http\Controllers\Admin\Settings\ChangeCarousellController;
use App\Http\Controllers\Admin\Settings\ChangeLogoController;
use App\Http\Controllers\Admin\Village\EducationsController;
use App\Http\Controllers\Admin\Village\GeneralController;
use App\Http\Controllers\Admin\Village\TrantibController;
use App\Http\Controllers\Admin\InfoGraphicController;
use App\Http\Controllers\Admin\ProductSettingController;
use App\Http\Controllers\Admin\TourSettingController;
use App\Http\Controllers\Admin\MasterStatisticsController;
use App\Http\Controllers\Admin\StatisticsController;

Route::get('/', DashboardController::class)
    ->name('index');

Route::resource('berita', NewsController::class)
    ->names('news')
    ->parameters([
        'berita' => 'id'
    ]);


Route::prefix('/tentang')->as('about.')->group(function () {
    Route::get('/desa', [VillagesController::class, 'index'])
        ->name('villages.index');

    Route::put('/desa', [VillagesController::class, 'update'])
        ->name('villages.update');

    Route::get('/organisasi', [OrganizationController::class, 'index'])
        ->name('organization.index');

    Route::put('/organisasi', [OrganizationController::class, 'update'])
        ->name('organization.update');


    Route::get('/info', [InfoController::class, 'index'])
        ->name('info.index');

    Route::put('/info', [InfoController::class, 'update'])
        ->name('info.update');

});

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

    Route::get('/info-grafis', [InfoGraphicController::class, 'index'])
        ->name('info-graphic.index');

    Route::post('/info-grafis', [InfoGraphicController::class, 'store'])
        ->name('info-graphic.store');

    Route::delete('/info-grafis/{id}', [InfoGraphicController::class, 'destroy'])
        ->name('info-graphic.destroy');


    Route::resource('berkas', FileController::class)
        ->names('file')
        ->only(['index', 'create', 'store', 'destroy'])
        ->parameters([
            'berkas' => 'id'
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

Route::resource('master-statistik', MasterStatisticsController::class)
    ->names('master-statistics')
    ->parameters([
        'master-statistik' => 'id'
    ]);


Route::get('statistik/{id}', [StatisticsController::class, 'create'])
    ->name('statistics.create');
Route::post('statistik/{id}', [StatisticsController::class, 'store'])
    ->name('statistics.store');

Route::get('statistik/{id}/edit', [StatisticsController::class, 'edit'])
    ->name('statistics.edit');
Route::put('statistik/{id}/edit', [StatisticsController::class, 'update'])
    ->name('statistics.update');

Route::delete('statistik/{id}', [StatisticsController::class, 'destroy'])
    ->name('statistics.destroy');

Route::prefix('/pengaturan')->as('settings.')->group(function () {



    Route::get('/logo', [ChangeLogoController::class, 'index'])
        ->name('logo.index');

    Route::put('/logo', [ChangeLogoController::class, 'update'])
        ->name('logo.update');

    Route::resource('banner', ChangeCarousellController::class)
        ->names('carousels')
        ->except('show')
        ->parameters([
            'banner' => 'id'
        ]);

    Route::get('/running-text', [ChangeRunningTextController::class, 'index'])
        ->name('running-text.index');

    Route::put('/running-text', [ChangeRunningTextController::class, 'update'])
        ->name('running-text.update');


    Route::get('/wisata', [TourSettingController::class, 'index'])
        ->name('tours.index');

    Route::put('/wisata', [TourSettingController::class, 'update'])
        ->name('tours.update');

    Route::get('/produk', [ProductSettingController::class, 'index'])
        ->name('products.index');

    Route::put('/produk', [ProductSettingController::class, 'update'])
        ->name('products.update');

    Route::get('/ukm', [BusinnesProductSettingController::class, 'index'])
        ->name('ukm.index');

    Route::put('/ukm', [BusinnesProductSettingController::class, 'update'])
        ->name('ukm.update');

});

Route::view('/login', 'auth.login')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');




