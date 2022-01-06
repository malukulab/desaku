<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\GalleriesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('berita', NewsController::class)
    ->names('news')
    ->only(['index', 'show'])
    ->parameters([
        'berita' => 'slug'
    ]);

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


Route::resource('galeri', GalleriesController::class)
    ->only(['index', 'show'])
    ->names('galleries')
    ->parameters([
        'galeri' => 'slug'
    ]);
