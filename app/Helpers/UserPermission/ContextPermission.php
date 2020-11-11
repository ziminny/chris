<?php

namespace App\Helpers\UserPermission;

class ContextPermission
{

    public function define(Permission $permission)
    {  
        $permission->define();
        return $this;
    } 
}