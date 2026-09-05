<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Field yang boleh diisi melalui mass assignment.
     */
    protected $fillable = [
        'name',
        'employee_id',
        'email',
        'profile_photo',
        'division',
        'position',
        'role',
        'status',
        'password',
    ];

    /**
     * Field yang disembunyikan dari hasil model.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting attribute.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}