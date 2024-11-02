<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'responsible',
        'image_path',
        'track_stock_by',
        'charge_for',
        'item_unity',
        'quantity',
        'notify_when_is_out',
        'notify_when_storage_have',
        'product_in_store',
        'additional_value',
        'selling_value_cents',
        'highlight',
        'limit',
        'category',
        'package_name',
        'package_price_cents',
        'package_quantity'
    ];

    public function address(): BelongsTo {
        return $this->belongsTo(Store::class);
    }
}
