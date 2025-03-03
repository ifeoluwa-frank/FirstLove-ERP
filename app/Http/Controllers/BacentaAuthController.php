<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BacentaAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('bacenta.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('bacenta')->attempt($credentials)) {
            return redirect()->route('bacenta.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('bacenta')->logout();
        return redirect()->route('bacenta.login');
    }
}

