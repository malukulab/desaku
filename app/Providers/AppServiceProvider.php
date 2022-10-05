<?php

namespace App\Providers;

use App\Models\MasterStatistic;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\News;
use App\Models\Setting;
use ConsoleTVs\Charts\Registrar as Charts;
use App\Charts\StatisticChart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            StatisticChart::class
        ]);

        View::composer('components.sidebar-news', function ($view) {
            $listOfNews = News::latest()->limit(5)->get();

            $view->with(compact('listOfNews'));
        });

        View::composer('layouts.app', function ($view) {
            $text = Setting::findKey('running-text')->first();
            $logo = Setting::findKey('logo')->first();
            $listOfStatistics = MasterStatistic::all();

            $view->with(compact('text', 'logo', 'listOfStatistics'));
        });

        View::composer('layouts.admin', function ($view) {
            $listOfStatistics = MasterStatistic::all();

            $view->with(compact('listOfStatistics'));
        });
    }
}
