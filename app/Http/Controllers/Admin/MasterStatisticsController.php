<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterStatistic;
use App\Models\Statistic;

class MasterStatisticsController extends Controller
{
    public function index()
    {
        $statistics = MasterStatistic::latest()->get();
        return view('admins.master-statistics.index', compact('statistics'));
    }


    public function show($id)
    {
        $master = MasterStatistic::findOrFail($id);
        $master->load('statistics');

        return view('admins.master-statistics.show', compact('master'));
    }

    public function edit(Request $request, $id)
    {
        $statistic = MasterStatistic::findOrFail($id);

        return view('admins.master-statistics.edit', compact('statistic'));
    }


    public function create()
    {
        return view('admins.master-statistics.create');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required'
        ]);

        $statistic = MasterStatistic::findOrFail($id);

        $statistic->update(
            $request->all()
        );

        return redirect()
            ->route('admin.master-statistics.index')
            ->with('message', 'Berhasil mengubah data statistik');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required'
        ]);

        MasterStatistic::create(
            $request->all()
        );

        return redirect()
            ->back()
            ->with('message', 'Berhasil menambahkan data statistik');
    }

    public function destroy($id)
    {
        $statistic = MasterStatistic::findOrFail($id);
        $statistic->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus data');
    }
}
