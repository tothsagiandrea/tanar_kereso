<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GradeSubjectTeacher extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    protected $table = 'grade_subject_teacher';

    protected $fillable = [
        'teacher_id',
        'grade_subject_id'
    ];
}
