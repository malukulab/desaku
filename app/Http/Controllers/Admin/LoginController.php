<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()
                ->back()
                ->with('error', 'Alamat email dan kata sandi tidak benar');
        }

        return redirect()->route('admin.index');
    }
}
