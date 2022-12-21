<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\Auth\PasswordResetNotification;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot', [
            'title' => 'Forgot Password'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();
 
        $token = $user->createToken();
 
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        $user->notify(new PasswordResetNotification($token));

        return redirect()->route('auth.login')->with('success', 'email berhasil di kirim');
 
    }
}
