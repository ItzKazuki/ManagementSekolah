<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class anggotaInti
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
        if (auth()->check() || auth()->user()->isAdmin) {
            return $next($request);
        }

        if (!auth()->check() || auth()->user()->keanggotaan != "wakil" || auth()->user()->keanggotaan != "ketua" || auth()->user()->keanggotaan != "bendahara" || auth()->user()->keanggotaan != "sekretaris") {
            abort(403);
        }

        return $next($request);
    }
}
