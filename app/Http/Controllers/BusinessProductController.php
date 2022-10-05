<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessProduct;
use App\Models\Setting;

class BusinessProductController extends Controller
{
    public function index()
    {
        $businessProducts = BusinessProduct::latest()->paginate(9);
        $setting = Setting::findKey('businnes-product-setting')->first();

        return view('potencies.ukm.index', compact('businessProducts', 'setting'));
    }

    public function show(string $slug)
    {

        $businessProduct = BusinessProduct::whereSlug($slug)->first();
        $businessProducts = BusinessProduct::latest()->limit(10)->get();
        $attachments = $businessProduct->attachments;


        abort_unless(
            !is_null($businessProduct),
            404
        );

        return view('potencies.ukm.show', compact('businessProduct', 'attachments', 'businessProducts'));
    }
}
