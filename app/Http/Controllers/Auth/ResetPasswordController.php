<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index($token, Request $request)
    {
        return view('auth.reset', [
            'title' => 'Reset Password',
            'token' => $token,
            'email' => urldecode($request->email)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:new_password'
        ]);
 
        $updatePassword = DB::table('password_resets')
                            ->where('email', $request->email)->where('token', $request->token)
                            ->first();
 
        if (!$updatePassword) {
            return redirect()->route('login')->with('error', 'Invalid token!');
        }
 
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->new_password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
 
        return redirect()->route('auth.login')->with('info', 'Password berhasil diubah');
    }
}
