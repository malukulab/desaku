<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apparatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApparatusController extends Controller
{
    public $educations = [
        'SD / Sederajat',
        'SMP / Sederajat',
        'SMA / Sederajat',
        'D1',
        'D2',
        'D3',
        'D4',
        'S1',
        'S2',
        'S3',
    ];


    public $gender = [
        'l' => 'Laki-laki',
        'p' => 'Perempuan'
    ];

    public function index()
    {
        $apparatus = Apparatus::latest()->get();

        return view('admins.apparatus.index', compact('apparatus'));
    }


    public function create()
    {
        return view('admins.apparatus.create', [
            'educations' => $this->educations,
            'gender' => $this->gender
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|numeric',
            'job_position' => 'required',
            'gender' => 'required',
            'education' => 'required',
            'picture' => 'required|mimes:png,jpg|max:2000',
            'fb_link' => 'required',
            'email' => 'required'
        ]);
        $body = $request->except('picture');
        $picture = $request->file('picture')->store('apparatus', ['disk' => 'public']);

        $appatarus = Apparatus::create(
            array_merge($body, ['picture' => $picture])
        );

        return redirect()
            ->route('admin.apparatus.index')
            ->with('message', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $apparatus = Apparatus::findOrFail($id);

        return view('admins.apparatus.edit', [
            'apparatus' => $apparatus,
            'educations' => $this->educations,
            'gender' => $this->gender
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|numeric',
            'job_position' => 'required',
            'gender' => 'required',
            'education' => 'required',
            'picture' => 'mimes:png,jpg|max:2000',
            'fb_link' => 'required',
            'email' => 'required'
        ]);

        $appatarus = Apparatus::findOrFail($id);
        $body = $request->except('picture');

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture')->store('apparatus', ['disk' => 'public']);
            $body = array_merge($body, ['picture' => $picture]);
        }

        $appatarus->update(
            $body
        );

        return redirect()
            ->route('admin.apparatus.index')
            ->with('message', 'Berhasil menggubah data');
    }

    public function destroy($id)
    {
        $apparatus = Apparatus::findOrFail($id);

        if (Storage::exists($apparatus->picture)) {
            Storage::delete($apparatus->picture);
        }

        $apparatus->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus data');
    }
}
