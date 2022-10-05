<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CulturesController;
use App\Http\Controllers\BusinessProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\ApparatusController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class)
    ->name('index');

Route::get('/organisasi', OrganizationController::class)
    ->name('organization.index');


Route::get('/statistik/{slug}', StatisticsController::class)
    ->name('statistic.show');

Route::resource('berita', NewsController::class)
    ->names('news')
    ->only(['index', 'show'])
    ->parameters([
        'berita' => 'slug'
    ]);

Route::resource('seni-kebudayaan', CulturesController::class)
    ->names('cultures')
    ->only(['index', 'show'])
    ->parameters([
        'seni-kebudayaan' => 'slug'
    ]);

Route::get('/sejarah', HistoryController::class)
    ->name('history.index');

Route::get('/aparatur-desa', ApparatusController::class)
    ->name('apparatus.index');


Route::prefix('/potensi')->name('potencies.')->group(function () {

    Route::resource('ukm', BusinessProductController::class)
        ->names('ukm')
        ->only(['index', 'show'])
        ->parameters([
            'ukm' => 'slug'
        ]);

    Route::resource('produk', ProductController::class)
        ->names('products')
        ->only(['index', 'show'])
        ->parameters([
            'produk' => 'slug'
        ]);

    Route::resource('wisata', ToursController::class)
        ->names('tours')
        ->only(['index', 'show'])
        ->parameters([
            'wisata' => 'slug'
        ]);
});

Route::prefix('/galeri')->as('gelleries.')->group(function () {
    Route::get('/kegiatan', [ActivitiesController::class, 'index'])
        ->name('activities.index');

    Route::get('/kegiatan/{slug}', [ActivitiesController::class, 'show'])
        ->name('activities.show');

    Route::get('/dokumentasi', [DocumentationController::class, 'index'])
        ->name('documentation.index');

    Route::get('/dokumentasi/{slug}', [DocumentationController::class, 'show'])
        ->name('documentation.show');

    Route::get('/berkas', FileController::class)
        ->name('file.index');
});

Route::resource('galeri', GalleriesController::class)
    ->only(['index', 'show'])
    ->names('galleries')
    ->parameters([
        'galeri' => 'slug'
    ]);
