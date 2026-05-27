<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleUser;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasPanelShield;

    public function isSuperAdmin(): bool
    {
        return $this->hasRole(RoleUser::SUPER_ADMIN->value);
    }

    public function isKetuaPelaksana(): bool
    {
        return $this->hasRole(RoleUser::KETUA_PELAKSANA->value);
    }

    public function isSekertaris(): bool
    {
        return $this->hasRole(RoleUser::SEKERTARIS->value);
    }

    public function isJamaat(): bool
    {
        return $this->hasRole(RoleUser::JAMAAT->value);
    }

    public function jemaat(): HasOne
    {
        return $this->hasOne(Jemaat::class);
    }

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
}
