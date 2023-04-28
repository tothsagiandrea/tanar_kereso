<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationTeacher extends Model
{
    use HasFactory;

    protected $table = "qualification_teacher";

    protected $fillable = [
        'teacher_id',
        'qualification_id'
    ];    
}
