<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // kalau belum login
        if (!$user) {
            abort(403, 'ANDA TIDAK MEMILIKI HAK AKSES (ADMIN ONLY).');
        }

        // pakai method isAdmin() dari model User
        if (!$user->isAdmin()) {
            abort(403, 'ANDA TIDAK MEMILIKI HAK AKSES (ADMIN ONLY).');
        }

        return $next($request);
    }
}
