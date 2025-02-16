<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Authenticatable
{
    protected $fillable = [
        'user_id',
        'name',
        'owner',
        'cnpj'
    ];

    protected $casts = [
        'cities_delivery' => 'array',
    ];

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function files(): BelongsToMany {
        return $this->belongsToMany(File::class);
    }

    public function business_types(): BelongsToMany {
        return $this->belongsToMany(BusinessType::class);
    }

    public function bank(): HasMany {
        return $this->hasMany(Bank::class);
    }

    public function cities_delivery(): HasMany {
        return $this->hasMany(CitiesDelivery::class);
    }
}
