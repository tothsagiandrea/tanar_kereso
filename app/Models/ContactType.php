<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactType extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_type'
    ];

    public function contactDetails(): HasMany
    {
        return $this->hasMany(ContactType::class, 'contact_type');
    }
}
