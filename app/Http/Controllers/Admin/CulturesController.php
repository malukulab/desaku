<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;
use App\Http\Requests\CultureRequest;

class CulturesController extends Controller
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

        $culture = Culture::create($body);

        $culture->attachments()
            ->attach($request->attachments);

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


        $culture->attachments()
            ->sync($request->attachments);

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
