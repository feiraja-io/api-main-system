<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bank extends Model
{
    protected $fillable = [
        'store_id',
        'pix'
    ];

    public function store(): BelongsTo {
        return $this->belongsTo(Store::class);
    }
}
