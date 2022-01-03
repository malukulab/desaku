<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleriesController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()
            ->paginate(9)
            ->appends('content-type');

        return view('galleries.index', compact('galleries'));
    }


    public function show(string $slug)
    {
        return view('galleries.show');
    }
}
