<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * ====== KONSTANTA ROLE ======
     */
    public const ROLE_USER       = 'user';
    public const ROLE_ADMIN      = 'admin';
    public const ROLE_SUPERADMIN = 'super_admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'google2fa_secret',
        'two_factor_enabled',
        'failed_login_attempts',
        'is_blocked',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Cek apakah user ini ADMIN (termasuk super admin)
     */
    public function isAdmin(): bool
    {
        return in_array($this->role, [
            self::ROLE_ADMIN,
            self::ROLE_SUPERADMIN,
        ]);
    }

    /**
     * Cek apakah user ini SUPER ADMIN
     */
        public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function isAdminOrSuperAdmin(): bool
    {
        return in_array($this->role, ['admin', 'super_admin']);
    }

    public function isBlocked(): bool
    {
        return (bool) $this->is_blocked;
    }


}
