<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembershipAttendance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'service_id',
        'service_date',
        'bacenta_id',
        'user_ids',
        'member_count',
    ];

    protected $casts = [
        'user_ids' => 'array',
    ];


    public function bacenta()
    {
        return $this->belongsTo(Bacenta::class, 'bacenta_id');
    }
}
