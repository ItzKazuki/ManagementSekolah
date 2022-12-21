<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAnggota
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->keanggotaan == "menunggu_persetujuan") {
            auth()->logout();

            return redirect()->route('auth.login')->with('info', 'akun belum dikonfirmasi, tunggu beberapa saat lagi');
        }

        return $next($request);
    }
}
