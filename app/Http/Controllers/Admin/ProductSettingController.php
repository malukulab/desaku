<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class ProductSettingController extends Controller
{
    protected $redirect = 'admin.products.index';
    protected $view = 'admins.potencies.products.setting';
    protected $key = 'product';

    public function index()
    {
        $product = Setting::findKey($this->key.'-setting')->first();

        return view($this->view, compact('product'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $product = Setting::findKey($this->key.'-setting')->first();

        $product->update([
            'data' => [
                'title' => $request->title,
                'content' => $request->content
            ]
        ]);

        return redirect()
            ->route($this->redirect)
            ->with('message', 'Berhasil menyimpan perubahan');
    }
}
