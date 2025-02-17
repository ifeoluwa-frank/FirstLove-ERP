<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bacenta extends Model
{
    //
    use HasFactory;

    public function members(): HasMany
    {
        return $this->hasMany(Member::class, 'bacenta_id');
    }

    public function leader(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'bacenta_leader_id');
    }
}
