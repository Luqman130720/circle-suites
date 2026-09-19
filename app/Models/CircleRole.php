<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CircleRole extends Model
{
    protected $table = 'circle_roles';

    protected $fillable = [
        'name',
        'slug',
        'division',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Positions using this role as their default role.
     */
    public function positions(): HasMany
    {
        return $this->hasMany(CirclePosition::class, 'role_id');
    }
}
