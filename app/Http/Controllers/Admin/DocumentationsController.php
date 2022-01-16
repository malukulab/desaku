<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Http\Requests\DocumentationRequest;

class DocumentationsController extends Controller
{
    public function index()
    {
        $documentations = Documentation::latest()->get();

        return view('admins.galleries.documentation.index', compact('documentations'));
    }


    public function create()
    {
        return view('admins.galleries.documentation.create');
    }

    public function store(DocumentationRequest $request)
    {
        $body = $request->all();

        Documentation::create($body);

        return redirect()
            ->route('admin.documentations.index')
            ->with('message', 'Berhasil menambahkan dokumantasi');
    }


    public function edit($id)
    {
        $documentation = Documentation::findOrFail($id);

        return view('admins.galleries.documentation.edit', compact('documentation'));
    }


    public function update(DocumentationRequest $request, $id)
    {
        $body = $request->all();
        $documentation = Documentation::findOrFail($id);

        $documentation->update($body);

        return redirect()
            ->route('admin.documentations.index')
            ->with('message', 'Berhasil menggubah data dokumentasi');

    }


    public function destroy($id)
    {
        $documentation = Documentation::findOrFail($id);
        $documentation->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus data dokumentasi');
    }
}
