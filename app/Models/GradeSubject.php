<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GradeSubject extends Pivot
{
    protected $table = 'grades_for_subject';

    protected $foreignKey = 'subject';
    protected $relatedKey = 'grade';
    public $incrementing = true;

}
