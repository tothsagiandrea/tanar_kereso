<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'full_name',
        'curriculum_vitae',
        'hourly_rate',
        'profile_pic_path',
        'profile_video_path'
    ];
}
