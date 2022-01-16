<?php

namespace App\Http\Controllers\Admin\Village;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return view('admins.villages.general.index');
    }


    public function create()
    {
        return view('admins.villages.general.create');
    }

    public function store(Request $request)
    {

    }
}
