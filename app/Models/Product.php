<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'price_in_cents',
        'item_unity',
        'harvest_date',
        'expiration_date',
        'images',
        'notes',
        'stock_by',
        'stock_quantity',
        'in_marketplace',
        'description'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function address(): BelongsTo {
        return $this->belongsTo(Store::class);
    }
}
