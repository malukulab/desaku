<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class TourSettingController extends Controller
{
    public function index()
    {
        $tour = Setting::findKey('tour-setting')->first();

        return view('admins.potencies.tours.setting', compact('tour'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $tour = Setting::findKey('tour-setting')->first();

        $tour->update([
            'data' => [
                'title' => $request->title,
                'content' => $request->content
            ]
        ]);

        return redirect()
            ->route('admin.tours.index')
            ->with('message', 'Berhasil menyimpan perubahan');
    }
}
