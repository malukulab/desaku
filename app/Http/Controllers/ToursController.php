<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Tour;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->paginate(9);
        $setting = Setting::findKey('tour-setting')->first();

        return view('potencies.tours.index', compact('tours', 'setting'));
    }

    public function show(string $slug)
    {
        $tour = Tour::whereSlug($slug)->first();
        $tours = Tour::latest()->limit(10)->get();

        abort_unless(
            !is_null($tour),
            404,
            "Wista tidak ditemukan!"
        );

        $embedded = [];

        if (!is_null(
            $tour->embedded_youtube
        )) {
            $links = $tour->embedded_youtube;
            $youtubeIds = explode(',', $links);

            foreach ($youtubeIds as $id) {

                preg_match('/=[A-Za-z0-9]+/i', $id, $matchs);

                $embedded[] = substr($matchs[0], 1);
            }
        }



        return view('potencies.tours.show', compact('tour', 'embedded', 'tours'));
    }
}
