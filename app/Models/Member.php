<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
