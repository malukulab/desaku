<?php

namespace App\Http\Controllers\Admin\Village;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrantibController extends Controller
{
    public function index()
    {
        return view('admins.villages.trantib.index');
    }
}
