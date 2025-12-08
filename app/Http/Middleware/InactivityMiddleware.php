<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InactivityMiddleware
{
    // Lama waktu idle sebelum auto logout (dalam menit)
    private int $timeout = 2; // misal 10 menit, silakan ganti sesuai tugas dosen

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Kalau belum login, tidak usah cek idle
        if (!Auth::check()) {
            return $next($request);
        }

        $lastActivity = session('last_activity_time');

        if ($lastActivity) {
            $lastActivityTime = Carbon::parse($lastActivity);

            // Hitung berapa menit sejak aktivitas terakhir
            if ($lastActivityTime->diffInMinutes(now()) >= $this->timeout) {

                // Hapus session dan logout
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')
                    ->withErrors([
                        'email' => 'Anda otomatis keluar karena tidak aktif selama ' . $this->timeout . ' menit.',
                    ]);
            }
        }

        // Update waktu aktivitas terakhir
        session(['last_activity_time' => now()]);

        return $next($request);
    }
}
