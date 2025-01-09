<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class File extends Model
{

    protected $fillable = [
        'owner_id',
        'owner_class',
        'type',
        'path'
    ];

    public static function registerStoreImages($id, $paths) {
        $file = ['owner_id' => $id, 'owner_class' => Store::class];
        File::create(array_merge($file,[
            'type' => "logo",
            $paths['logo']
        ]));
        File::create(array_merge($file,[
            'type' => "team",
            'path' => $paths['team']
        ]));
        foreach ($paths['certifys'] as $certify) {
            File::create(array_merge($file,[
                'type' => "certify",
                'path' => $certify
            ]));
        }
        return static;
    }
}
