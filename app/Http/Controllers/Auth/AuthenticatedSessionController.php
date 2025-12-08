<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login (email + password)
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Login biasa (email + password)
        $request->authenticate();
        $request->session()->regenerate();

        $user = $request->user();

        // reset status 2FA setiap login
        session(['2fa_verified' => false]);

        // 2. Kalau user PUNYA 2FA → arahkan ke halaman input kode
        if (!empty($user->google2fa_secret)) {
            return redirect()->route('2fa.index');
        }

        // 3. Kalau user TIDAK punya 2FA → langsung ke dashboard
        return redirect()->intended(route('dashboard'));
    }



    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // bersihkan semua session termasuk 2FA
        $request->session()->forget('2fa_verified');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
