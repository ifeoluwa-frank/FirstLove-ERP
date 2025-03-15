<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
