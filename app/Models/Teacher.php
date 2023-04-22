<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Teacher extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'curriculum_vitae',
        'hourly_rate',
        'profile_pic_path',
        'profile_video_path'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'full_name' => $this->user->name,
            'email' => $this->user->email
        ];
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user');
    }
}
