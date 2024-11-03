<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    protected $fillable = [
        'address',
        'street',
        'cep',
        'city',
        'state'
    ];

    public function store(): HasOne {
        return $this->hasOne(Store::class);
    }
}
