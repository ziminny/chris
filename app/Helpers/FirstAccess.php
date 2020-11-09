<?php

namespace App\Helpers;

use App\Models\Rule;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class FirstAccess 
{
    private User $user;


    public function makeFirstUser()
    {
        if($this->userExists())
            $this->query();
    }
  

    private function userExists() :bool
    {
        return User::all()->count() === 0;
    }

    private function query()
    {
        DB::transaction(function () {       
            $this->createUser();
            $this->createRule();
        });
    }

    private function createUser()
    {
        $this->user = User::create([
            'name' => 'Primeiro usuário',
            'password' => Hash::make("12345678"),
            'email' => 'teste@hotmail.com'
        ]);
    }

    private function createRule()
    {
        Rule::create([
            'permission' => 'admin',
            'user_id' => $this->user->id
        ]);
    }

    
}