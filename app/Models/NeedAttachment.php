<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedAttachment extends Model
{
    protected $fillable = [
        'need_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
    ];

    public function need()
    {
        return $this->belongsTo(Need::class);
    }
}
