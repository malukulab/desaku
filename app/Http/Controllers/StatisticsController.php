<?php

namespace App\Http\Controllers;

use App\Charts\StatisticChart;
use App\Models\MasterStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class StatisticsController extends Controller
{
    public function __invoke($slug)
    {
        $master = MasterStatistic::whereSlug($slug)->first();
        $master->load('statistics');

        abort_if(
            is_null($master),
            404
        );

        $labels = [
            "Data Informasi ". Str::of($master->title)->title()
        ];

        $datasets = $master->statistics->map(function ($row) {
            $red = random_int(0, 255);
            $blue = random_int(0, 255);
            $green = random_int(0, 255);

            return [
                'label' => $row->item,
                'borderWidth' => 1.2,
                'backgroundColor' => "rgba({$red}, {$blue}, {$green}, 0.2)",
                'borderColor' => "rgb({$red}, {$blue}, {$green})",
                'borderRadius' => 5,
                'maxBarThickness' => 100,
                'data' => [$row->amount],
            ];
        })->toArray();


        return view('statistic', compact('master', 'labels', 'datasets'));
    }
}
