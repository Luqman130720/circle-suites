<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CirclePosition extends Model
{
    protected $table = 'circle_positions';

    protected $fillable = [
        'name',
        'division',
        'role_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Default system role for this position.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(CircleRole::class, 'role_id');
    }
}
