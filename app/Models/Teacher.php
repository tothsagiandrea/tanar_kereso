<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_vitae',
        'hourly_rate',
        'profile_pic_path',
        'profile_video_path',
        '"user'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    /*public function toSearchableArray() {
        return [
            'full_name' => $this->user->name,
            'email' => $this->user->email
        ];
    }*/

    public function user():BelongsTo {
        return $this->belongsTo(User::class,'user');
    }

    public function teached_subjects():BelongsToMany {
        return $this->belongsToMany(GradeSubject::class, 'teached_subjects', 'subject_grade', 'teacher')->withPivot('id')->using(TeachedSubject::class);;
    }

    public function qualification():BelongsTo {
        return $this->belongsTo(Qualification::class, 'qualification');
    }

    public function lesson_types():BelongsToMany {
        return $this->belongsToMany(LessonType::class, 'teacher_lesson_types', 'lesson_type', 'teacher')->withPivot('id')->using(TeacherLessonType::class);;
    }

    public function locations():BelongsToMany {
        return $this->belongsToMany(Town::class, 'teacher_locations', 'town', 'teacher')->withPivot('id')->using(TeacherLocation::class);
    }
}
