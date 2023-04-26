<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherQualification extends Model
{
    use HasFactory;

    protected $table = 'teacher_qualification';

    protected $fillable = [
        'teacher',
        'qualification'
    ];    
}
