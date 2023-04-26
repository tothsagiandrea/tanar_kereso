<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject'
    ];

    public function grades():BelongsToMany
    {
        return $this->belongsToMany(Grade::class, 'grades_for_subject', 'subject', 'grade')->withPivot('id')->using(GradeSubject::class);
        //return $this->belongsToMany(Grade::class)->withPivot('id')->using(GradeSubject::class);
    }
}
