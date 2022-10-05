<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class ChangeLogoController extends Controller
{
    public function index()
    {
        $logo = Setting::findKey('logo')->first();

        return view('admins.settings.create-logo', compact('logo'));
    }


    public function update(Request $request)
    {
        $logo = Setting::findKey('logo')->first();
        $path = $request
                    ->file('logo')
                    ->store('logo', ['disk' => 'public']);
        $data = compact('path');

        if (Storage::exists($logo->data['path'])) {
            Storage::delete($logo->data['path']);
        }

        $logo->update([
            'data' => $data,
        ]);

        return redirect()
            ->back()
            ->with('message', 'Berhasil memperbaharui logo');
    }
}
