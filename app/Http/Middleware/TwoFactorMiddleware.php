<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TwoFactorMiddleware
{
    public function handle($request, Closure $next)
    {
        // Kalau belum login → lewati saja
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        // Izinkan akses ke route yang berhubungan dengan 2FA & logout
        if ($request->routeIs('2fa.*') || $request->routeIs('logout')) {
            return $next($request);
        }

        // HANYA paksa 2FA kalau user sudah mengaktifkannya
        if (!empty($user->google2fa_secret)) {  // atau && $user->two_factor_enabled

            // Kalau di session belum ditandai "lolos 2FA" → lempar ke halaman kode
            if (!session('2fa_verified')) {
                return redirect()->route('2fa.index');
            }
        }

        return $next($request);
    }
}
