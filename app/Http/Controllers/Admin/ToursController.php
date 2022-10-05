<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function store(Request $request)
    {
        $embeddedYoutue = collect(json_decode($request->embedded_youtube))
            ->map(fn ($item) => $item->value)
            ->implode(',');

        $request->merge([
            'embedded_youtube' => $embeddedYoutue
        ]);

        $body = $request->all();
        $tour = Tour::create($body);

        $tour->attachments()->attach(
            $request->attachments
        );

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
        $embeddedYoutue = collect(json_decode($request->embedded_youtube))
            ->map(fn ($item) => $item->value)
            ->implode(',');

        $request->merge([
            'embedded_youtube' => $embeddedYoutue
        ]);
        $body = $request->all();

        $tour = Tour::findOrFail($id);

        $tour->update($body);

        $tour->attachments()->sync(
            $request->attachments
        );

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
