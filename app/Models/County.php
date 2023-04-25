<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class County extends Model
{
    use HasFactory;

    protected $fillable = [
        'county'
    ];

    public function towns(): HasMany {
        return $this->hasMany(Town::class, 'county')->groupBy('town')->orderBy('town', 'ASC');
    }
}
