<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonType extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_type'
    ];

    public function teacher(): HasMany
    {
        return $this->hasMany(Teacher::class, 'teacher');
    }
}
