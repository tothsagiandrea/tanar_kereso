<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GradeSubject extends Pivot
{
    public $incrementing = true;

    protected $table = 'grade_subject';

    protected $fillable = [
        'grade_id',
        'subject_id'
    ];

    public function teachers(): BelongsToMany {
        return $this->belongsToMany(Teacher::class, 'grade_subject_teacher', 'teacher_id', 'grade_subject_id')->using(GradeSubjectTeacher::class);
    }

    public function subject(): BelongsTo {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function grade(): BelongsTo {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
