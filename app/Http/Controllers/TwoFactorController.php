<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
// ❌ HAPUS baris ini:
// use Ksassnowski\XXTEA\XXTEA;

class TwoFactorController extends Controller
{
    /**
     * Halaman input kode Google Authenticator setelah login.
     */
    public function index()
    {
        return view('auth.verify-2fa');
    }

    /**
     * Verifikasi kode 6 digit dari Google Authenticator.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'code' => ['required', 'digits:6'],
        ]);

        $user = $request->user();

        // Jangan pernah lolos kalau 2FA belum di-setup
        if (empty($user->google2fa_secret)) {
            return redirect()->route('2fa.setup')
                ->withErrors([
                    'code' => '2FA belum diaktifkan. Silakan setup Google Authenticator terlebih dahulu.'
                ]);
        }

        $google2fa = new Google2FA();

        // === DEKRIPT SECRET dari database (XXTEA + base64) ===
        try {
            $key = config('app.xxtea_key');
            $decryptedSecret = xxtea_decrypt(
                base64_decode($user->google2fa_secret),
                $key
            );
        } catch (\Throwable $e) {
            return back()->withErrors([
                'code' => 'Terjadi kesalahan pada kunci 2FA.',
            ]);
        }

        // Cek kode 6 digit
        $valid = $google2fa->verifyKey(
            $decryptedSecret,
            $request->code
        );

        if (!$valid) {
            return back()->withErrors([
                'code' => 'Kode Google Authenticator tidak valid.',
            ]);
        }

        // Jika valid → tandai sudah lolos 2FA
        session(['2fa_verified' => true]);

        return redirect()->route('dashboard');
    }

    public function resend()
    {
        abort(404);
    }
}
