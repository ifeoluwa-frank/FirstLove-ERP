<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembershipAttendance extends Model
{
    public function bacenta()
    {
        return $this->belongsTo(Bacenta::class, 'bacenta_id');
    }
}
