<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use App\Models\Tour;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $carousels = Setting::findKey('carousell')->get();
        $tours = Tour::latest()->limit(6)->get();
        $products = Product::latest()->limit(6)->get();
        $news = News::latest()->limit(6)->get();


        return view('welcome', compact('carousels', 'tours', 'products', 'news'));
    }
}
