<?php

namespace App\Service;

use App\Models\User;
use App\Models\Store;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Actions\CreateFilesAction;

class UserService
{

    public static function login($credentials) {
        if (!Auth::attempt($credentials)) throw new Exception("Error Processing Request", 1);
    }

    public static function registerStore($data) {
        $new_user = User::create($data);
        $new_user->store()->create($data);
        $new_user->address()->create($data['address']);
        CreateFilesAction::create($data['logo'], "logo", $new_user->id, Store::class);
        CreateFilesAction::create($data['team'], "team", $new_user->id, Store::class);
        return $new_user;
    }

}
