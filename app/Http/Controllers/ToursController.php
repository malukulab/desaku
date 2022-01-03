<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->paginate(9);

        return view('potencies.tours.index', compact('tours'));
    }

    public function show(string $slug)
    {
        // $tour = Tour::whereSlug($slug)->first();
        // abort_unless(
        //     !is_null($tour),
        //     404,
        //     "Wista tidak ditemukan!"
        // );

        return view('potencies.tours.show');
    }
}
