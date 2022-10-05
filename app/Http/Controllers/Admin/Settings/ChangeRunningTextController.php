<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ChangeRunningTextController extends Controller
{
    public function index()
    {
        $text = Setting::findKey('running-text')->first();


        return view('admins.settings.running-text', compact('text'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $text = Setting::findKey('running-text')->first();


        $text->update([
            'data' => [
                'content' => $request->content
            ]
        ]);

        return redirect()
            ->back()
            ->with('message', 'Berhasil menyimpan perubahan');
    }
}
