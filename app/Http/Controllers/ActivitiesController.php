<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()
            ->paginate(9)
            ->appends(['content_type']);

        return view('galleries.activities.index', compact('activities'));
    }


    public function show($slug)
    {

        $activity = Activity::whereSlug($slug)->first();
        $activities = Activity::latest()->limit(10)->get();

        abort_unless(
            !is_null($activity),
            404
        );

        $embedded = [];

        if (
            !is_null($activity->embedded_youtube)
            && strlen($activity->embedded_youtube) > 0
        ) {
            $links = $activity->embedded_youtube;
            $youtubeIds = explode(',', $links);

            foreach ($youtubeIds as $id) {

                preg_match('/=[A-Za-z0-9]+/i', $id, $matchs);

                $embedded[] = substr($matchs[0], 1);
            }
        }

        return view('galleries.activities.show', compact('activity', 'embedded', 'activities'));
    }
}
