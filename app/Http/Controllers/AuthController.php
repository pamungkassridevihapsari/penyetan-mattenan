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
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $adminUsername = config('app.admin_username', 'pamungkas');
        $adminPassword = config('app.admin_password', 'devi');

        if ($credentials['username'] !== $adminUsername || ! hash_equals($adminPassword, $credentials['password'])) {
            return back()
                ->withErrors(['username' => 'Username atau password admin tidak sesuai.'])
                ->onlyInput('username');
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
