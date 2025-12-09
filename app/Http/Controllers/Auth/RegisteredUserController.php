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

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan halaman register.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Proses register user baru.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Simpan user ke database
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Trigger event Registered (kalau dipakai untuk listener apa pun)
        event(new Registered($user));

        // 4. Login otomatis
        Auth::login($user);

        // 5. Anggap login pertama sudah lolos 2FA
        //    supaya middleware '2fa' tidak nendang balik
        session(['2fa_verified' => true]);

        // 6. Arahkan ke dashboard
        return redirect()->route('dashboard');
    }
}
