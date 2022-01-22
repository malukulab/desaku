<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apparatus;
use Illuminate\Http\Request;

class ApparatusController extends Controller
{
    public function index()
    {
        $apparatus = Apparatus::latest()->get();

        return view('admins.apparatus.index', compact('apparatus'));
    }


    public function create()
    {
        return view('admins.apparatus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'NIPD' => 'required',
            'attachment' => 'required'
        ]);

        $appatarus = Apparatus::create(
            $request->except('attachment')
        );

        $appatarus->attachments()->attach($request->attachment);

        return redirect()
            ->route('admin.apparatus.index')
            ->with('message', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $apparatus = Apparatus::findOrFail($id);

        return view('admins.apparatus.edit', compact('apparatus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'NIPD' => 'required',
            'attachment' => 'required'
        ]);
        $appatarus = Apparatus::findOrFail($id);
        $appatarus->update(
            $request->except('attachment')
        );

        $appatarus->attachments()->sync($request->attachment);

        return redirect()
            ->route('admin.apparatus.index')
            ->with('message', 'Berhasil menggubah data');
    }

    public function destroy($id)
    {
        $apparatus = Apparatus::findOrFail($id);
        $apparatus->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus data');
    }
}
