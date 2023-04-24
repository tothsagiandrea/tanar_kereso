<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ContactDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_detail',
        'is_public',
        'contact_type',
        'user'
    ];

    public function contactType():HasOne
    {
        return $this->hasOne(ContactType::class,'contact_type');
    }
}
