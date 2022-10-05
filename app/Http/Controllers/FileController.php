<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __invoke()
    {
        $files = Setting::findKey('file')->latest()->paginate(20);

        return view('galleries.file', compact('files'));
    }
}
