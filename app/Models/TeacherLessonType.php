<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeacherLessonType extends Pivot
{
    use HasFactory;

    protected $table = 'teacher_lesson_types';

    protected $foreignKey = 'lesson_type';
    protected $relatedKey = 'teacher';
    public $incrementing = true;

    protected $fillable = [
        'teacher',
        'lesson_type'
    ];
}
