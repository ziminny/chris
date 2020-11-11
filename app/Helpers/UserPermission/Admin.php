<?php

namespace App\Helpers\UserPermission;

use App\Helpers\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class Admin implements Permission
{
    private $namePermission;


    public function __construct(string $namePermission)
    {
        $this->namePermission = $namePermission;
    }
    
    public function define(): Permission
    {
        Gate::define($this->namePermission , function(User $user) {
            return $this->typePermission($user);
        });
        return $this;
    }

    public function typePermission($user) :bool
    {
     return UserRole::userContainRole($user)->permission === "Administrador";   
    }
}