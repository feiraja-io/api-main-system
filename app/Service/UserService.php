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
        $new_user = User::create($data['basicInfo']);
        CreateFilesAction::create($data['media']['logo'], "logo", $new_user->id, Store::class);
        CreateFilesAction::create($data['media']['team'], "team_pictures", $new_user->id, Store::class);
        CreateFilesAction::create($data['media']['productionPictures'], "production_pictures", $new_user->id, Store::class);
        $new_user->address()->create($data['locationInfo']['address']);
        $new_user = $new_user->store()->create($data['basicInfo']);
        $new_user->bank()->create($data['bankInfo']);

        foreach ($data['locationInfo']['citiesDelivery'] as $city) {
            $new_user->cities_delivery()->create(['name' => $city]);
        }

        $new_user->business_types()->attach($data['basicInfo']['businessType']);

        return $new_user;
    }

}
