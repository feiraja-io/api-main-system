<?php

namespace App\Service;

use App\Models\Product;
use App\Models\File;
use App\Actions\CreateFilesAction;

class ProductService
{


    public static function create($data) {
        $store = Product::create($data);
        CreateFilesAction::create($data['certifies'], "certify", $store->id, Product::class);
        CreateFilesAction::create($data['images'], "image", $store->id, Product::class);
    }

    public static function get($id) {
        return Product::findOrFail($id);
    }

}
