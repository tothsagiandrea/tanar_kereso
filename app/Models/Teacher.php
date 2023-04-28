<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_vitae',
        'hourly_rate',
        'profile_pic_path',
        'profile_video_path',
        'user_id'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function grade_subjects():BelongsToMany {
        return $this->belongsToMany(GradeSubject::class, 'grade_subject_teacher', 'teacher_id', 'grade_subject_id')->withPivot(['grade_subject_id'])->using(GradeSubjectTeacher::class);
    }

    public function qualification():BelongsTo {
        return $this->belongsTo(Qualification::class);
    }

    public function lesson_types():BelongsToMany {
        return $this->belongsToMany(LessonType::class)->using(LessonTypeTeacher::class);
    }

    public function towns():BelongsToMany {
        return $this->belongsToMany(Town::class);
    }
}
