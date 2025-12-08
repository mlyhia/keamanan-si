<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Hanya super admin yang boleh lewat
        if (! $user->isSuperAdmin()) {
            abort(403, 'Anda tidak memiliki akses (Super Admin Only).');
        }

        return $next($request);
    }
}
