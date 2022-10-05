<?php

namespace App\Http\Controllers;

use App\Models\Apparatus;
use Illuminate\Http\Request;


class ApparatusController extends Controller
{
    public function __invoke()
    {
        $apparatus = Apparatus::all();

        return view('villages.apparatus', compact('apparatus'));
    }
}
