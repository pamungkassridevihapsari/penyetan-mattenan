<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $adminEmail = config('app.admin_email', 'admin@penyetanmattenan.test');
        $adminPassword = config('app.admin_password', 'admin12345');

        if ($credentials['email'] !== $adminEmail || ! hash_equals($adminPassword, $credentials['password'])) {
            return back()
                ->withErrors(['email' => 'Email atau password admin tidak sesuai.'])
                ->onlyInput('email');
        }

        $request->session()->put('is_admin', true);

        return redirect()->route('admin.menus.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
