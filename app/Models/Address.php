<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $fillable = [
        'address',
        'street',
        'cep',
        'cep',
        'city',
        'state'
    ];


    public function store(): BelongsTo {
        return $this->belongsTo(Store::class);
    }
}
