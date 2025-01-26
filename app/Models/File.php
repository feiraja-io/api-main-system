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
}
