<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        $cultures = Culture::latest()->get();

        return view('admins.galleries.cultures.index', compact('cultures'));
    }


    public function create()
    {
        return view('admins.galleries.cultures.create');
    }

    public function store(CultureRequest $request)
    {
        $body = $request->all();

        Culture::create($body);

        return redirect()
            ->route('admin.cultures.index')
            ->with('message', 'Berhasil menambahkan budaya');
    }


    public function edit($id)
    {
        $culture = Culture::findOrFail($id);

        return view('admins.galleries.cultures.edit', compact('culture'));
    }


    public function update(CultureRequest $request, $id)
    {
        $body = $request->all();
        $culture = Culture::findOrFail($id);

        $culture->update($body);

        return redirect()
            ->route('admin.cultures.index')
            ->with('message', 'Berhasil menggubah data budaya');

    }


    public function destroy($id)
    {
        $culture = Culture::findOrFail($id);
        $culture->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus data budaya');
    }
}
