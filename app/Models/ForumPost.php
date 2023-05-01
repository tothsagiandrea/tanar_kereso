<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'sn_number',
        'post',
        'answer_to',
        'user_id',
        'topic_id'
    ];

    public function topic(): BelongsTo {
        return $this->belongsTo(ForumTopic::class);
    }
}
