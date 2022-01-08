<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;




Route::get('/', DashboardController::class)
    ->name('index');

Route::resource('berita', NewsController::class)
    ->names('news')
    ->parameters([
        'berita' => 'slug'
    ]);
