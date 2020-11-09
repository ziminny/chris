<?php

namespace App\Helpers;

use App\Models\Rule;

class UserRole {

    public static function userContainRole($user)
    {
        return  Rule::where("user_id",$user->id)->first();
    }

    public static function oneAdmin($user) :bool
    {
        return Rule::where("permission","admin")->count() === 1 && self::userContainRole($user)->permission === "Administrador";  
    }

}