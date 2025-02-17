<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'profile_picture',
        'dob',
        'school',
        'phone',
        'whatsapp',
        'address',
        'bacenta_id',
        'joined_at',
        'last_visited_at',
        'ministry',
        'speaks_in_tongues',
        'baptized',
        'nbs_certified',
    ];

    public function bacenta(): BelongsTo
    {
        return $this->belongsTo(Bacenta::class, 'bacenta_id');
    }

    public function ministry(): BelongsTo
    {
        return $this->belongsTo(Ministry::class, 'ministry');
    }
    
}
