<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'is_special',
        'bacenta_level',
        'sunday_service',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
