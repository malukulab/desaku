<?php

namespace App\Http\Controllers;

use App\Models\Apparatus;
use App\Models\Culture;
use Illuminate\Http\Request;
use App\Models\Setting;

class HistoryController extends Controller
{
    public function __invoke()
    {
        $history = Setting::findKey('history')->first();
        $apparatus = Apparatus::latest()->get();
        $grafis = Setting::findKey('grafis')->get();

        return view('villages.history', compact('history', 'apparatus', 'grafis'));
    }
}
