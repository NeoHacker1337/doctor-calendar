<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_name',
        'registration_number',
        'name',
        'contact_number',
        'email',
        'education',
        'specialization',
        'address',
        'open_days',
        'open_time',
        'date_of_birth',
        'marriage_anniversary',
        'status',
        'created_by'
    ];
}
