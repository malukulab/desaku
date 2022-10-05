<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class OrganizationController extends Controller
{
    public function __invoke()
    {
        $organization = Setting::findKey('organization')->first();
        return view('villages.organization', compact('organization'));
    }
}
