<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeacherLocation extends Pivot
{
    use HasFactory;

    protected $table = 'teacher_locations';

    protected $foreignKey = 'town';
    protected $relatedKey = 'teacher';
    public $incrementing = true;

    protected $fillable = [
        'teacher',
        'town'
    ];
}
