<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;


class Google2FAController extends Controller
{
    // HALAMAN SETUP / AKTIFKAN 2FA
    public function showSetup(Request $request)
    {
        $user = Auth::user();

        // Kalau 2FA sudah aktif, nggak usah setup lagi
        if ($user->two_factor_enabled && !empty($user->google2fa_secret)) {
            return redirect()->route('profile.edit')
                ->with('status', '2FA sudah aktif untuk akun ini.');
        }

        $google2fa = new Google2FA();

        // Generate secret baru dan simpan sementara di session (BELUM dienkripsi)
        $secret = $google2fa->generateSecretKey();
        $request->session()->put('2fa_temp_secret', $secret);

        // Buat URL otpauth untuk QR code
        $otpUrl = $google2fa->getQRCodeUrl(
            config('app.name'),   // nama aplikasi
            $user->email,         // akun user
            $secret
        );

        // QR code pakai layanan sederhana
        $qrImage = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . urlencode($otpUrl);

        return view('auth.2fa-setup', [
            'secret'  => $secret,
            'qrImage' => $qrImage,
        ]);
    }

    // PROSES AKTIFKAN 2FA
    public function enable(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $user   = Auth::user();
        $secret = $request->session()->get('2fa_temp_secret');

        // Kalau session secret hilang
        if (!$secret) {
            return redirect()->route('2fa.setup')
                ->withErrors(['otp' => 'Session 2FA kadaluarsa, silakan ulangi.']);
        }

        $google2fa = new Google2FA();

        // 1. VALIDASI KODE 6 DIGIT terhadap SECRET PLAIN (BELUM dienkripsi)
        $valid = $google2fa->verifyKey($secret, $request->otp);

        if (!$valid) {
            return back()->withErrors(['otp' => 'Kode 2FA tidak valid.']);
        }

        // 2. ENKRIP SECRET DENGAN XXTEA DAN SIMPAN
        $key = config('app.xxtea_key'); // kunci XXTEA dari config/app.php

        // ← PENTING: pakai function, bukan class
        $encryptedSecret = base64_encode(xxtea_encrypt($secret, $key));

        $user->google2fa_secret = $encryptedSecret;
        $user->save();

        // Hapus secret sementara dari session
        $request->session()->forget('2fa_temp_secret');

        // Login ini dianggap sudah lolos 2FA
        session(['2fa_verified' => true]);

        return redirect()->route('dashboard')
            ->with('status', 'Google Authenticator berhasil diaktifkan!');
    }

    // NONAKTIFKAN 2FA
    public function disable(Request $request)
    {
        $user = $request->user();

        $user->google2fa_secret   = null;
        $user->two_factor_enabled = false;
        $user->save();

        // Kalau mau, sekalian reset status verifikasi 2FA
        session(['2fa_verified' => false]);

        return back()->with('status', '2FA berhasil dinonaktifkan.');
    }
}
