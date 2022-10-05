<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use Illuminate\Http\Request;

class CulturesController extends Controller
{
    public function index()
    {
        $cultures = Culture::latest()->paginate(9);

        return view('villages.cultures.index', compact('cultures'));
    }


    public function show($slug)
    {
        $culture = Culture::whereSlug($slug)->first();
        $cultures = Culture::latest()->limit(8)->get();

        abort_if(
            is_null($culture),
            404
        );

        return view('villages.cultures.show', compact('cultures', 'culture'));
    }
}
