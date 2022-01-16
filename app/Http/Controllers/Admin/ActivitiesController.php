<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Http\Requests\ActivityRequest;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->get();

        return view('admins.galleries.activities.index', compact('activities'));
    }


    public function create()
    {
        return view('admins.galleries.activities.create');
    }

    public function store(ActivityRequest $request)
    {
        $body = $request->all();

        Activity::create($body);

        return redirect()
            ->route('admin.activities.index')
            ->with('message', 'Berhasil menambahkan kegiatan');
    }


    public function edit($id)
    {
        $activity = Activity::findOrFail($id);

        return view('admins.galleries.activities.edit', compact('activity'));
    }


    public function update(ActivityRequest $request, $id)
    {
        $body = $request->all();
        $activity = Activity::findOrFail($id);

        $activity->update($body);

        return redirect()
            ->route('admin.Activitys.index')
            ->with('message', 'Berhasil menggubah data kegiatan');

    }


    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus data kegiatan');
    }
}
