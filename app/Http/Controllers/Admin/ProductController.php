<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    protected string $model = Product::class;

    protected array $views = [
        'index' => 'admins.potencies.products.index',
        'create' => 'admins.potencies.products.create',
        'edit' => 'admins.potencies.products.edit',
    ];

    public function index()
    {
        $products = $this->model::latest()->get();

        return view($this->views['index'], compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view($this->views['create'], compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $body = $request->except('attachments');
        $product = $this->model::create($body);

        $product
            ->attachments()
            ->attach(
                $request->attachments
            );

        return redirect()
            ->back()
            ->with('message', 'Berhasil menambahkan produk');
    }

    public function edit($id)
    {
        $product = $this->model::findOrFail($id);
        $categories = Category::all();

        return view($this->views['edit'], compact('product', 'categories'));

    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->model::findOrFail($id);
        $body = $request->except('attachments');

        $product->update($body);
        $product
            ->attachments()
            ->attach(
                $request->attachments
            );

        return redirect()
            ->back()
            ->with('message', 'Berhasil menggubah produk');
    }

    public function destroy($id)
    {
        $product = $this->model::findOrFail($id);

        $product->delete();
        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus produk');
    }

}
