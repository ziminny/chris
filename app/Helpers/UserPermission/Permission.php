<?php

namespace App\Helpers\UserPermission;

use App\Models\User;


interface Permission
{
     public function define(): Permission;
     public function typePermission(User $user) :bool;
}