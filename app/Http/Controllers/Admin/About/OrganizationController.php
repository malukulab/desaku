<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Setting::findKey('organization')->first();

        return view('admins.abouts.organization.index', compact('organization'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg'
        ]);

        $organization = Setting::findKey('organization')->first();
        $path = $request->file('file')->store('organization', ['disk' => 'public']);

        $organization->update([
            'data' => [
                'path' => $path
            ]
        ]);

        return redirect()
            ->back()
            ->with('message', 'Berhasil menyimpan perubahan informasi');

    }
}
