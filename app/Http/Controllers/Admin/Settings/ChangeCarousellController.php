<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class ChangeCarousellController extends Controller
{
    public function index()
    {
        $carousell = Setting::findKey('carousell')->get();

        return view('admins.settings.create-carousell', compact('carousell'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg'
        ]);

        $image = $request->file('image');
        $path = $image->store('carousell', ['disk' => 'public']);

        $data = [
            'image' => $path
        ];

        Setting::create([
            'key' => 'carousell',
            'data' => json_encode($data)
        ]);
    }


    public function destroy($id)
    {
        $carousel = Setting::find($id);
        $carousel->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus gambar');
    }
}
