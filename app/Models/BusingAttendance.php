<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusingAttendance extends Model
{
    //
    protected $fillable = [
        'bacenta_id',
        'bus_count',
        'service_id',
        'service_date',
    ];
}
