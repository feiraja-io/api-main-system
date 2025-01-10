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

    public static function registerStoreImages($paths) {
        $files = [];
        $file = ['owner_id' => $paths['id'], 'owner_class' => Store::class];
        $files[] = File::create(array_merge($file,['type' => "logo", 'path' => $paths['logo']]))->id;
        foreach ($paths['team'] as $team) {
            $files[] = File::create(array_merge($file,['type' => "team", 'path' => $team]))->id;
        }
        foreach ($paths['certifies'] as $certify) {
            $files[] = File::create(array_merge($file,['type' => "certify", 'path' => $certify]))->id;
        }
        return $files;
    }
}
