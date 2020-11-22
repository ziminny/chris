<?php

namespace App\Helpers;

use App\Models\Rule;
use App\Models\User;
use DB;
use DomainException;
use Illuminate\Support\Facades\Hash;

class FirstAccess 
{
    private User $user;


    public function makeFirstUser($object)
    { 
        extract($object);
        if($this->userExists()) {
            $this->query($name,$email,$password);
            return;
        }
          throw new DomainException("Já existe um usuario no bando de dados , impossivel adicionar mais um");

    }
  

    private function userExists() :bool
    {
        return User::all()->count() === 0;
    }

    private function query($name,$email,$password)
    {
        DB::transaction(function () use($name,$email,$password) {       
            $this->createUser($name,$email,$password);
            $this->createRule();
        });
    }

    private function createUser($name,$email,$password)
    {
        $this->user = User::create([
            'name' => $name,
            'password' => Hash::make($password),
            'email' => $email
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