<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Store extends Authenticatable
{
    protected $casts = [
        'certifys' => 'array',
        'cities_deliverys' => 'array'
    ];
    protected $fillable = [
        'address_id',
        'email',
        'password',
        'name',
        'owner',
        'cnpj',
        'logo',
        'team',
        'certifys',
        'cities_delivery',
    ];

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function address(): BelongsTo {
        return $this->belongsTo(Address::class);
    }

    public static function register($data) {
        $data['certifys'] = json_encode($data['certifys']);
        $data['cities_delivery'] = json_encode($data['cities_delivery']);
        $data['password'] = Hash::make($data['password']);
        return static::create($data);
    }
}
