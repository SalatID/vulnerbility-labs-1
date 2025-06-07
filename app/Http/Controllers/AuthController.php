<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (!\App\Models\User::where('email', $credentials['email'])->exists()) {
            return redirect('/login')->withErrors([
                'message' => 'Email Tidak Ditemukan',
            ]);
        }

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return redirect('/login')->withErrors([
            'message' => 'Password Salah',
        ]);
    }

    public function showLoginForm()
    {
        return view('login');
    }
    public function logout(Request $request)
    {
        // auth()->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/login');
    }
}
