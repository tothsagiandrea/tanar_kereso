<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Town extends Model
{
    use HasFactory;

    protected $fillable = [
        'town',
        'county'
    ];

    public function county() : BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}
