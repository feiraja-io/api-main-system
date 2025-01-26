<?php
namespace App\Actions;

use App\Models\File;

class CreateFilesAction
{


    public static function create($paths, $type, $owner_id, $owner_class) {
        $file = ['owner_id' => $owner_id, 'type' => $type, 'owner_class' => $owner_class];
        if(gettype($paths) === "array"){
            foreach ($paths as $path) {
                File::create(array_merge($file,['path' => $path]));
            }
        }
        else {
            File::create(array_merge($file,['path' => $paths]));
        }
    }
}
