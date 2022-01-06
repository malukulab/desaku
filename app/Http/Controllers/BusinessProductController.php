<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessProduct;

class BusinessProductController extends Controller
{
    public function index()
    {
        $businessProducts = BusinessProduct::latest()->paginate(9);

        return view('potencies.ukm.index', compact('businessProducts'));
    }

    public function show(string $slug)
    {
        $businessProduct = BusinessProduct::whereSlug($slug)->first();
        abort_unless(
            !is_null($businessProduct),
            404
        );

        return view('potencies.ukm.show', compact('businessProduct'));
    }
}
