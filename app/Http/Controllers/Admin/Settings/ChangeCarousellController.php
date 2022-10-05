<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class ChangeCarousellController extends Controller
{
    public function index()
    {
        $carousell = Setting::findKey('carousell')->get();

        return view('admins.settings.carousels.index', compact('carousell'));
    }


    public function create()
    {
        return view('admins.settings.carousels.create');
    }


    public function edit($id)
    {
        $carousel = Setting::findKey('carousell')->whereId($id)->first();

        abort_if(
            is_null($carousel),
            404
        );

        return view('admins.settings.carousels.edit', compact('carousel'));
    }


    public function update(Request $request, $id)
    {
        $carousel = Setting::findKey('carousell')
            ->whereId($id)
            ->first();

        abort_if(
            is_null($carousel),
            404
        );

        $rules = [
            'image' => 'image|mimes:png,jpg',
            'title' => 'required',
            'description' => 'required'
        ];

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $carousel->data['image']
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('carousell', ['disk' => 'public']);

            $data['image'] = $path;
            $rules['image'] = 'required|image|mimes:png,jpg';
        }

        $request->validate($rules);

        $carousel->update([
            'data' => $data
        ]);


        return redirect()
            ->route('admin.settings.carousels.index')
            ->with('message', 'Berhasil menambahkan gambar');

    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg',
            'title' => 'required',
            'description' => 'required'
        ]);

        $image = $request->file('image');
        $path = $image->store('carousell', ['disk' => 'public']);

        $data = [
            'image' => $path,
            'title' => $request->title,
            'description' => $request->description
        ];

        Setting::create([
            'key' => 'carousell',
            'data' => $data
        ]);

        return redirect()
            ->route('admin.settings.carousels.index')
            ->with('message', 'Berhasil menambahkan gambar');
    }


    public function destroy($id)
    {
        $carousel = Setting::find($id);

        if (Storage::exists($carousel->data['image'])) {
            Storage::delete($carousel->data['image']);
        }

        $carousel->delete();



        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus gambar');
    }
}
