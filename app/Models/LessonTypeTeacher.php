<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LessonTypeTeacher extends Pivot
{
    use HasFactory;
    public $incrementing = true;

    protected $table = 'lesson_type_teacher';

    protected $fillable = [
        'teacher_id',
        'lesson_type_id'
    ];
}
