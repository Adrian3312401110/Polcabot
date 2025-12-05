<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi mass-assignment
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * Kolom yang disembunyikan dari array/json
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Tipe data / casting kolom
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Override agar autentikasi Laravel menggunakan username, bukan email
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
