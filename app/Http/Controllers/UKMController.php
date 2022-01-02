<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UKMController extends Controller
{
    public function index()
    {
        return view('potencies.ukm.index');
    }

    public function show(string $slug)
    {
        return view('potencies.ukm.show');
    }
}
