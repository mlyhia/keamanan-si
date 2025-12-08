<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // cari user berdasarkan email
        $user = User::where('email', $this->input('email'))->first();

        // kalau user ada & sudah diblokir
        if ($user && $user->is_blocked) {
            throw ValidationException::withMessages([
                'email' => 'Akun Anda diblokir. Hubungi super admin untuk membuka blokir.',
            ]);
        }

        // coba login
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {

            // kalau user ditemukan, naikkan counter gagal
            if ($user) {
                $user->failed_login_attempts = ($user->failed_login_attempts ?? 0) + 1;

                // jika sudah 5x gagal → blokir
                if ($user->failed_login_attempts >= 5) {
                    $user->is_blocked = true;
                }

                $user->save();
            }

            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => $user && $user->is_blocked
                    ? 'Akun Anda telah diblokir karena terlalu banyak percobaan login gagal. Hubungi super admin.'
                    : 'Kredensial yang Anda berikan tidak cocok dengan catatan kami.',
            ]);
        }

        // login berhasil → reset counter gagal
        if ($user) {
            $user->failed_login_attempts = 0;
            $user->save();
        }

        

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
