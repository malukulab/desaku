<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class VillagesController extends Controller
{
    public function index()
    {
        $history = Setting::findKey('history')->first();

        return view('admins.abouts.villages.index', compact('history'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $history = Setting::findKey('history')->first();

        $history->update([
            'data' => [
                'content' => $request->content
            ]
        ]);

        return redirect()
            ->back()
            ->with('message', 'Berhasil menyimpan perubahan informasi');

    }
}
