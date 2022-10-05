<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = Setting::findKey('file')->latest()->get();

        return view('admins.galleries.file.index', compact('files'));
    }


    public function create()
    {
        return view('admins.galleries.file.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:png,jpg,pdf'
        ]);

        $path = $request->file('file')->store('file', ['disk' => 'public']);
        $name = $request->name;

        Setting::create([
            'key' => 'file',
            'data' => [
                'path' => $path,
                'name' => $name
            ]
        ]);

        return redirect()
            ->route('admin.file.index')
            ->with('message', 'Berhasil menambahkan berkas baru');
    }

    public function destroy($id)
    {
        $file = Setting::findOrFail($id);

        abort_unless(
            $file->key == 'file',
            404
        );

        if (Storage::exists($file->data['path'])) {
            Storage::delete($file->data['path']);
        }

        $file->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus berkas');

    }
}
