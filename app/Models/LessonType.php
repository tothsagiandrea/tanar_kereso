<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LessonType extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_type'
    ];

    public function teacher(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class)->using(LessonTypeTeacher::class);
    }
}
