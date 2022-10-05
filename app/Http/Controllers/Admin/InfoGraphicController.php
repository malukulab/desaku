<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoGraphicController extends Controller
{
    public function index()
    {
        $grafis = Setting::findKey('grafis')
            ->latest()
            ->get();

        return view('admins.galleries.grafis', compact('grafis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg'
        ]);

        $path = $request->file('image')
            ->store('grafis', ['disk' => 'public']);

        Setting::create([
            'key' => 'grafis',
            'data' => [
                'content' => $path
            ]
        ]);

        return redirect()
            ->back()
            ->with('message', 'Berhasil menambahkan info grafis');
    }


    public function destroy($id)
    {
        $grafis = Setting::findOrFail($id);

        abort_unless(
            $grafis->key === 'grafis',
            404
        );
        if (Storage::exists($grafis->data['content'])) {
            Storage::delete($grafis->data['content']);
        }

        $grafis->delete();

        return redirect()
            ->route('admin.info-graphic.index')
            ->with('message', 'Berhasil menghapus informasi grafis');
    }
}
