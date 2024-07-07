<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone_number',
        'email',
        'start_end_date',
        'job_title',
        'qualification',
        'university',
        'graduation_year',
        'major',
        'languages',
        'skills',
        'summary',
        'experience_details',
    ];
}
