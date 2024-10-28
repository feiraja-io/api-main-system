<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Store extends Model
{
    protected $fillable = [
        'address_id',
        'name',
        'owner',
        'cnpj',
        'city-delivery',
    ];

    public function address(): HasOne {
        return $this->hasOne(Address::class);
    }
}
