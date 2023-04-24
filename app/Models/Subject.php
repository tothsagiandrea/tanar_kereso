<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Subject extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'subject'
    ];

    public function grades():BelongsToMany
    {
        return $this->belongsToMany(Grade::class)->using(GradeSubject::class);
    }
}
