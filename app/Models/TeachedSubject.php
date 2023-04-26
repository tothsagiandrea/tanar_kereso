<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeachedSubject extends Pivot
{
    use HasFactory;

    protected $table = 'teached_subjects';

    protected $foreignKey = 'subject_grade';
    protected $relatedKey = 'teacher';
    public $incrementing = true;

    protected $fillable = [
        'teacher',
        'subject_grade'
    ];
}
