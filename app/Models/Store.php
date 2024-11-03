<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Store extends Model
{
    protected $casts = [
        'certifys' => 'array',
        'cities_deliverys' => 'array'
    ];
    protected $fillable = [
        'address_id',
        'name',
        'owner',
        'cnpj',
        'logo',
        'team',
        'certifys',
        'cities_delivery',
    ];

    public function store(): HasOne {
        return $this->hasOne(Product::class);
    }

    public function address(): BelongsTo {
        return $this->belongsTo(Address::class);
    }

    public static function encode_create($data) {
        $data['certifys'] = json_encode($data['certifys']);
        $data['cities_delivery'] = json_encode($data['cities_delivery']);
        return static::create($data);
    }
}
