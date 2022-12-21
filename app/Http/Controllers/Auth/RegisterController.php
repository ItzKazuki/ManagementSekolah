<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\Auth\CreatedAccountNotifiaction;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users,email'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make(Str::random(30))
        ]);

        $token = $user->createToken();

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        $user->notify(new CreatedAccountNotifiaction($user, $token));

        return redirect()->route('auth.login')->with('info', 'Email Konfirmasi berhasil dikirim');

    }
}
