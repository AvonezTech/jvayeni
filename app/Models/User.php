<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'credit_limit',
        'credit_balance',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Required for Filament to verify this user can login to the admin panel
    public function canAccessPanel(Panel $panel): bool
    {
        return true; 
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function isCollegeStaff(): bool
    {
        return $this->role === 'college_staff';
    }

    public function isKitchenStaff(): bool
    {
        return $this->role === 'kitchen_staff';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }
}