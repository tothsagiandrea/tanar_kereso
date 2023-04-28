<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeacherTown extends Pivot
{
    use HasFactory;
    public $incrementing = true;

    protected $fillable = [
        'teacher_id',
        'town_id'
    ];
}
