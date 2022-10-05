<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterStatistic;
use Illuminate\Http\Request;
use App\Models\Statistic;

class StatisticsController extends Controller
{
    public function create($id)
    {
        $master = MasterStatistic::findOrFail($id);

        return view('admins.statistics.create', compact('master'));
    }


    public function show($id, $statisticId)
    {
        $master = MasterStatistic::findOrFail($id);
        $statistic = Statistic::findOrFail($statisticId);

        return view('admins.statistics.edit', compact('master', 'statistic'));
    }



    public function store(Request $request, $id)
    {
        $request->validate([
            'item' => 'required',
            'amount' => 'required|numeric',
            'desc' => 'required|max:2000'
        ]);

        $master = MasterStatistic::findOrFail($id);
        $body = $request->all();
        $master->statistics()->create($body);

        return redirect()
            ->route('admin.master-statistics.show', $id)
            ->with('message', 'Berhasil menambahkan data');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'item' => 'required',
            'amount' => 'required|numeric',
            'desc' => 'required|max:2000'
        ]);

        $body = $request->all();
        $statistic = Statistic::findOrFail($id);

        $statistic->update($body);

        return redirect()
            ->route('admin.master-statistics.show', $id)
            ->with('message', 'Berhasil menyimpan perubahan');
    }


    public function edit($id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic->load('master');


    return view('admins.statistics.edit', compact('statistic'));
    }

    public function destroy($id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus data');
    }
}
