<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    protected $fillable = [
        'address_id',
        'name',
        'owner',
        'cnpj',
        'city_delivery',
    ];

    public function address(): BelongsTo {
        return $this->belongsTo(Address::class);
    }
}
