<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Need extends Model
{
    protected $fillable = [
        'item_name',
        'description',
        'quantity',
        'unit',
        'estimated_price',
        'needed_date',
        'status',
        'notes',
        'user_id',
    ];

    protected $casts = [
        'needed_date' => 'date',
        'estimated_price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(NeedAttachment::class);
    }
}
