<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class InfoController extends Controller
{
    public function index()
    {
        $info = Setting::findKey('info')->first();

        return view('admins.abouts.info', compact('info'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'motto' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $data = $request->all();

        $info = Setting::findKey('info')->first();
        $info->update([
            'data' => $data
        ]);

        return redirect()
            ->back()
            ->with('message', 'Berhasil menyimpan perubahan');
    }
}
