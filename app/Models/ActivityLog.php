<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $fillable = [
        'need_id',
        'user_id',
        'action',
        'old_status',
        'new_status',
        'description',
    ];

    public function need(): BelongsTo
    {
        return $this->belongsTo(Need::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
