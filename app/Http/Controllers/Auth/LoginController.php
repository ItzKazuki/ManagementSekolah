<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function auth(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $rememberMe = $request->has('remember_me') ? true : false;

        if (Auth::attempt($validate, $rememberMe)) {
            $request->session()->regenerate();

            return redirect()->route('anggota.dashboard');
        }

        return redirect()->back()->with('error', 'login gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
