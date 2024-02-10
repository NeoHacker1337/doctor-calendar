<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_birth',
        'marriage_anniversary',
        'created_by',
        'april_photo',
        'may_photo',
        'june_photo',
        'july_photo',
        'august_photo',
        'september_photo',
        'october_photo',
        'november_photo',
        'december_photo',
        'january_photo',
        'february_photo',
        'march_photo',
    ];
}
