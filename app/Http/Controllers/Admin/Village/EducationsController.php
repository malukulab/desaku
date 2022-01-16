<?php

namespace App\Http\Controllers\Admin\Village;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationsController extends Controller
{
    public function index()
    {
        return view('admins.villages.education.index');
    }
}
