<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

// Tambah model OTP
use App\Models\TwoFactorCode;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Simpan user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Login otomatis agar auth()->id() aktif
        Auth::login($user);

        // ====== GENERATE OTP ======
        $otp = rand(100000, 999999);

        


        TwoFactorCode::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'code'       => $otp,
                'expires_at' => now()->addMinutes(5),
            ]
        );

        // Simpan status verifikasi
        session(['2fa_verified' => false]);

        // Redirect ke halaman otp
        return redirect()->route('2fa.index')
            ->with('message', 'Kode OTP telah dibuat dan disimpan di database.');
    }
}

