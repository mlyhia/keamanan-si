{{-- resources/views/auth/2fa-setup.blade.php --}}
<x-guest-layout>
    <x-auth-card>
        {{-- Logo --}}
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        {{-- Judul & instruksi --}}
        <h2 class="text-xl font-semibold text-center mb-4">
            Aktifkan Google Authenticator
        </h2>

        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
            1. Buka aplikasi <strong>Google Authenticator</strong> di HP Anda. <br>
            2. Pilih <strong>Scan QR code</strong> lalu arahkan ke gambar di bawah. <br>
            3. Masukkan kode 6 digit yang muncul, kemudian klik <strong>Aktifkan 2FA</strong>.
        </p>

        {{-- QR CODE --}}
        <div class="flex justify-center mb-4">
            <img src="{{ $qrImage }}" alt="QR Code 2FA"
                 class="rounded shadow-md border border-gray-600">
        </div>

        {{-- Kode manual --}}
        <p class="text-xs text-center text-gray-500 dark:text-gray-400 mb-4">
            Atau masukkan kode manual:
        </p>
        <p class="text-xs text-center font-mono font-semibold break-all mb-6">
            {{ $secret }}
        </p>

        {{-- Form OTP --}}
        <form method="POST" action="{{ route('2fa.enable') }}">
            @csrf

            <div>
                <x-input-label for="otp" value="Kode 6 digit" />
                <x-text-input id="otp" name="otp" type="text"
                    inputmode="numeric" pattern="[0-9]*"
                    class="mt-1 block w-full"
                    required autofocus />
                <x-input-error :messages="$errors->get('otp')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-primary-button>
                    AKTIFKAN 2FA
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
