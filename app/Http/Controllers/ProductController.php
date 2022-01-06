<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(9);

        return view('potencies.products.index', compact('products'));
    }

    public function show(string $slug)
    {

        $product = Product::whereSlug($slug)->first();

        abort_unless(
            !is_null($product),
            404
        );
        return view('potencies.products.show', compact('product'));
    }
}
