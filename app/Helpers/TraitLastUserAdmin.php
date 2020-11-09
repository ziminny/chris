<?php

namespace App\Helpers;

use App\Models\Rule;

trait TraitLastUserAdmin {

    protected $messageUserLastAdmin = "Deve conter ao menos um administrador no sistema!";
    

    /**
     * @return boolean
     * @param $rule string
     */
    public function isEmptyUserAdmin() :bool
    {
        return $this->query() > 1;
    }

    public function countAdmin() :bool
    {
        return $this->query() === 0;  
    }

    private function query() :int
    {
        return Rule::where("permission","admin")->count();
    }
}