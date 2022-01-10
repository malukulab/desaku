<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->paginate(9);

        return view('admins.potencies.tours.index', compact('tours'));
    }
}
