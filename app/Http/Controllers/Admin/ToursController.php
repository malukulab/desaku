<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Http\Requests\TourRequest;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->paginate(9);

        return view('admins.potencies.tours.index', compact('tours'));
    }

    public function create()
    {
        return view('admins.potencies.tours.create');
    }

    public function store(TourRequest $request)
    {
        $body = $request->all();
        Tour::create($body);

        return redirect()
            ->route('admin.tours.index')
            ->with(
                'message',
                'Berhasil menambahkan lokasi wisata'
            );
    }

    public function edit(string $id)
    {
        $tour = Tour::findOrFail($id);

        return view('admins.potencies.tours.edit', compact('tour'));
    }


    public function update(TourRequest $request, string $id)
    {
        $body = $request->all();

        $tour = Tour::findOrFail($id);

        $tour->update($body);

        return redirect()
            ->route('admin.tours.index')
            ->with('message', 'Berhasil menggubah data wisata');
    }


    public function destroy(string $id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus data wisata');
    }
}
