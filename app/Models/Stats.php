<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stats extends Model
{
    use HasFactory;

    protected $fillable = [
        'videos_id',
        'hits'
    ];

    // Relations
    public function video() : BelongsTo
    {
        return $this->belongsTo('videos');
    }
}
