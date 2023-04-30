<?php

namespace App\Models;

use Illuminate\Console\View\Components\TwoColumnDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class County extends Model
{
    use HasFactory;

    protected $fillable = [
        'county'
    ];

    public function towns(): HasMany {
        return $this->hasMany(Town::class)->groupBy('town')->orderBy('town', 'ASC');
    }

    public function teachers(): HasManyThrough {
        return $this->hasManyThrough(Teacher::class, Town::class);
    }
}
