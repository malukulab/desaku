<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(9);
        $setting = Setting::findKey('product-setting')->first();

        return view('potencies.products.index', compact('products', 'setting'));
    }

    public function show(string $slug)
    {
        $products = Product::latest()->limit(10)->get();
        $product = Product::whereSlug($slug)->first();

        abort_unless(
            !is_null($product),
            404
        );
        return view('potencies.products.show', compact('product', 'products'));
    }
}
