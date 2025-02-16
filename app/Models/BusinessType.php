<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BusinessType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function store(): BelongsToMany {
        return $this->belongsToMany(Store::class);
    }
}
