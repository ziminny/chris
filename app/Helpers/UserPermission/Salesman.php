<?php

namespace App\Helpers\UserPermission;

class Salesman implements Permission
{

    private $namePermission;


    public function __construct(string $namePermission)
    {
        $this->namePermission = $namePermission;
    }

    public function define(): Permission
    {
        return $this;
    }

    public function typePermission($user) :bool
    {
        return true;
    }
    
}